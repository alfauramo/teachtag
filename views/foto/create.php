<?php
/** @var $model Fichero */
/** @var $cliente User|false */

use app\models\Foto;
use app\models\User;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Html;

$this->title = 'TeachTag - Subir documentos';
?>
<div class="ui-block">
	<div class="ui-block-title ">
		<h2 class="title"><strong>Sube fotografías a tu perfil, <?= Yii::$app->user->identity->name?></strong></h2>
	</div>
	<div class="ui-block-content">	
		<div class="row justify-content-center">
			<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
				<div id="centered">
				    <p>Pulse en 'Agregar archivos...' y seleccione los ficheros que desea enviar. A continuación, <strong>pulse en "iniciar subida"</strong>.</p>
				    <p>Una vez subidas las fotos, pulsa en el siguiente enlace para verlas: <?=  Html::a("Galería",['user/galeria','id' => Yii::$app->user->id])?></p>
				    <h3><strong>Fotografías</strong></h3>
				    <p id='msg_ok'style="color:blue; display:none;">¡ÉXITO AL SUBIR LAS IMÁGENES</p>
				    <p id='msg_ko'style="color:red; display:none;">¡HÁ HABIDO UN ERROR!</p>
					<?= FileUploadUI::widget([
						'model' => $model,
						'attribute' => 'ruta',
						'url' => ['foto/upload', 'id' => Yii::$app->user->id],
						'gallery' => false,
						'fieldOptions' => [
								'accept' => 'image/*'
						],
						'clientOptions' => [
							'maxFileSize' => 200000000
						],
						// ...
						'clientEvents' => [
							'fileuploaddone' => "function(e, data) {
			                 document.getElementById('msg_ok').style.display = 'block';
			                 document.getElementById('msg_ko').style.display = 'none';
			            	}",
							'fileuploadfail' => "function(e, data) {
			                document.getElementById('msg_ko').style.display = 'block';
			                document.getElementById('msg_ok').style.display = 'none';
			            }",
					],
				]); ?>
		    </div>
			</div>
		</div>
	</div>
</div>
			