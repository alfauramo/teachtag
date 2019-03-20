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
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_formReg', [
        'model' => $model,
    ]) ?>
</div>
