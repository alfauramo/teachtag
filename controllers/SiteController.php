<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\VerificarCorreoForm;
use app\models\ComprobarCorreoForm;
use app\models\ChangePasswordForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;

class SiteController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            /*'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],*/
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'main';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Verifica que la cuenta de correo del usuario exista
     */
    public function actionComprobarCorreo()
    {
        $model = new ComprobarCorreoForm();

        return $this->render('comprobar_correo', [
            'model' => $model,
        ]);
    }

    public function actionVerificarCorreo()
    {

        $correo = new ComprobarCorreoForm();
        $correo->load(Yii::$app->request->post());

        $user = User::find()->where(['email' => $correo])->one();

        if($user === NULL){
            return $this->render('bad_email');
        }else{
           
            $msg = "<p>Ha solicitado un cambio de contraseña. Por favor, haga click en el siguiente enlace para verificar el cambio: <a href='";
            $msg .= Url::base(true);
            $msg .= Url::to(['site/confirmar-recuperacion', 'id' => $user->id, 'token' => $user->accessToken]);
            $msg .= "'>Enlace</a>";

            Yii::$app->mailer->compose()
                ->setFrom(Yii::$app->params["adminEmail"])
                ->setTo($correo->email)
                ->setSubject('Nueva contraseña')
                ->setHtmlBody($msg)
                ->send();

            return $this->render('good_email');
            
        }
        
    }

    public function actionConfirmarRecuperacion($id, $token){
        $model = User::find()->where(['id' => $id])->one();
        
        if($model === NULL){
            throw new NotFoundHttpException('Datos proporcionados no válidos');
        }else{
            if($model->accessToken !== $token){
                throw new NotFoundHttpException('Datos proporcionados no válidos');
            }
            $cPModel = new ChangePasswordForm();
            $cPModel->email = $model->email;

            return $this->render('changepass', [
                'model' => $cPModel,
            ]);
        }
    }

    public function actionChangePassword($email) {
        $cPModel = new ChangePasswordForm();
        $cPModel->load(Yii::$app->request->post());

        $model = User::find()->where(['email' => $email])->one();

        if($model !== NULL){
            $model->password = $cPModel->password;
            $model->password = crypt($model->password, Yii::$app->params["salt"]);  
            if ($model->save()){
                return $this->render('cambio_pass_ok');
            }
        }
        return $this->render('cambio_pass_ko');
    }

    
}
