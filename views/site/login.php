<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Iniciar sesión';
$this->registerCss(" 
    body{
        background:url(./theme/img/)
    }
    .content-bg-wrap, .landing-page { 
        background:url(./theme/img/landing-bg.jpg);
        -webkit-animation: sidedownscroll 30s linear infinite;
        animation: sidedownscroll 30s linear infinite; }");
?>
<div class="content-bg-wrap"></div>
<!-- Header Standard Landing  -->

<div class="header--standard header--standard-landing" id="header--standard">
    <div class="container">
        <div class="header--standard-wrap">

            <a href="#" class="logo">
                <div class="img-wrap">
                    <img src="theme/img/logo.png" alt="Olympus">
                    <img src="theme/img/logo-colored-small.png" alt="Olympus" class="logo-colored">
                </div>
                <div class="title-block">
                    <h6 class="logo-title">TeachTag</h6>
                    <div class="sub-title">LA RED SOCIAL DEL PROFESORADO</div>
                </div>
            </a>

            <a href="#" class="open-responsive-menu js-open-responsive-menu">
                <svg class="olymp-menu-icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
            </a>

            <div class="nav nav-pills nav1 header-menu">
                <div class="mCustomScrollbar">
                    <ul>
                        <li class="nav-item">
                            <?php
                                echo Html::a('Inicio', ['site/login'], ['class' => 'nav-link']); 
                            ?>
                        </li>
                        <li class="nav-item dropdown">
                            <?php
                                echo Html::a('Echa un vistazo', ['user/perfil'], ['class' => 'nav-link']); 
                            ?>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Términos y condiciones</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Política de privacidad</a>
                        </li>
                        <li class="close-responsive-menu js-close-responsive-menu">
                            <svg class="olymp-close-icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                        </li>
                        <li class="nav-item js-expanded-menu">
                            <a href="#" class="nav-link">
                                <svg class="olymp-menu-icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
                                <svg class="olymp-close-icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ... end Header Standard Landing  -->

<div class="header-spacer--standard"></div>


<div class="container">
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
            <?php $form = ActiveForm::begin(); ?>
            
            <div class="registration-login-form center">
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
            
                                    <p></p>
                                    
                                    <?=Html::a('Registrarse',['user/registro'], ['class' => 'btn btn-lg bg-twitter full-width btn-icon-left'])?>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <p>¿Todavía no tienes una cuenta? <?=Html::a('Regístrate ahora',['user/registro'])?></p>
                                    <br/>
                                    <p>Es muy fácil y podrás disfrutar de multitud de beneficios</p>
                                </div>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
            </div>
            
            <!-- ... end Login-Registration Form  -->       </div>
    </div>
</div>

