<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Center */

$this->title = 'Editar ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Centro', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="center-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
