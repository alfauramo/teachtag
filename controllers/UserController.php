<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\RegisterForm;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                           return $this->isAdminUser();
                        }
                    ],
                    [
                        'allow' => false,
                        'roles' => ['*']
                    ],
                ],
            ],
        ];
    }

    

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $searchModel->rol = User::ROL_USUARIO;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate() {
        //Capto los parámetros introducidos en el registerForm.
        $model = new User();
        $model->rol = User::ROL_USUARIO;
        
        //TODAVÍA QUEDA CREAR LA VALIDACIÓN POR LA PARTE DE LA VISTA
        
        //Si todo es correcto, se crea el usuario.
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Usuario creado correctamente.");
        } else {
            Yii::$app->session->setFlash('error', "Usuario NO creado.");
        }
    
        return $this->goHome();
        
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->save()){
                Yii::$app->session->setFlash('success', "Usuario modificado correctamente.");
            } else {
                Yii::$app->session->setFlash('error', "Usuario NO modificado.");
            }
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->goBack();
    }


    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Crea un objeto de formulario de registro y muestra la vista del 
     * registro. Éste manda los datos de vuelta, al actionController, para realizar un registro del usuario si todo ha sido correcto.

     */
    public function actionRegistro(){
        $model = new User();

        return $this->render('signup',[
            'model' => $model,
        ]);
    }

    /**
     * Método que se comunica con el validarRegistro.js
     * Devuelve true si encuentra una coincidencia o false si no
     */
    public function actionComprobarAlias($alias){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $user = User::find()->where(['username'=> $alias])->all();

        if(count($user)>0){
            return false;
        }
        return true;
        
    }

     /**
     * Método que se comunica con el validarRegistro.js
     * Devuelve true si encuentra una coincidencia o false si no
     */
    public function actionComprobarCorreo($correo){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $user = User::find()->where(['email'=> $correo])->all();

        if(count($user)>0){
            return false;
        }
        return true;
        
    }
}
