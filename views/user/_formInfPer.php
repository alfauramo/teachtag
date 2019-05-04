<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;
use app\models\User;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ui-block">
	<div class="ui-block-title">
		<h6 class="title">Información personal</h6>
	</div>
	<div class="ui-block-content">				
		<!-- Personal Information Form  -->
		<?php $form = ActiveForm::begin([
	        'action' => ['/user/update', 'id' => $model->id, 'name' => 1],
	        'id' => 'registro',
	        'method' => 'post',
	    ]); ?>

			<div class="row">
					
				<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
					<?= $form->field($model, 'name',[
						'options' => [
							'class' => 'form-group label-floating no-required',
						],
						'inputOptions' => [
			                'id' => 'name',
			                'class' => 'form-control',
			                'placeholder' => '',
			                'value' => $model->name,
		                ]
		            ])->label('Nombre') ?>
		            <?= $form->field($model, 'privado')->widget(Select2::classname(), [
                            'language' => 'es',
                            'data' => User::$privacidad,
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);?>
				</div>
					
				<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
					<fieldset disabled="">
						<?= $form->field($model, 'username',[
							'options' => [
								'class' => 'form-group has-disabled label-floating is-select',
							],
							'inputOptions' => [
			                    'id' => 'alias',
			                    'class' => 'form-control',
			                    'placeholder' => '',
			                    'value' => '@'.$model->username
		                	]
		            	])->label("Usuario") ?>
					</fieldset>
					<?= $form->field($model, 'birthday')->widget(DatePicker::classname(), 
					[
						'attribute' => 'birthday',
						'type' => DatePicker::TYPE_COMPONENT_PREPEND,
						'value' => 'dd-mm-AAAA',
						'pluginOptions' => [
							'format' => 'dd-mm-yyyy',
							'class' => 'form-group date-time-picker label-floating is-focused',
						],
						'options' => [
							'weekStart' => 1,
							'todayHighlight' => true,
							'autoComplete' => false,
							'showClear' => true,
							'pickerPosition' => 'left',
						],
						'layout' => "{remove}{input}<span class='input-group-addon'>
							<svg class='olymp-month-calendar-icon icon'><use xlink:href='theme/svg-icons/sprites/icons.svg#olymp-month-calendar-icon'></use></svg>
						</span>"
					])->label(false); 
					?>
				</div>
					
				<div class="col col-lg-4 col-md-4 col-sm-12 col-12" >
					<fieldset disabled="">
						<div class="form-group has-disabled label-floating is-select">
							<label class="control-label">Tu centro</label>
							<input class="form-control" placeholder="<?= $centro->nombre ?>" type="text">
						<span class="material-input"></span></div>
					</fieldset>				
				</div>
				<div class="col col-lg-4 col-md-4 col-sm-12 col-12" >
					<fieldset disabled="">
						<div class="form-group has-disabled label-floating is-select">
							<label class="control-label">Municipio</label>
							<input class="form-control" placeholder="<?= $centro->poblacion ?>" type="text">
						<span class="material-input"></span></div>
					</fieldset>
				</div>
				<div class="col col-lg-4 col-md-4 col-sm-12 col-12" >
					<fieldset disabled="">
						<div class="form-group has-disabled label-floating is-select">
							<label class="control-label">Provincia</label>
							<input class="form-control" placeholder="<?= $centro->provincia ?>" type="text">
						<span class="material-input"></span></div>
					</fieldset>
				</div>
				<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<?= $form->field($model, 'facebook',[
						'options' => [
							'class' => 'form-group with-icon label-floating',
						],
						'template' => "<i class='fab fa-facebook-f c-facebook' aria-hidden='true'></i>{label}{input}",
						'inputOptions' => [
			                'id' => 'facebook',
			                'class' => 'form-control',
			                'placeholder' => '',
			                'value' => $model->facebook,
		                ]
		            ])->label('Tu cuenta de Facebook') ?>
		            <?= $form->field($model, 'twitter',[
						'options' => [
							'class' => 'form-group with-icon label-floating',
						],
						'template' => "<i class='fab fa-twitter c-twitter' aria-hidden='true'></i>{label}{input}",
						'inputOptions' => [
			                'id' => 'twitter',
			                'class' => 'form-control',
			                'placeholder' => '',
			                'value' => $model->twitter,
		                ]
		            ])->label('Tu cuenta de Twitter') ?>
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