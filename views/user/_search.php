<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password') ?>

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

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reiniciar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
