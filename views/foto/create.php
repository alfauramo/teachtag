<?php
/** @var $model Fichero */
/** @var $cliente User|false */

use app\models\Foto;
use app\models\User;
use dosamigos\fileupload\FileUpload;
use yii\helpers\Html;

$this->title = 'TeachTag - Subir imágenes';
?>
<div class="ui-block">
	<div class="ui-block-title ">
		<h2 class="title"><strong>Sube fotografías a tu perfil, <?= Yii::$app->user->identity->name?></strong></h2>
	</div>
	<div class="ui-block-content">	
		<div class="row justify-content-center">
			<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
				<div id="centered">
				    <p>Pulse en 'Seleccionar archivo...' y seleccione el fichero que desea subir. A continuación, <strong>verá la subida realizada al lado</strong>.</p>
				    <p>Una vez subidas las fotos que desees, pulsa en el siguiente enlace para verlas: <?=  Html::a("Galería",['user/galeria','id' => Yii::$app->user->id])?></p>
				    <p id='msg_ok'style="color:blue; display:none;">¡ÉXITO AL SUBIR LAS IMÁGENES</p>
<p id='msg_ko'style="color:red; display:none;">¡HÁ HABIDO UN ERROR!</p>
					
			<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
				<img id="avatar_image" src="" alt="">
			</div>
					
			<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
			<?= FileUpload::widget([
		        'model' => $model,
		        'attribute' => 'ruta',
		        'url' => ['foto/upload'],
		        'options' => ['accept' => 'image/*'],
		        'clientOptions' => [
			        'maxFileSize' => 1024
		        ],
		        'clientEvents' => [
			    'fileuploaddone' => 'function(e, data){
                    var imgResult = JSON.parse(data.result);
                    $("#avatar_image").attr("src", imgResult.url);
                    $("#main_avatar").attr("src", imgResult.url);
                    document.getElementById("msg_ok").style.display = "block";
			        document.getElementById("msg_ko").style.display = "none";
                    alert("Imagen subida con éxtio. \nPuedes seleccionar nuevas imágenes para subirlas a tu perfil o ir directamente a la galería para verlas")
                }',
                'fileuploadfail' => 'function(e, data) {
                    document.getElementById("msg_ko").style.display = "block";
			        document.getElementById("msg_ok").style.display = "none";
                }',
		        ],
	        ]);?>
			</div>
		</div>
	</div>
</div>	