<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tags';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <strong><?= Html::encode($this->title) ?></strong>
                <div class="card-actions">
                    <?= Html::a('Crear Tag', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
        <div class="card-body">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'id',
                //Agregar aquí la relación de un usuario con sus tags
                //En el index solamente se verán los tags relacionados con el user logueado
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
            </div>
        </div>
    </div>
</div>
