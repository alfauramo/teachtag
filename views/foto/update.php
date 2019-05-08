<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Foto */

$this->title = 'TeachTag - Editar foto';
$this->params['breadcrumbs'][] = ['label' => 'Fotos', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="foto-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
