<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use app\models\Center;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear usuarios', ['registro'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'username',
            'name',
            'email',
            'birthday',
            [
                'attribute' => 'centerCode',
                'value' => function($model) {
                    $centro = Center::find()->select('nombre')->where(['id'=>$model->centerCode])->one();
                    $centro = $centro->nombre;
                    return $centro;
                },
                'filter' => Select2::widget([
                    'attribute' => 'centerCode',
                    'model' => $searchModel,
                    'data' => ArrayHelper::map(
                        Center::find()->all(), 'id', 'nombre'
                    ),
                    'options' => [
                        'placeholder' => 'Seleccione un centro',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
