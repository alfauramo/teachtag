<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CenterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'TeachTag - Administración de centros';
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
                        'nombre',
                        'poblacion',
                        'provincia',
                        'centerCode',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{update} {delete}',
                            'buttons' => 
                            [
                                'update' => function ($url, $model) {
                                    return Html::a('<span class="fa fa-edit"></span>', $url, [
                                                'title' => Yii::t('app', 'lead-update'),
                                    ]);
                                },
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
            <div class='col col-lg-3 col-md-6 col-sm-12 col-12'>
                <?= Html::a('Añadir centro',['create'], ['class' => 'btn btn-green btn-xs']) ?>
            </div>
        </div>
    </div>
</div>