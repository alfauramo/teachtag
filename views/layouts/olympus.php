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
use app\models\Tag;
use app\models\BusquedaForm;

$model = User::findOne(Yii::$app->user->id);

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= Html::csrfMetaTags() ?>

    <meta name="author" content="Alfredo Faura">
    <link rel="shortcut icon" href="/img/favicon.png">
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>

</head>
<body class="app flex-row align-items-center">
<?php $this->beginBody(['class' => 'body-bg-white']) ?>


<?php
if(Yii::$app->user->isGuest){
?>
<!--Header logout-->
<header class="header header--logout" id="site-header">
    <?=Html::a('<div class="img-wrap">
            <img src="/theme/img/logo.png" alt="TeachTag">
        </div>',['user/perfil'],['class' => 'logo']) ?>

    <div class="page-title">
        <h6 id='hora'>HORA</h6>
    </div>

    <div class="header-content-wrapper">
        <?= Html::a('Iniciar sesión', ['site/login'], ['class' => 'btn btn-primary btn-md-2 login-btn-responsive', 'style' => 'margin-left:10%; margin-top: 1%;']) ?>

        <?= Html::a('Regístrate', ['user/registro'], ['class' => 'btn btn-blue btn-md-2 login-btn-responsive', 'style' => 'margin-right: 10%; margin-left: 5%; margin-top: 1%']) ?>
    </div>
</header>
<!-- ... end Header logout-->
<?php
} else if(Yii::$app->controller->isAdminUser()){
    ?>
    <!--Header logout-->
<header class="header header--logout" id="site-header">
    <?= Html::a('<div class="img-wrap">
            <img src="/theme/img/logo.png" alt="TeachTag">
        </div>',['user/index'],['class' => 'logo']) ?>

    <nav id='menu_admin' class="navbar navbar-light bg-light form-inline">
        <?= Html::a('Centros',['center/index'],['class' => 'btn btn-sm btn-purple']) ?>
        <?= Html::a('Usuarios',['user/index'],['class' => 'btn btn-sm btn-breez']) ?>
        <?= Html::a('Tags', ['tag/index'], ['class' => 'btn btn-sm btn-grey'])?>
        <?= Html::a('Fotos', ['foto/index'], ['class' => 'btn btn-sm btn-grey-lighter '])?>
        <?= Html::a('Salir', ['site/logout'], ['class' => 'btn btn-sm btn-primary'])?>
    </nav>
</header>
<!-- ... end Header logout-->
<?php
} else{
?>
<!-- Fixed Sidebar Left -->
<div class="fixed-sidebar fixed-sidebar-responsive">

    <div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
        <a href="#" class="logo js-sidebar-open">
            <img src="/theme/img/logo.png" alt="TeachTag">
        </a>

    </div>

    <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
        <a href="#" class="logo">
            <div class="img-wrap">
                <img src="/theme/img/logo.png" alt="TeachTag">
            </div>
            <div class="title-block">
                <h6 class="logo-title">TeachTag</h6>
            </div>
        </a>

        <div class="mCustomScrollbar" data-mcs-theme="dark">

            <div class="control-block">
                <div class="author-page author vcard inline-items">
                    <div class="author-thumb">
                        <img id="ava_per" alt="author" src="<?= Yii::$app->user->identity->getAvatarUrl()?>" class="avatar">
                    </div>
                    <?= Html::a('<div class="author-title">'.Yii::$app->user->identity->name . '<svg class="olymp-dropdown-arrow-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                        </div><span class="author-subtitle">'. Yii::$app->user->identity->center->nombre .'
                         </span>',['user/perfil'], ['class' => 'author-name fn'])?>
                </div>
            </div>

            <!--<div class="ui-block-title ui-block-title-small">
                <h6 class="title">MAIN SECTIONS</h6>
            </div>-->

            <ul class="left-menu">
                <li>
                    <a href="#" class="js-sidebar-open">
                        <svg class="olymp-close-icon left-menu-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                        <span class="left-menu-title">Cerrar menú</span>
                    </a>
                </li>
            </ul>

            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">TU CUENTA</h6>
            </div>

            <ul class="account-settings">
                <li>
                    <?=
                    Html::a('<svg class="olymp-menu-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
                        <span>Configuración</span>', ['user/configuracion'])
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<svg class="olymp-logout-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-logout-icon"></use></svg>

                        <span>Cerrar sesión</span>',['site/logout'],['method' => 'post'])
                    ?>
                </li>
            </ul>

            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">SOBRE TEACHTAG</h6>
            </div>

            <ul class="about-olympus">
                <li>
                <?=
                Html::a('FAQs',['site/faqs']);
                ?>
                </li>
            </ul>

        </div>
    </div>
</div>
<!-- ... end Fixed Sidebar Left -->

<!-- Header Standard Landing  -->
<header class="header" id="site-header">
    <div class="fixed-sidebar">
        <div class="fixed-logo-left sidebar--small" id="sidebar-left">
            <?=
            Html::a('<div class="img-wrap">
                    <img src="/theme/img/logo.png" alt="TeachTag">
                </div>',['site/index'],['class' => 'logo']);
            ?>
        </div>
    </div>
    <div class="page-title">

        <h6 id='hora'>HORA</h6>
    </div>

    <div class="header-content-wrapper">
        <?php 
        $user = new BusquedaForm();
        echo $this->render('//user/_form_search', [
            'user' => $user,
        ]);
        ?>
        <!--<form class="search-bar w-search notification-list friend-requests">
            <div class="form-group with-button">
                <input class="form-control js-user-search" placeholder="Buscar amigos..." type="text">
                <button>
                    <svg class="olymp-magnifying-glass-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
                </button>
            </div>
        </form>-->

        <div class="control-block">

            <div class="control-icon more has-items">
                <svg class="olymp-happy-face-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                <?php
                if(count($model->peticiones) > 0) {
                    echo "<div class='label-avatar bg-blue'>
                    ".count($model->peticiones)."</div>";
                }
                ?>
                <div class="more-dropdown more-with-triangle triangle-top-center">
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">Peticiones de amistad</h6>
                    </div>

                    <div class="mCustomScrollbar" data-mcs-theme="dark">
                        <ul class="notification-list friend-requests">
                            <?= $model->listarPeticiones() ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="author-page author vcard inline-items more">
                <div class="author-thumb">
                    <img id='ava_per'alt="author" src="<?= Yii::$app->user->identity->getAvatarUrl()?>" class="avatar">
                    <div class="more-dropdown more-with-triangle">
                        <div class="mCustomScrollbar" data-mcs-theme="dark">
                            <div class="ui-block-title ui-block-title-small">
                                <h6 class="title">Tu cuenta</h6>
                            </div>

                            <ul class="account-settings">
                                <li>
                                    <?=
                                    Html::a('<svg class="olymp-menu-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
                                        <span>Configuración</span>',['user/configuracion'])
                                    ?>
                                </li>
                                <li>
                                    <?=
                                    Html::a('<svg class="olymp-logout-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-logout-icon"></use></svg><span>Cerrar sesión</span>',['site/logout'],['method' => 'post']);
                                    ?>
                                    
                                </li>
                            </ul>

                            <div class="ui-block-title ui-block-title-small">
                                <h6 class="title">Sobre TeachTag</h6>
                            </div>

                            <ul>
                                <li>
                                    <?=
                                    Html::a('<span>FAQs</span>',['site/faqs']);
                                    ?>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <?= Html::a('<div class="author-title">' . Yii::$app->user->identity->name . '<svg class="olymp-dropdown-arrow-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg></div><span class="author-subtitle">' . Yii::$app->user->identity->center->nombre . '</span>', ['user/perfil'], ['class' => 'author-name fn']) ?>
            </div>

        </div>
    </div></header>
<!-- ... end Header Standard Landing  -->

<!-- Header Responsive  -->
<header id="site-header-responsive" class="header header-responsive">    
    <div class="header-content-wrapper">
        <ul class="nav nav-tabs mobile-app-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#request" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-happy-face-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                        <?php
                        if(count($model->peticiones) > 0) {
                            echo "<div class='label-avatar bg-blue'>
                            ".count($model->peticiones)."</div>";
                        }
                        ?>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    
    <!-- Tab panes -->
    <div class="tab-content tab-content-responsive">

        <div class="tab-pane " id="request" role="tabpanel">

            <div class="mCustomScrollbar ps ps--theme_default" data-mcs-theme="dark" data-ps-id="f68c866a-1882-f16e-7223-192820a5f9c7">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">PETICIONES DE AMISTAD</h6>
                </div>
                <ul class="notification-list friend-requests">
                    <?= $model->listarPeticiones()?>
                </ul>
            <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>

        </div>

        <div class="tab-pane " id="search" role="tabpanel">
            <?php 
            $user = new BusquedaForm();
            echo $this->render('//user/_form_search', [
                'user' => $user,
            ]);
            ?>

                <!--<form class="search-bar w-search notification-list friend-requests">
                    <div class="form-group with-button is-empty">
                        <input class="form-control js-user-search selectized" placeholder="Buscar amigos..." type="text" tabindex="-1" style="display: none;" value=""><div class="selectize-control form-control js-user-search multi"><div class="selectize-input items not-full has-options"><input type="text" autocomplete="off" tabindex="" placeholder="Buscar amigos..." style="width: 229.817px;"></div><div class="selectize-dropdown multi form-control js-user-search" style="display: none; width: 0px; top: 70px; left: 0px;"><div class="selectize-dropdown-content"></div></div></div>
                    <span class="material-input"></span></div>
                </form>-->


        </div>

    </div></header>
<!-- ... end Header Responsive  -->
<?php
}
?>
<div class="header-spacer"></div>
<main class="">
    <div class="container" style="! width: 100%;  top: 0; ">
        <div class="header--standard--wrap">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    </div>
</main>
<div id='crear_tag' style="display:none">
    <?php
    $tag = new Tag();
    
    echo $this->render('//tag/_form', [
        'model' => $tag,
    ]);
    ?>
</div>
<div class="header-spacer"></div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>