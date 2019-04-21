<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Iniciar sesión';
$this->registerCss(" 
    .content-bg-wrap, html { 
        background:url(./theme/img/landing-bg.jpg);
        -webkit-animation: sidedownscroll 30s linear infinite;
        animation: sidedownscroll 30s linear infinite; }");
?>


    <div class="row display-flex">
        <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="landing-content">
                <h1>¡Bienvenido a TeachTag, la red social del profesorado!</h1>
                <p>Somos una red social pensada por y para profesores. En TeachTag podrás entablar amistad con otros expertos de la enseñanza, compartir tus habilidades y aprender nuevos métodos de formación. 
                </p>
                <?=Html::a('!Regístrate ahora!', ['user/registro'], ['class' => 'btn btn-md btn-border c-white'])?>
            </div>
        </div>
        <div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
        
        <!-- Login-Registration Form  -->
            <div class="registration-login-form">
                <div class="tab-pane-center active" id="profile" role="tabpanel" data-mh="log-tab">
                    <div class="title h6 ">Iniciar sesión</div>
                        <?php $form = ActiveForm::begin(['options' => [
                            'class' => 'content'
                        ]]); ?>
                        <div class="row">
                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group label-floating is-empty">                                        
                                    <?= $form->field($model, 'username',['options' => ['class' => 'form-group label-floating is-empty field-loginform-username required']])->label("Usuario")?>
                                </div>
                                <div class="form-group label-floating is-empty">
                                    <?= $form->field($model, 'password',['options' => ['class' => 'form-group label-floating is-empty required']])->passwordInput()->label("Contraseña") ?>
                                </div>
                                <div class="remember">
                                    <div class="checkbox">
                                        <label>
                                            <?= $form->field($model, 'rememberMe')->checkbox()->label("Recuérdame") ?>
                                        </label>
                                    </div>
                                    <?=Html::a('He olvidado mi contraseña.',['comprobar-correo'], ['class' => 'forgot'])?>
                                </div>
                                <?= Html::submitButton('Iniciar sesión', ['class' => 'btn btn-lg btn-primary full-width', 'name' => 'login-button']) ?>
                                <div class="or"></div>
                                <br/>
                                <?=Html::a('Registrarse',['user/registro'], ['class' => 'btn btn-lg bg-twitter full-width btn-icon-left'])?>

                                <br/>
                                <br/>
                                <br/>
                                <p>¿Todavía no tienes una cuenta? <?=Html::a('Regístrate ahora',['user/registro'])?></p>
                                <br/>
                                <p>Es muy fácil y podrás disfrutar de multitud de beneficios</p>

                            </div>
                        </div>

                </div>
            </div>

        </div>
    </div>
    <?php ActiveForm::end(); ?>