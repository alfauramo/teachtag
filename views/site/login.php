<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Inicia sesión en TeachTag';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor, rellene los siguiente campos para iniciar sesión:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <div class="row">
        <div class="col-lg-offset-1 col-xs-8 col-sm-10 col-md-12">
        <?= $form->field($model, 'username')->textInput(/*['autofocus' => true],*/ ['placeholder' => 'Correo o usuario'] )->label(false) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-1 col-xs-8 col-sm-10 col-md-12">
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Contraseña'])->label(false) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-lg-4">
        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-sm-6 col-md-6 col-lg-6\">{input} {label}</div>\n<div class=\"col-lg-1\">{error}</div>",
        ])->label('Recordar mis datos') ?>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
                <?= Html::submitButton('Iniciar sesión', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>
        <div class="form-group">
            
        </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
