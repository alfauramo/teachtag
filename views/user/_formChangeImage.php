<?php

use dosamigos\fileupload\FileUpload;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ui-block">
	<div class="ui-block-title">
		<h6 class="title">Perfil</h6>
	</div>
	<div class="ui-block-content">			

			<div class="row">
					
				<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
					<img id="avatar_image" src="<?php echo Yii::$app->user->identity->getAvatarUrl(); ?>" alt="">
				</div>
					
				<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
				<?= FileUpload::widget([
		           	'model' => $model,
		           	'attribute' => 'img_perfil',
		           	'url' => ['user/change-avatar'],
		            'options' => ['accept' => 'image/*'],
		            'clientOptions' => [
			            'maxFileSize' => 1024
		            ],
		            'clientEvents' => [
			        'fileuploaddone' => 'function(e, data){
                        var imgResult = JSON.parse(data.result);
                        $("#avatar_image").attr("src", imgResult.url);
                        $("#main_avatar").attr("src", imgResult.url);
                    }',
                    'fileuploadfail' => 'function(e, data) {
                        console.log(e);
                        console.log(data);
                    }',
		            ],
	            ]); ?>
				</div>
			</div>
	</div>
</div>
