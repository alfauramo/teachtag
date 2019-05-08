<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Editar ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <strong><?= Html::encode($this->title) ?></strong>
            </div>

            <div class="card-body">

		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>

        </div>
    </div>
</div>