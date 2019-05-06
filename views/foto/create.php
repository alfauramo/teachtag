<?php
/** @var $model Fichero */
/** @var $cliente User|false */

use app\models\Foto;
use app\models\User;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Html;

$this->title = 'Subir documentos';
?>
<div class="row justify-content-center ui-block">
    <div class="col-md-8">
        <div class="container">
		    <h2>Sube fotografías a tu perfil, <?= Yii::$app->user->identity->name?></h2>
			<div id="uploader_widget_form">
		        <p>Pulse en 'Agregar archivos...' y seleccione los ficheros que desea enviar. A continuación, <strong>pulse en "iniciar subida"</strong>.</p>
		        <p>Una vez subidas las fotos, pulsa en el siguiente enlace para verlas: <?=  Html::a("Galería",['user/galería','id' => Yii::$app->user->id])?></p>
		        <h3>Fotografías</h3>
				<?= FileUploadUI::widget([
					'model' => $model,
					'attribute' => 'ruta',
					'url' => ['fichero/upload', 'user_id' => Yii::$app->user->id],
					'gallery' => false,
					//'fieldOptions' => [
					//	'accept' => 'image/'
					//],
					'clientOptions' => [
						'maxFileSize' => 200000000
					],
					// ...
					'clientEvents' => [
						'fileuploaddone' => 'function(e, data) {
		                console.log(e);
		                console.log(data);
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
