<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Center */

$this->title = 'TeachTag - Añadir centro';
$this->params['breadcrumbs'][] = ['label' => 'Centers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="center-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
