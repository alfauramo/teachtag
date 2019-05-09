<?php

namespace app\controllers;

use Yii;
use app\models\Foto;
use app\models\FotoSearch;
use app\models\UploadForm;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\web\Response;
use app\models\User;
use yii\helpers\Url;


/**
 * fotoController implements the CRUD actions for foto model.
 */
class FotoController extends BaseController
{


    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => false,
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all foto models.
     * @return mixed
     */
    public function actionIndex($id = false)
    {
        $searchModel = new FotoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single foto model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {

        if(Yii::$app->controller->isAdminUser()){
            $model = $this->loadModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('alert', "Descripción actualizada correctamente.");
                Yii::$app->session->setFlash('alert-class', "alert-success");
            }
            return $this->render('view', [
                'model' => $model
            ]);
        }

        return $this->redirect(['user/perfil']);
    }


    public function loadModel($id) {
        $model = foto::findOne($id);
        if ($model === null)
            throw new Exception(404, 'Foto no encontrada');
        return $model;
    }


    /**
     * Creates a new foto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Foto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing foto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->controller->isAdminUser()){
            $model = $this->findModel($id);

            if(Yii::$app->controller->isAdminUser() || $model->user_id == Yii::$app->user->id){
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['create', 'destinatario' => $model->destinatario]);
                }

                return $this->render('update', [
                    'model' => $model,
                ]);
            }

            return $this->redirect(['index']);

        }

        return $this->redirect(['user/perfil']);
    }

    /**
     * Deletes an existing foto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $output = false) {

        if(Yii::$app->controller->isAdminUser()){
            $model = $this->loadModel($id);
            $uid = $model->user_id;
            $model->delete();
            if($output == "JSON"){
                return Json::encode([
                    'files' => [
                        'name' => $fileName
                    ]
                ]);
            }else{
                Yii::$app->session->setFlash('info', "Foto eliminada correctamente.");

                return $this->redirect(['foto/index','id' => $uid]);
            }
        }

        return $this->redirect(['user/perfil']);
    }


    /**
     * Finds the foto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return foto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = foto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUpload() {

        $model = new Foto();


        $imageFile = UploadedFile::getInstance($model, 'ruta');

        $directory = Yii::getAlias('./img/') . Yii::$app->user->id . DIRECTORY_SEPARATOR . "galeria" . DIRECTORY_SEPARATOR;

        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        if ($imageFile) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;
            if ($imageFile->saveAs($filePath)) {
                $filePath = substr($filePath, 1);
                $model->ruta = $fileName;
                $model->user_id = Yii::$app->user->id;
                $model->fecha = date("Y-m-d H:i:s");
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


}
