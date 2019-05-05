<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Center */

$this->title = 'Añadir Foto';
$this->params['breadcrumbs'][] = ['label' => 'Fotos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
