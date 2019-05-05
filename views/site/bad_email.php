<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = "Error";
?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card p-4 login-form">

                <h1><?= Html::encode($this->title) ?></h1>

                <p class="text-muted ">El correo introducido no es correcto</p>

                <?php $form = ActiveForm::begin([
                    'id' => 'recover-form',
                    'layout' => 'horizontal',
                    'action' => ['site/comprobar-correo'],
                    'fieldConfig' => [
                        'template' => "<div class='row'>{label}\n 
                                        <div class='col-lg-9'>{input}</div></div>\n
                                        <div class='row'><div class=\"col-lg-8 offset-lg-3\">{error}</div></div>",
                        'labelOptions' => [
                            'class' => 'col-lg-3',
                        ],
                    ],
                ]); ?>


                <div class="form-group">
                    <?= Html::submitButton('He olvidado mi contraseña.', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>

</div>