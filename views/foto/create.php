<?php
/** @var $model Fichero */
/** @var $cliente User|false */

use app\models\Fichero;
use app\models\User;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Html;

if(isset($_GET['destinatario']) && Yii::$app->controller->isAdminUser()){
    $destinatario = $_GET['destinatario'];
}else{
    $destinatario = null;
}

$this->title = 'Subir documentos';
?>
<div id="uploader_widget">
    <h2>Subir documentos <?php if ($cliente !== false) echo 'para ' . $cliente->nombre; ?></h2>
	<div id="uploader_widget_form">
        <p>Pulse en 'Agregar archivos...' y seleccione los ficheros que desea enviar. A continuación, <strong>pulse en "iniciar subida"</strong>.</p>
        <p>Una vez subidos los ficheros, pulse en el siguiente enlace para verlos: <?php if(Yii::$app->controller->isAdminUser()) echo Html::a("Ver ficheros",['fichero/asignados','id' => $destinatario]); else  echo Html::a("Ver ficheros",['fichero/index']);?></p>
        <h3>Ficheros</h3>
		<?= FileUploadUI::widget([
			'model' => $model,
			'attribute' => 'nombre',
			'url' => ['fichero/upload', 'destinatario' => $destinatario],
			'gallery' => false,
			//	'fieldOptions' => [
			//		'accept' => 'image/*'
			//	],
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
