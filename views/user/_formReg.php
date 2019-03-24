<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reg-form">

    <?php $form = ActiveForm::begin([
        'action' => ['/user/create']
    ]); ?>

    <?= $form->field($model, 'username',['inputOptions' => [
        'id' => 'alias',
        'placeholder' => 'Alias',
    ]])->label(false) ?>

    <?= $form->field($model, 'password',['inputOptions' => [
        'id' => 'psswd1',
        'placeholder' => 'Contraseña'
    ]])->label(false) ?>

    <?= $form->field($model, 'password',['inputOptions' => [
        'id' => 'psswd2',
        'placeholder' => 'Repite contraseña'
    ]])->label(false) ?>

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
        <?= Html::submitButton('Registrar',  ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
