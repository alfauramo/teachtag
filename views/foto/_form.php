<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Center */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="foto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ruta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
