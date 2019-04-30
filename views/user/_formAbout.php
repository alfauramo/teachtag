<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ui-block">
	<div class="ui-block-title">
		<h6 class="title">Hobbies e intereses</h6>
	</div>
	<div class="ui-block-content">
					<!-- Form Hobbies and Interests -->
					
		<?php $form = ActiveForm::begin([
	        'action' => ['/user/update', 'id' => $model->id, 'name' => 1],
	        'id' => 'registro',
	        'method' => 'post',
	    ]); ?>
			<div class="row">					
				<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
					<?= $form->field($model, 'descripcion')->textarea(['rows' => '3']) ?>
					
					<?= $form->field($model, 'films')->textarea(['rows' => '3']) ?>
					
					<?= Html::submitButton('Guardar',  ['class' => 'btn btn-primary btn-lg full-width'])?>
				</div>					
				<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
					<?= $form->field($model, 'hobbies')->textarea(['rows' => '3']) ?>
					
					<?= $form->field($model, 'music')->textarea(['rows' => '3']) ?>
					<?= Html::a('Volver sin guardar', ['user/perfil'], ['class' => 'btn btn-secondary btn-lg full-width']) ?>
					
				</div>
		<?php ActiveForm::end(); ?>
	</div>
					
	<!-- ... end Form Hobbies and Interests -->

	</div>	
</div>