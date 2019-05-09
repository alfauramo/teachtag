<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use app\models\User;
use app\models\Center;
use yii\helpers\ArrayHelper;
//use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\Proyecto */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'TeachTag - Administración de usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <strong><?= Html::encode($this->title) ?></strong>
            </div>

            <div class="card-body">
                <?=\kartik\grid\GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'filterSelector' => 'select[name="per-page"]',
                    'toolbar' => '{export}',
//                  'export' => [
//                        'header' => 'bla bla',
//                    ],
                    'panelTemplate' => '<div class="panel {type}">
                        {panelBefore}
                        {items}
                        {panelAfter}
                        {panelFooter}
                    </div>',
                    /*'panelFooterTemplate' => '<div class="kv-panel-pager text-right">
                            ' . \nterms\pagesize\PageSize::widget([
                            'label' => 'Mostrar filas',
                            'template' => '<div class="page_size_selector">{label} {list}</div>',
                            'defaultPageSize' => 10,
                        ]) . '
                            <div class="pagination_wrapper">{pager}</div>
                        </div>

                        {footer}
                        {summary}
                        <div class="clearfix"></div>',*/
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
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{delete}',
                            'buttons' => 
                            [
                                'delete' => function ($url, $model) {
                                    return Html::a('<span class="fa fa-trash"></span>', $url, [
                                                'title' => Yii::t('app', 'lead-delete'),
                                    ]);
                                }

                              ],
                        ],
                        ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
