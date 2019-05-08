<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Center */

$this->title = 'TeachTag - Modificar ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Centros', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="center-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
