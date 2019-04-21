<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Registro';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile("@web/js/ValidarRegistro.js",[
    'depends' => [
        \yii\web\JqueryAsset::className()
    ]
]);
$this->registerCss(" 
    .content-bg-wrap, html { 
        background:url(./theme/img/landing-bg.jpg);
        -webkit-animation: sidedownscroll 30s linear infinite;
        animation: sidedownscroll 30s linear infinite; }");
?>
<div class="user-signup">

	<?= $this->render('_formReg', [
        'model' => $model,
    ]) ?>
</div>
