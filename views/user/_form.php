<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name', ['inputOptions' => [
        'id' => 'nombre',
        'placeholder' => 'Nombre'
    ]])->label(false) ?>

    <?= $form->field($model, 'email',['inputOptions' => [
        'id' => 'mail',
        'placeholder' => 'Correo electrónico'
    ]])->label(false) ?>

    <?= $form->field($model, 'birthday',['inputOptions' => [
        'id' => 'brthd',
        'placeholder' => 'Fecha de nacimiento'
    ]])->label(false) ?>

    <?= $form->field($model, 'centerCode',['inputOptions' => [
        'id' => 'centerCode',
        'placeholder' => 'Center code'
    ]])->label(false) ?>

    <?= $form->field($model, 'mailCode',['inputOptions' => [
        'id' => 'mailCode',
        'placeholder' => 'Código de verificación'
    ]])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
