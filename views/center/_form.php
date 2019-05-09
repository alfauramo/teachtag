<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Center */
/* @var $form yii\widgets\ActiveForm */
$url = Url::to(['tag/create', 'id' => $model->id]);
?>

<div class="ui-block">
	<div class="ui-block-title">
		<h6 class="title"><?= Html::encode($this->title) ?></h6>
	</div>
	<div class="ui-block-content">				
		<!-- Personal Information Form  -->
    	<?php $form = ActiveForm::begin(['action' => "http://teachtag.loc/tag/create"]); ?>
		<div class="row">
			<div class="col-6">
    			<?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
    		</div>
    		<div class="col-6">
    			<?= $form->field($model, 'poblacion')->textInput(['maxlength' => true]) ?>
    		</div>
    		<div class="col-6">
    			<?= $form->field($model, 'provincia')->textInput(['maxlength' => true]) ?>
    		</div>

    		<div class='col-6'>
    			<?= $form->field($model, 'centerCode')->textInput(['maxlength' => true]) ?>
    		</div>
    		<div class='col-6'>
    			<?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    		</div>
		</div>

    <?php ActiveForm::end(); ?>
</div></div>
</div>