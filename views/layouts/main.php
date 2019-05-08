<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;


AppAsset::register($this);
$this->registerCss(" 
    .content-bg-wrap, html { 
        background:url(/theme/img/landing-bg.jpg);
        -webkit-animation: sidedownscroll 30s linear infinite;
        animation: sidedownscroll 30s linear infinite; }");
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <link rel="shortcut icon" href="/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>

    <div class="content-bg-wrap"></div>  
    <div class="header--standard header--standard-landing" id="header--standard">
                    <div class="container">
                        <div class="header--standard-wrap">
                            <?= Html::a('<div class="img-wrap">
                                    <img src="/theme/img/logo.png" alt="Olympus">
                                    <img src="/theme/img/logo-colored-small.png" alt="Olympus" class="logo-colored">
                                </div>
                                <div class="title-block">
                                    <h6 class="logo-title">TeachTag</h6>
                                    <div class="sub-title">LA RED SOCIAL DEL PROFESORADO</div>
                                </div>',['site/index'],['class' => 'logo'])?>
                            <a href="#" class="logo">
                                
                                
                            </a>

                            <a href="#" class="open-responsive-menu js-open-responsive-menu">
                                <svg class="olymp-menu-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
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
                                            <?= Html::a('FAQs',['site/faqs'])?>
                                        </li>
                                        <li class="close-responsive-menu js-close-responsive-menu">
                                            <svg class="olymp-close-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                        </li>
                                        <li class="nav-item js-expanded-menu">
                                            <a href="#" class="nav-link">
                                                <svg class="olymp-menu-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
                                                <svg class="olymp-close-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <div class="header-spacer--standard"></div>
    <div class="container" style="/*! width: 100%; *//*! top: 0; */">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
