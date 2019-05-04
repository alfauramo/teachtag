<?php

use yii\helpers\Html;
use app\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = "Mi perfil";

if(isset($_GET['id'])){
	if($_GET['id'] != Yii::$app->user->id){
		$this->title = "Perfil de ".$model->name;
	}
	$id = $_GET['id'];
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
						<img src="<?= $model->img_cabecera === null ?  'theme/img/top-header1.jpg' : $model->img_cabecera ?>
						" alt="nature">
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="#" class="active">Timeline</a>
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
										Html::a('Fotos',['user/fotos','id' => $model->id]);
										?>
									</li>
									<?php
									}
									?>
								</ul>
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
								<?php
									if($model->id != Yii::$app->user->id){
								?>
									<li>
										<?=
											Html::a('Fotos',['user/fotos','id' => $model->id]);	
										?>
									</li>
									<?php
										if(!Yii::$app->user->isGuest)
											echo "<li>" . Html::a('Bloquear',['user/Bloquear','id' => $model->id]) . "</li>";
									} else {
									?>
								<li>
									<?=
									Html::a('Crear tag',['','id'=>$model->id],['class' => 'btn btn-primary btn-xs']);
									?>
								</li>
								<li>
									<?=
									Html::a('Subir foto',['foto/upload','id'=>$model->id],['class' => 'btn btn-blue btn-xs']);
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
							</div>
						</div>
						<?php
						if(!Yii::$app->user->isGuest){
						?>
						<div class="control-block-button">
							<?php
							if(Yii::$app->user->id != $model->id){
								if(!in_array(Yii::$app->user->id,$model->friends) ){
									echo Html::a('<span class="icon-add without-text">
	                                    <svg class="olymp-happy-face-icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
	                                </span>', ['user/enviar-peticion', 'id' => $id], ['class' => 'accept-request']);
                            	} else {
                                        
                            		echo Html::a('<span class="icon-minus">
                                            <svg class="olymp-happy-face-icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                        </span>', ['user/eliminar', 'id' => $id], ['class' => 'accept-request']);
                            	}

							} else {
							?>
							<a href="35-YourAccount-FriendsRequests.html" class="btn btn-control bg-blue">
								<svg class="olymp-happy-face-icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
							</a>

							<div class="btn btn-control bg-primary more">
								<svg class="olymp-settings-icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-settings-icon"></use></svg>

								<ul class="more-dropdown more-with-triangle triangle-bottom-right">
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Actualizar foto del perfil</a>
									</li>
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Actualizar cabecera</a>
									</li>
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
						<a href="02-ProfilePage.html" class="author-thumb">
							<img id="foto_perfil" src="<?= $model->img_perfil === null ?  './img/perfil.png' : $model->img_perfil ?>" alt="author">
						</a>
						<div class="author-content">
							<a href="02-ProfilePage.html" class="h4 author-name"><?= $model->name; ?></a>
							<div class="country"><?=$centro->getNombreCompleto()?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
if(Yii::$app->user->isGuest || (isset($id) && $id !== Yii::$app->user->id && !in_array(Yii::$app->user->id, $model->friends) && $model->privado == User::PRIVADO)){
?>
<div class="container">
		<div class="row">
			<div class="col col-xl-4 col-lg-12 col-md-12 m-auto">
				<div class="logout-content">
					<div class="logout-icon">
						<svg class="svg-inline--fa fa-times fa-w-12" aria-hidden="true" data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M323.1 441l53.9-53.9c9.4-9.4 9.4-24.5 0-33.9L279.8 256l97.2-97.2c9.4-9.4 9.4-24.5 0-33.9L323.1 71c-9.4-9.4-24.5-9.4-33.9 0L192 168.2 94.8 71c-9.4-9.4-24.5-9.4-33.9 0L7 124.9c-9.4 9.4-9.4 24.5 0 33.9l97.2 97.2L7 353.2c-9.4 9.4-9.4 24.5 0 33.9L60.9 441c9.4 9.4 24.5 9.4 33.9 0l97.2-97.2 97.2 97.2c9.3 9.3 24.5 9.3 33.9 0z"></path></svg><!-- <i class="fas fa-times"></i> -->
					</div>
					<h6>¿Quieres ver el perfil de <?=$model->name?>?</h6>
					<?php
					if(Yii::$app->user->isGuest){

						echo "<p>" . Html::a('Inicia sesión',['site/login']) . " o ¡" . Html::a('regístrate',['user/signup']) . " ahora y crea tu propio perfil y disfruta de las increíbles características de TeachTag!";
					} else {
					?>
					<p><?php echo "¡Envíale una petición de amistad!"; }?></p>
					
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

				<?php $model->imprimir($id); ?>
			</div>

			<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
				<svg class="olymp-three-dots-icon">
					<use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
				</svg>
			</a>
		</div>

		<!-- ... end Main Content -->


		<!-- Left Sidebar -->

		<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Quizás te interese</h6>
				</div>
				<div class="ui-block-content">

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
						<?= Html::a("<i class='fab fa-facebook' aria-hidden='true'></i> Facebook", $model->facebook, ['class' => 'social-item bg-facebook']) ?>
						<?= Html::a("<i class='fab fa-twitter' aria-hidden='true'></i> Twitter", $model->twitter, ['class' => 'social-item bg-twitter']) ?>
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
					<h6 class="title">Últimas fotos:</h6>
				</div>
				<div class="ui-block-content">

					<!-- W-Latest-Photo -->
					
					<ul class="widget w-last-photo js-zoom-gallery">
						<li>
							<a href="theme/img/last-photo10-large.jpg">
								<img src="theme/img/last-photo10-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="theme/img/last-phot11-large.jpg">
								<img src="theme/img/last-phot11-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="theme/img/last-phot12-large.jpg">
								<img src="theme/img/last-phot12-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="theme/img/last-phot13-large.jpg">
								<img src="theme/img/last-phot13-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="theme/img/last-phot14-large.jpg">
								<img src="theme/img/last-phot14-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="theme/img/last-phot15-large.jpg">
								<img src="theme/img/last-phot15-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="theme/img/last-phot16-large.jpg">
								<img src="theme/img/last-phot16-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="theme/img/last-phot17-large.jpg">
								<img src="theme/img/last-phot17-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="theme/img/last-phot18-large.jpg">
								<img src="theme/img/last-phot18-large.jpg" alt="photo">
							</a>
						</li>
					</ul>
					
					
					<!-- .. end W-Latest-Photo -->
				</div>
			</div>

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Amigos (<?= count($model->friends)?>)</h6>
				</div>
				<div class="ui-block-content">

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