<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Recuperar contraseña';

?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card p-4 login-form">

                <h1><?= Html::encode($this->title) ?></h1>

                <p class="text-muted ">Introduce tu correo para recuperar la contraseña</p>

	            <?php $form = ActiveForm::begin([
		            'id' => 'recover-form',
		            'layout' => 'horizontal',
                    'action' => ['site/verificar-correo'],
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
	            <?= $form->field($model, 'email')?>

                <div class="form-group">
                    <?= Html::submitButton('Recuperar contraseña', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>
                </div>
                <?php endif; ?>

	            <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>

</div>
