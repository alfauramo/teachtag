<?php

namespace app\controllers;

use Yii;
use app\models\Center;
use app\models\CenterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CenterController implements the CRUD actions for Center model.
 */
class CenterController extends BaseController
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
     * Lists all Center models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->controller->isAdminUser()){
            $searchModel = new CenterSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        
        return $this->redirect(['user/perfil']);
    }

    /**
     * Displays a single Center model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->controller->isAdminUser()){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
        
        return $this->redirect(['user/perfil']);
    }

    /**
     * Creates a new Center model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->controller->isAdminUser()){
            $model = new Center();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }
        
        return $this->redirect(['user/perfil']);
    }

    /**
     * Updates an existing Center model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->controller->isAdminUser()){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
        
        return $this->redirect(['user/perfil']);
    }

    /**
     * Deletes an existing Center model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->controller->isAdminUser()){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
        return $this->redirect(['user/perfil']);
    }

    /**
     * Finds the Center model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Center the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Center::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Comprueba el código introducido en el registro, si existe, manda true.
     * @param string $code
     * @return mixed
     */
    public function actionComprobarCodigo($codigo){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $centro = Center::find()->where(['centerCode'=> $codigo])->one();

        if ($centro !== NULL)
            return true;
        
        return false;
    }
}
