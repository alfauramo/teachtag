<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CenterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Galería';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Añadir foto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'ruta',
            'fecha',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
