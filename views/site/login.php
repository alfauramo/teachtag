<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Iniciar sesión';

?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card p-4 login-form">

                <h1><?= Html::encode($this->title) ?></h1>

                <p class="text-muted ">Introduce tu usuario y contraseña</p>

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "<div class='row'>{label}\n 
                                        <div class='col-lg-9'>{input}</div></div>\n
                                        <div class='row'><div class=\"col-lg-8 offset-lg-3\">{error}</div></div>",
                        'labelOptions' => [
                            'class' => 'col-lg-3',
                        ],
                    ],
                ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?php if (true): ?>
                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => "<div class='row'><div class=\"offset-lg-3 col-lg-9\">{input} {label}</div>\n<div class=\"col-lg-9 offset-lg-3\">{error}</div></div>",
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>
                </div>
                <?php endif; ?>

                <?php ActiveForm::end(); ?>


                <p class="text-muted text-center"><?=Html::a('He olvidado mi contraseña.',['comprobar-correo'])?></p>

            </div>
        </div>
    </div>

</div>