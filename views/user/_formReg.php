<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reg-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username',['inputOptions' => [
    	'id' => 'alias',
        'class' => 'form-control',
    	'placeholder' => 'Alias',
    ]])->label(false) ?>

    <?= $form->field($model, 'password',['inputOptions' => [
    	'id' => 'psswd1',
        'class' => 'form-control',
    	'placeholder' => 'Contraseña'
    ]])->label(false) ?>

    <?= $form->field($model, 'password',['inputOptions' => [
    	'id' => 'psswd2',
        'class' => 'form-control',
    	'placeholder' => 'Repite contraseña'
    ]])->label(false) ?>

    <?= $form->field($model, 'nombre', ['inputOptions' => [
    	'id' => 'nombre',
        'class' => 'form-control',
    	'placeholder' => 'Nombre'
    ]])->label(false) ?>

    <?= $form->field($model, 'apellidos', ['inputOptions' => [
    	'id' => 'apellidos',
        'class' => 'form-control',
    	'placeholder' => 'Apellidos',
    ]])->label(false) ?>

    <?= $form->field($model, 'email',['inputOptions' => [
    	'id' => 'mail',
        'class' => 'form-control',
    	'placeholder' => 'Correo electrónico'
    ]])->label(false) ?>

    <?= $form->field($model, 'telefono',['inputOptions' => [
    	'id' => 'tlfn',
        'class' => 'form-control',
    	'placeholder' => 'Móvil'
    ]])->label(false) ?>

    <?= $form->field($model, 'centerCode',['inputOptions' => [
    	'id' => 'centerCode',
        'class' => 'form-control',
    	'placeholder' => 'Center code'
    ]])->label(false) ?>

    <?= $form->field($model, 'mailCode',['inputOptions' => [
    	'id' => 'mailCode',
        'class' => 'form-control',
    	'placeholder' => 'Código de verificación'
    ]])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
