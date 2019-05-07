<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Center;
use app\models\UserSearch;
use app\models\ChangePasswordForm;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Date;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use app\models\Tag;
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
                'only' => ['signup','perfil'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['perfil', 'signup'],
                        'matchCallback' => function ($rule, $action) {
                           return Yii::$app->user->isGuest;
                       }
                    ],
                    [
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                           return $this->isNormalUser();
                       }
                    ],
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
            'denyCallback' => function () {
                return Yii::$app->response->redirect(['site/index']);
            },
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

    public function actionPerfil($id = false)
    {

        if($id !== false){
            $model = User::findOne($id);
        } else {
            if(Yii::$app->user->isGuest){
                $model = User::findOne(121);
            }else{
                $model = User::findOne(Yii::$app->user->id);
            }
            
        }

        $centro = Center::findOne($model->centerCode);
        
        return $this->render('perfil', [
            'model' => $model,
            'centro' => $centro
        ]);
    }

    public function actionVerAmigos($id = false)
    {

        if($id !== false){
            $model = User::findOne($id);
        } else {
            if(Yii::$app->user->isGuest){
                $model = User::findOne(121);
            }else{
                $model = User::findOne(Yii::$app->user->id);
            }
            
        }

        $centro = Center::findOne($model->centerCode);
        
        return $this->render('amigos', [
            'model' => $model,
            'centro' => $centro
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

    public function actionCreate() {
        //Capto los parámetros introducidos en el registerForm.
        $model = new User();
        //Si todo es correcto, se crea el usuario.
        
        //Validación mediante ajax
        if($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax){

            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        //Validación cuando el formulario es enviado vía post
        //Esto sucede cuando la validación ajax se ha llevado a cabo correctamente
        //También previene por si el usuario tiene desactivado javascript y la
        //validación mediante ajax no puede ser llevada a cabo
        if ($model->load(Yii::$app->request->post())){
            $model->privado = User::PUBLICO;
            $model->rol = User::ROL_USUARIO;
            $model->birthday = Yii::$app->formatter->asDate($model->birthday, 'yyyy-MM-dd');

            $model->centerCode = $model->asignarCentro();
            $centerCode = $model->centerCode;
            
            //$model->centerCode = "";

            if($model->save()){

                //Encriptamos el password
                $model->password = crypt($model->password, Yii::$app->params["salt"]);
                
                //Creamos una cookie para autenticar al usuario cuando decida recordar la sesión, esta misma
                //clave será utilizada para activar el usuario
                $model->authKey = $this->randKey("abcdef0123456789", 200);
                
                //Creamos un token de acceso único para el usuario
                $model->accessToken = $this->randKey("abcdef0123456789", 200);
                //$model->centerCode = $centerCode;
               
                //Si el registro es guardado correctamente
                if ($model->save()){
                    //Nueva consulta para obtener el id del usuario
                    //Para confirmar al usuario se requiere su id y su authKey
                    $user = $model->find()->where(["email" => $model->email])->one();
                    $id = urlencode($user->id);
                    $authKey = urlencode($user->authKey);

                    $subject = "Confirmar registro";
                    $body = "<h3>Bienvenido a Teachtag, $model->username</h3>";
                    $body .= "Por favor, haz clic en el siguiente enlace para confirmar tu cuenta. :)";
                    $body .= "<a href='http://teachtag.loc/index.php?r=user/confirm&id=".$id."&authKey=".$authKey."'>Confirmar</a>";


                    //Enviamos el correo
                    Yii::$app->mailer->compose()
                    ->setTo($user->email)
                    ->setFrom([Yii::$app->params["adminEmail"] => Yii::$app->params["title"]])
                    ->setSubject($subject)
                    ->setHtmlBody($body)
                    ->send();
                                        
                    Yii::$app->session->setFlash('success', "Usuario creado correctamente. Por favor, revise su correo y valide su cuenta.");
                }
            }else{
                Yii::$app->session->setFlash('error', "Usuario NO creado.");
            }
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
                Yii::$app->session->setFlash('success', "Perfil modificado correctamente.");
            } else {
                Yii::$app->session->setFlash('error', "Perfil NO modificado.");
            }

            if(isset($_GET['name'])){
                return $this->redirect(['perfil']);
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

        if(Yii::$app->user->isGuest){
            $this->layout = 'main';
            
            return $this->render('signup',[
                'model' => $model,
            ]);
        }else{
            return $this->render('create',[
                'model' => $model,
            ]);
        }
    }

    /**
     * Método que se comunica con el validarRegistro.js
     * Devuelve true si encuentra una coincidencia o false si no
     */
    public function actionComprobarAlias($alias){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $user = User::find()->where(['username' => $alias])->all();

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

    /**
     * Genera la random key para validar el usuario por correo.
     */
    private function randKey($str='', $long=0)
    {
        $clave = null;
        $str = str_split($str);
        $inicio = 0;
        $fin = count($str)-1;
        for($i = 0; $i < $long; $i++)
        {
            $clave .= $str[rand($inicio, $fin)];
        }
        return $clave;
    }

    /**
     * Método para validar al usuario después de hacer click en el enlace
     */
    public function actionConfirm($id, $authKey){

        $model = new User();

        if(Yii::$app->request->get()){

            if((int)$id){
                //Realizamos la consulta para obtener el registro
                $model = $model
                ->find()
                ->where(["id" => $id])
                ->andWhere(["authKey" => $authKey])->one();
                //Si el registro existe
                if($model !== NULL){
                    $activar = User::findOne($id);
                    $activar->activate = 1;

                    if($activar->update()){
                        echo "Enhorabuena registro llevado a cabo correctamente, redireccionando ...";
                        echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/login")."'>";
                    }else{
                        echo "Ha ocurrido un error al realizar el registro, redireccionando ...";
                        echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/login")."'>";
                    }
                }else{
                    //Si no existe redireccionamos a login
                    Yii::$app->session->setFlash('warning', "Los datos no son correctos");
                    return $this->redirect(["site/login"]);
                }
            }else{
                //Si id no es un número entero redireccionamos a login
                Yii::$app->session->setFlash('error', "Ha ocurrido un error en la validación de su cuenta. Por favor, pongase en contacto con nosotros.");
                return $this->redirect(["index"]);
            }
        }
    }

    public function actionConfiguracion(){
        $model = User::findOne(Yii::$app->user->id);
        

        $centro = Center::findOne($model->centerCode);

        return $this->render('configuracion', [
            'model' => $model,
            'centro' => $centro,
            'changePasswordModel' => new ChangePasswordForm(),
        ]);
    }

    public function actionChangePassword() {
        $changePasswordModelForm = new ChangePasswordForm();
        $changePasswordModelForm->load(Yii::$app->request->post());
        $model = $this->findModel(Yii::$app->user->id);
        $model->password = crypt($changePasswordModelForm->password, Yii::$app->params["salt"]);
        
        if ($model->save())
            Yii::$app->session->setFlash('success', "Su contraseña ha sido cambiada.");
        else
            Yii::$app->session->setFlash('error', "Ha habido un problema al cambiar la contraseña");
        $this->redirect(['user/perfil']);
    }

    public function actionLike($id){
        $model = User::findOne(Yii::$app->user->id);
        $model->likeTags[] = $id;
        $model->save();
        $this->goBack();
    }

    public function actionDislike($id){
        $model = User::findOne(Yii::$app->user->id);
        $model->dislike($id);
        $model->save();
        $this->goBack();
    }

    public function actionCompartir($id){
        $model = User::findOne(Yii::$app->user->id);
        $model->editableTags[] = $id;
        $model->save();
        $this->goBack();
    }

    public function actionDejarCompartir($id){
        
        $tag = Tag::findOne($id);
        if($tag->creator_id !== Yii::$app->user->id){
            $model = User::findOne(Yii::$app->user->id);
            $model->dejarCompartir($id);
            $model->save();
        }
        
        $this->goBack();
    }

    public function actionEliminar($id){

        $model = User::findOne(Yii::$app->user->id);

        if($id !== Yii::$app->user->id){
            $model->eliminar($id);
        }

        return $this->redirect(Yii::$app->request->referrer);
        
    }

    public function actionBloquear($id){
        $model = User::findOne(Yii::$app->user->id);

        if($id !== Yii::$app->user->id){
            $model->blockeds[] = $id;
            if(in_array($id,$model->friends)){
                $model->eliminar($id);
            }
            $model->save();
        }
        
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionDesbloquear($id){
        $model = User::findOne(Yii::$app->user->id);

        if($id !== Yii::$app->user->id){
            $model->desbloquear($id);
            $model->save();
        }
        
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionEnviarPeticion($id){
        $model = User::findOne($id);

        if($id !== Yii::$app->user->id){
            $model->peticiones[] = Yii::$app->user->id;
            $model->save();
        }
        
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionEliminarPeticion($id){
        $model = User::findOne(Yii::$app->user->id);

        if($id !== Yii::$app->user->id){
            $model->eliminarPeticion($id);
            $model->save();
        }
        
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionAceptar($id){
        $model = User::findOne(Yii::$app->user->id);
        $usuario = User::findOne($id);
        if($id !== Yii::$app->user->id){
            if(!in_array($id,$model->friends)){
                $model->friends[] = $id;
                $usuario->friends[] = $model->id;
                $usuario->eliminarPeticion(Yii::$app->user->id);

            }
            $usuario->save();
            $model->save();
        }
        
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionRechazar($id){

        $usuario = User::findOne($id);
        if($id !== Yii::$app->user->id){
            $usuario->eliminarPeticion(Yii::$app->user->id);
        }
        
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionChangeAvatar() {
        $model = $this->findModel(Yii::$app->user->id);


        $imageFile = UploadedFile::getInstance($model, 'img_perfil');

        $directory = Yii::getAlias('./img/'.$model->id.'/');
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        if ($imageFile) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;
            if ($imageFile->saveAs($filePath)) {
                $filePath = substr($filePath, 1);
                $model->deleteAvatar();
                $model->img_perfil = $filePath;
            if ($model->save())
                return Json::encode([
                    'name' => $fileName,
                    'size' => $imageFile->size,
                    'url' => $filePath,
                    'thumbnailUrl' => $filePath,
                    'deleteUrl' => 'image-delete?name=' . $fileName,
                    'deleteType' => 'POST',
                ]);
            else
                var_dump($model->getErrors());
            }
        }

        return '';
    }

    public function actionChangeCabecera() {
        $model = $this->findModel(Yii::$app->user->id);


        $imageFile = UploadedFile::getInstance($model, 'img_cabecera');

        $directory = Yii::getAlias('./img/'.$model->id.'/');
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        if ($imageFile) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;
            if ($imageFile->saveAs($filePath)) {
                $filePath = substr($filePath, 1);
                $model->deleteCabecera();
                $model->img_cabecera = $filePath;
            if ($model->save())
                return Json::encode([
                    'name' => $fileName,
                    'size' => $imageFile->size,
                    'url' => $filePath,
                    'thumbnailUrl' => $filePath,
                    'deleteUrl' => 'image-delete?name=' . $fileName,
                    'deleteType' => 'POST',
                ]);
            else
                var_dump($model->getErrors());
            }
        }

        return '';
    }

    public function actionDeleteAvatar() {
        $model = $this->findModel(Yii::$app->user->id);
        $model->deleteAvatar();
        Yii::$app->session->setFlash('success', "Imagen de perfil eliminada correctamente. ");
        return $this->redirect(['user/perfil']);
    }

    public function actionDeleteCabecera() {
        $model = $this->findModel(Yii::$app->user->id);
        $model->deleteCabecera();
        Yii::$app->session->setFlash('success', "Imagen de perfil eliminada correctamente. ");
        return $this->redirect(['user/perfil']);
    }

    public function actionGaleria($id = false){

        if($id === false) 
            $id = Yii::$app->user->id;

        $model = User::findOne($id);
        

        $centro = Center::findOne($model->centerCode);

        return $this->render('galeria', [
            'model' => $model,
            'centro' => $centro,
        ]);
    }

    public function actionTest(){
        //Compruebo que la relación con fotos funciona.
        $model = User::findOne(Yii::$app->user->id);
        $fotos = $model->fotos;
        foreach($fotos as $f){
            var_dump($f->getFilePath());
        }

        die();
    }
}
