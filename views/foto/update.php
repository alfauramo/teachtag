<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Foto */

$this->title = 'Modificar ';
$this->params['breadcrumbs'][] = ['label' => 'Fotos', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="foto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
