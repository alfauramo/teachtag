	<?php

use yii\helpers\Html;
use app\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = "TeachTag - Mi perfil";

if(isset($_GET['id'])){
	if($_GET['id'] != Yii::$app->user->id){
		$this->title = " TeachTag - Perfil de ".$model->name;
	}
	$id = $_GET['id'];
	$usuario = User::findOne(Yii::$app->user->id);
} else {
	$id = Yii::$app->user->id;
}


?>

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img id="cabecera_perfil" src="<?= $model->getCabeceraUrl()?>">
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<?php
								if(!Yii::$app->user->isGuest){
								?>
								<ul class="profile-menu">
									<li>
										<?= Html::a('Timeline',['user/timeline'],['class' => 'active'])?>
									</li>
									<li>
										<?= Html::a('Perfil',['user/perfil', 'id' => $model->id])?>
									</li>
									<li>
										<?= Html::a('Amigos',['user/ver-amigos', 'id' => $model->id])
										?>
									</li>
									<?php 
									if($model->id == Yii::$app->user->id){
									?>
									<li>
										<?=
										Html::a('Galería',['user/galeria','id' => $model->id]);
										?>
									</li>
									<?php
									}
									?>
								</ul>
								<?php
								}
								?>
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
								<?php
								if(!Yii::$app->user->isGuest){
								?>
								<ul class="profile-menu">
								<?php
									if($model->id != Yii::$app->user->id){
								?>
									<li>
										<?=
											Html::a('Galería',['user/galeria','id' => $model->id]);	
										?>
									</li>
									<?php
										if(!Yii::$app->user->isGuest && !in_array($id, $usuario->blockeds)){
											echo "<li>" . Html::a('Bloquear',['user/bloquear','id' => $model->id]) . "</li>";
										} else {
											echo "<li>" . Html::a('Desbloquear',['user/desbloquear','id' => $model->id]) . "</li>";
										}
									} else {
									?>
								<li>
									<a id='abrir' href='#crear_tag' class='btn btn-primary btn-xs fbox_quick_start'>Crear tag</a>
								</li>
								<li>
									<?=
									Html::a('Subir foto',['foto/create','id'=>$model->id],['class' => 'btn btn-blue btn-xs']);
									?>
								</li>
								<li id="btn_logout">
									<?=
									Html::a('Cerrar sesión',['site/logout','id'=>$model->id],['class' => 'btn btn-purple btn-xs'], ['method' => 'post']);
									?>
								</li>
									<?php
										}
									?>
								</ul>
								<?php
								}
								?>
							</div>
						</div>
						<?php
						if(!Yii::$app->user->isGuest  || (isset($usuario) && !in_array($id, $usuario->blockeds))){
						?>
						<div class="control-block-button">
							<?php
							if(Yii::$app->user->id != $model->id && !in_array(Yii::$app->user->id, $model->blockeds)){
								if(!in_array($model->id,$usuario->blockeds)){
									if(!in_array(Yii::$app->user->id,$model->friends)){
										if(in_array($model->id, $usuario->peticiones)){
											echo Html::a('<span class="icon-add without-text">
		                                    <svg class="olymp-happy-face-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
		                                </span>', ['user/aceptar', 'id' => $id], ['class' => 'accept-request','id' => 'aceptar']);
											echo Html::a('<span class="icon-minus">
	                                            <svg class="olymp-happy-face-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
	                                        </span>', ['user/rechazar', 'id' => $id], ['class' => 'accept-request','id' => 'rechazar']);

										} else if(!in_array(Yii::$app->user->id, $model->peticiones)){
											echo Html::a('<span class="icon-add without-text">
		                                    <svg class="olymp-happy-face-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
		                                </span>', ['user/enviar-peticion', 'id' => $id], ['class' => 'accept-request']);
										}else {
											echo Html::a('<span class="icon-minus">
	                                            <svg class="olymp-happy-face-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
	                                        </span>', ['user/eliminar-peticion', 'id' => $id], ['class' => 'accept-request']);
										}
									
	                            	} else {
	                                        
	                            		echo Html::a('<span class="icon-minus">
	                                            <svg class="olymp-happy-face-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
	                                        </span>', ['user/eliminar', 'id' => $id], ['class' => 'accept-request']);
	                            	}
								}
							} else if(Yii::$app->user->id == $model->id ){
							?>

							<div class="btn btn-control bg-primary more">
								<svg class="olymp-settings-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-settings-icon"></use></svg>

								<ul class="more-dropdown more-with-triangle triangle-bottom-right">
									<li>
										<?= Html::a('Configuración',['user/configuracion']);
										?>
									</li>
								</ul>
							</div>
							<?php
							}
							?>
						</div>
						<?php
						}
						?>
					</div>
					<div class="top-header-author">
						<?=
						Html::a('<img id="foto_perfil" src="'.$model->getAvatarUrl().'" alt="author">', ['user/perfil'], ['class' => 'author-thumb'])
						?>
						<div class="author-content">
							<?= Html::a($model->name,['user/perfil'],['class' => 'h4 author-name'])?>
							<div class="country"><?=$centro->getNombreCompleto()?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
if(Yii::$app->user->isGuest || (Yii::$app->user->id != $id && !in_array(Yii::$app->user->id, $model->friends) && $model->privado == User::PRIVADO) || (Yii::$app->user->id != $id && in_array(Yii::$app->user->id, $model->blockeds))){
?>
<div class="container">
		<div class="row">
			<div class="col col-xl-4 col-lg-12 col-md-12 m-auto">
				<div class="logout-content">
					<div class="logout-icon">
						<svg class="svg-inline--fa fa-times fa-w-12" aria-hidden="true" data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M323.1 441l53.9-53.9c9.4-9.4 9.4-24.5 0-33.9L279.8 256l97.2-97.2c9.4-9.4 9.4-24.5 0-33.9L323.1 71c-9.4-9.4-24.5-9.4-33.9 0L192 168.2 94.8 71c-9.4-9.4-24.5-9.4-33.9 0L7 124.9c-9.4 9.4-9.4 24.5 0 33.9l97.2 97.2L7 353.2c-9.4 9.4-9.4 24.5 0 33.9L60.9 441c9.4 9.4 24.5 9.4 33.9 0l97.2-97.2 97.2 97.2c9.3 9.3 24.5 9.3 33.9 0z"></path></svg><!-- <i class="fas fa-times"></i> -->
					</div>
					<?php
					if(in_array(Yii::$app->user->id, $model->blockeds)){
						echo "<p>¡Vaya!, parece que $model->name te ha bloqueado.</p>";
					}else{
						?>
						<h6>¿Quieres ver el perfil de <?=$model->name?>?</h6>
						<?php
						if(Yii::$app->user->isGuest){
							echo "<p>" . Html::a('Inicia sesión',['site/login']) . " o ¡" . Html::a('regístrate',['site/registro']) . " ahora y crea tu propio perfil y disfruta de las increíbles características de TeachTag!";
						} else if(in_array(Yii::$app->user->id,$model->peticiones)){
							echo "<p>¡Espera a que acepte tu solicitud!</p>";
						}else if(in_array($id, $usuario->blockeds)) {
							echo "<p>¡Desbloquéalo!</p>";
						} else if($model->privado == User::PRIVADO && in_array($model->id,$usuario->peticiones)){
							echo "<p>¡Acepta su solicitud de amistad!</p>";
						} else {
							echo "<p>¡Envíale una petición de amistad!</p>";
						}
					}
						?>
				</div>
			</div>
		</div>
	</div>
<?php
}else {
?>
<div class="container">
	<div class="row">

		<!-- Main Content -->
		
		<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
			<div id="newsfeed-items-grid">

				<?php $model->imprimirTimeline($id); ?>
			</div>
		</div>

		<!-- ... end Main Content -->
		<!-- Left Sidebar -->

		<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Quizás te interese <a id='cuadro' href='#' class="author-subtitle">(Esconder)</a></h6>
				</div>
				<div id='fantasma' class="ui-block-content">

					<!-- W-Personal-Info -->
					
					<ul class="widget w-personal-info item-block">
						<li>
							<span class="title">Sobre mí:</span>
							<span class="text"><?=$model->descripcion?></span>
						</li>
						<li>
							<span class="title">Películas y series favoritas:</span>
							<span class="text"><?= $model->films ?></span>
						</li>
						<li>
							<span class="title">Música y artistas preferidos:</span>
							<span class="text"><?= $model->music ?></span>
						</li>
						<li>
							<span class="title">Hobbies:</span>
							<span class="text"><?= $model->hobbies ?></span>
						</li>
					</ul>
					
					<!-- .. end W-Personal-Info -->
					<!-- W-Socials -->
					
					<div class="widget w-socials">
						<h6 class="title">Otras redes sociales:</h6>
						<?php if($model->facebook !== ""){ ?>
						<?= Html::a("<i class='fab fa-facebook' aria-hidden='true'></i> Facebook", $model->facebook, ['class' => 'social-item bg-facebook']) ?>
					<?php }
					if($model->twitter !== ""){ ?>
						<?= Html::a("<i class='fab fa-twitter' aria-hidden='true'></i> Twitter", $model->twitter, ['class' => 'social-item bg-twitter']) ?>
					<?php
					}
					?>
					</div>
					
					
					<!-- ... end W-Socials -->
				</div>
			</div>

		</div>

		<!-- ... end Left Sidebar -->


		<!-- Right Sidebar -->

		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Últimas fotos: <a id='fotillis' href='#' class="author-subtitle">(Esconder)</a></h6>
				</div>
				<div id='feos' class="ui-block-content">

					<!-- W-Latest-Photo -->
					
					<ul class="widget w-last-photo js-zoom-gallery">
						<?= $model->mostrarFotos(); ?>
					</ul>
					
					
					<!-- .. end W-Latest-Photo -->
				</div>
			</div>

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Amigos (<?= count($model->friends)?>) <a id='amiguis' href='#' class="author-subtitle">(Esconder)</a></h6>
				</div>
				<div id='talue'class="ui-block-content">

					<!-- W-Faved-Page -->
					
					<ul class="widget w-badges">
						<?php 
							$model->mostrarAmigos();
						?>
						<?php
						if(count($model->friends) > 15){
						?>
						<li class="all-users">
							<?= Html::a('+'.(count($model->friends)-15), ['user/ver-amigos', 'id'=>$model->id])?>
						</li>
						<?php
						}
						?>
					</ul>
					
					<!-- .. end W-Faved-Page -->
				</div>
			</div>

		</div>

		<!-- ... end Right Sidebar -->

	</div>
</div>


<?php
}
?>