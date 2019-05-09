<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\Tag;
/* @var $this yii\web\View */
/* @var $model app\models\Tag */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ui-block">
	<div class="ui-block-title">
		<h6 class="title">Escribe tu tag...</h6>
	</div>
	<div class="ui-block-content">				
		<!-- Personal Information Form  -->
    	<?php
    	$form = ActiveForm::begin(); ?>
		<div class="row">
			<div class="col-12">
    			<?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>
    		</div>

    		<div class='col-6'>
    			<?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    		</div>
    		<?php if(!$model->isNewRecord){
    		?>
    		<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
			    <?= $form->field($model, 'pdf')
			        ->widget(Select2::classname(), [
			            'language' => 'es',
			            'data' => Tag::$pdf,
			            'pluginOptions' => 
			            [
							'allowClear' => true                
						],
			        ]
			    	)->label(false);?>
			</div>
			<?php
			}
			?>
		</div>

    <?php ActiveForm::end(); ?>
</div></div>
</div>
