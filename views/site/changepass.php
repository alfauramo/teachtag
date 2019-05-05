<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Cambia tu contraseña';
?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card p-4 login-form">

                <h1><?= Html::encode($this->title) ?></h1>

                <p class="text-muted ">Por motivos de seguridad, introduce tu nueva contraseña dos veces.</p>

	            <?php $form = ActiveForm::begin([
		            'id' => 'change-password',
		            'layout' => 'horizontal',
                    'action' => \yii\helpers\Url::to(['change-password', 'email' => $model->email]),
		            'fieldConfig' => [
			            'template' => "<div class='row'>{label}\n 
                                        <div class='col-lg-9'>{input}</div></div>\n
                                        <div class='row'><div class=\"col-lg-8 offset-lg-3\">{error}</div></div>",
			            'labelOptions' => [
                            'class' => 'col-lg-3',
                        ],
		            ],
	            ]); ?>

                <?php if (true): ?>
	            <?= $form->field($model, 'password')->passwordInput()?>

                <?= $form->field($model, 'password_repeat')->passwordInput()?>

                <div class="form-group">
                    <?= Html::submitButton('Cambiar contraseña', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>
                </div>
                <?php endif; ?>

	            <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>