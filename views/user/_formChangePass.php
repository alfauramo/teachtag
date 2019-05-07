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
		<h6 class="title">Cambiar contraseña</h6>
	</div>
	<div class="ui-block-content">				
		<!-- Personal Information Form  -->
		<?php $form = ActiveForm::begin([
                'action' => ['user/change-password']
            ]);?>

			<div class="row">
					
				<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
					<?= $form->field($changePasswordModel, 'password')->passwordInput(['maxlength' => false])  ?>
				</div>
					
				<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
					
					<?= $form->field($changePasswordModel, 'password_repeat')->passwordInput(['maxlength' => false])  ?>
					
				</div>
					
				<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
					<?= Html::submitButton('Guardar',  ['class' => 'btn btn-primary btn-lg full-width'])?>
				</div>
				<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
					<?= Html::a('Volver sin guardar', ['user/perfil'], ['class' => 'btn btn-secondary btn-lg full-width']) ?>
				</div>
			</div>
		<?php ActiveForm::end(); ?>
					
					<!-- ... end Personal Information Form  -->
	</div>
</div>