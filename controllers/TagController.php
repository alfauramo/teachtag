<?php

namespace app\controllers;

use Yii;
use app\models\Tag;
use app\models\TagSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Sql;
use DateTime;
use kartik\mpdf\Pdf;

/**
 * TagController implements the CRUD actions for Tag model.
 */
class TagController extends BaseController
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
                        'actions' => ['index', 'update', 'delete'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                           return $this->isAdminUser();
                       }
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create', 'update', 'delete', 'descargar'],
                        'matchCallback' => function ($rule, $action) {
                           return $this->isNormalUser();
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
     * Lists all Tag models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TagSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Creates a new Tag model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tag();
        if ($model->load(Yii::$app->request->post())){
            $model->pdf = Tag::NO_DESCARGABLE;
            $model->editableUsers[] = Yii::$app->user->identity->id;
            $fecha = new DateTime('now');
            
            $model->fecha = $fecha->format('Y-m-d H:i:s');
            
            $model->creator_id = Yii::$app->user->id;
            if($model->save()) {
                return $this->redirect(['index']);
            }else{
                 return $this->redirect(['error']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tag model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->controller->isAdminUser() || $model->creator_id == Yii::$app->user->id){
            if ($model->load(Yii::$app->request->post())) {

                if($model->save()){
                    Yii::$app->session->setFlash('success', "Tag modificado satisfactoriamente");
                }
                return $this->goBack();
            }
            
            if(Yii::$app->controller->isAdminUser() || $model->creator_id == Yii::$app->user->id){
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }

        return $this->redirect(['user/perfil']);
        
    }

    /**
     * Deletes an existing Tag model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if(Yii::$app->controller->isAdminUser() || $model->creator_id == Yii::$app->user->id){
            if($model->creator_id == Yii::$app->user->id){
                $model->delete();
            }
            return $this->goBack();
        }

        return $this->redirect(['user/perfil']);
    }

    /**
     * Finds the Tag model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tag::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDescargar($id){
        $model = Tag::findOne($id);

        if($model->pdf === Tag::DESCARGABLE){
            Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
            
            $pdf = new Pdf([
                'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
                'destination' => Pdf::DEST_BROWSER,
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
                'content' => $this->renderPartial('descarga'),
                'options' => [
                    // any mpdf options you wish to set
                ],
                'methods' => [
                    'SetTitle' => 'Tag - TeachTagg.com',
                    'SetSubject' => 'Generating PDF files via yii2-mpdf extension has never been easy',
                    'SetHeader' => ['Tag de la red social TeachTag ||Generado: ' . date("r")],
                    'SetFooter' => ['|Page {PAGENO}|'],
                    'SetAuthor' => 'Alfredo Faura',
                    'SetCreator' => 'Alfredo Faura',
                    'SetKeywords' => 'Krajee, Yii2, Export, PDF, MPDF, Output, Privacy, Policy, yii2-mpdf',
                ]
            ]);

            return $pdf->render();
        }
        
    }
}
