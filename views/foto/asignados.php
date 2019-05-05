<?php
/** @var $model Fichero */
/** @var $searchModel FicheroSearch */
/** @var $dataProvider ActiveDataProvider */

use app\models\Fichero;
use app\models\FicheroSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;

$id = "";
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = false;
}

$this->title = 'Documentos';
?>

<div id="asignados">
    <h2><?php echo Yii::$app->controller->isAdminUser() ? $this->title." asignados al usuario ". $searchModel->nombre : "Documentos asignados";  ?> </h2>

    <?php if(!Yii::$app->controller->isAdminUser()): ?>
        <?php if (count($dataProvider->getModels())> 0): ?>
            <p>A continuación, puede ver los ficheros que <strong><?php echo Yii::$app->params['nombreEmpresa']; ?></strong> le ha mandado.</p>
        <?php endif ?>
    <?php else:
        echo Html::a('Subir documentos', ['fichero/create', 'destinatario' => $id], ['class' => 'btn btn-primary']); 
        endif; ?>

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'titulo',
                'value' => function($model) {
                    $res = "";
                    if(strlen($model->titulo) > 0){
                        $res = substr($model->titulo,0, 50);
                        $res .= "...";
                    }
                    
                    return $res;
                }
            ],
            'nombre',
            'fecha',
            [
                'attribute' => 'notas',
                'value' => function($model) {
                    $res = "";
                    if(strlen($model->notas) > 0){
                        $res = substr($model->notas,0, 50);
                        $res .= "...";
                    }
                    
                    return $res;
                }
            ],
            [
            'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {download} {delete}',
            'buttons' => [
                'delete'  => function ($url, $model, $key) {
                    return Html::a("", ['delete', 'id' => $model->id, 'output' => ""], ['class' => ' glyphicon glyphicon-trash ', 'title' => 'Ver documento']);
                },
                'download' => function ($url, $model, $key) {
                    return Html::a("", ['fichero/descargar', 'id' => $model->id], ['class' => 'glyphicon glyphicon-download ', 'title' => 'Descargar documento']);
                },
            ],
            'visibleButtons' => [
                'update' => Yii::$app->controller->isAdminUser(),
                'delete' => Yii::$app->controller->isAdminUser(),
            ],            
            ]
        ],
    ]); ?>
</div>