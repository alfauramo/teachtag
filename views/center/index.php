<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CenterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Centros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="center-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Añadir centro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'nombre',
            'poblacion',
            'provincia',
            'centerCode',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
