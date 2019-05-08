<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Center */
/* @var $form yii\widgets\ActiveForm */
$usuarios = User::find()->where(['rol' => 0])->ordenado()->all();
$list = ArrayHelper::map($usuarios, 'id', 'username'); 
?>
<div class="ui-block">
	<div class="ui-block-title">
		<h6 class="title"><?= Html::encode($this->title) ?></h6>
	</div>
	<div class="ui-block-content">				
		<!-- Personal Information Form  -->
    	<?php $form = ActiveForm::begin(['action' => ['tag/create']]); ?>
		<div class="row">
			<div class="col-4">
    			<?= $form->field($model, 'ruta')->textInput(['maxlength' => true]) ?>
    		</div>
    		<div class="col-4">
    			<?= $form->field($model, 'fecha')->textInput(['maxlength' => true]) ?>
    		</div>
    		<div class="col-4">
    			<?= $form->field($model, 'user_id')->widget(Select2::classname(), [
                            'language' => 'es',
                            'data' => $list,
                            'options' => [
                                'placeholder' => 'Selecciona un usuario',
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                ]);?>
    		</div>

    		<div class='col-6'>
    			<?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    		</div>
		</div>

    <?php ActiveForm::end(); ?>
</div></div>
</div>
