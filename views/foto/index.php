<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel app\models\FicheroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documentos';
?>
<div class="index">

    <h2><?php echo Yii::$app->controller->isAdminUser() ? $this->title." del usuario ".$searchModel->nombre : "Mis documentos";  ?> </h2>

    
    <?php if(!Yii::$app->controller->isAdminUser()): ?>
    <p>Puede mandar ficheros a <strong><?php echo Yii::$app->params['nombreEmpresa']; ?></strong> desde aquí</p>
    <?php echo Html::a('Subir documentos', ['fichero/create'], ['class' => 'btn btn-primary']); ?>
        <?php if (count($dataProvider->getModels()) > 0): ?>
            <p>A continuación, le mostramos los ficheros que ha mandado con anterioridad a <strong><?php echo Yii::$app->params['nombreEmpresa']; ?></strong> </p>
        <?php endif; ?>
    <?php endif; ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'nombre',
            'fecha',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{download} {delete}',
                'buttons' => [
                    'download' => function ($url, $model, $key) {
                        return Html::a("", ['fichero/descargar', 'id' => $model->id], ['class' => 'glyphicon glyphicon-download ', 'title' => 'Descargar documento']);
                    },
                ],
                'visibleButtons' => [
                    'delete' => Yii::$app->controller->isAdminUser(),
                ]
            ]
        ],
    ]); ?>
</div>