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
								<ul class="profile-menu">
									<li>
										<?= Html::a('Timeline',['user/timeline'])?>
									</li>
									<li>
										<?= Html::a('Perfil',['user/perfil', 'id' => $model->id])?>
									</li>
									<li>
										<?= Html::a('Amigos',['user/ver-amigos', 'id' => $model->id], ['class' => 'active'])
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
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
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
									<?=
									Html::a('Crear tag',['','id'=>$model->id],['class' => 'btn btn-primary btn-xs']);
									?>
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
							</div>
						</div>
						<?php
						if(!Yii::$app->user->isGuest  || !in_array($id, $usuario->blockeds)){
						?>
						<div class="control-block-button">
							<?php
							if(Yii::$app->user->id != $model->id && !in_array(Yii::$app->user->id, $model->blockeds)){
								if(!in_array($model->id,$usuario->blockeds)){
									if(!in_array(Yii::$app->user->id,$model->friends)){
										if(in_array($model->id, $usuario->peticiones)){
											echo Html::a('<span class="icon-add without-text">
		                                    <svg class="olymp-happy-face-icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
		                                </span>', ['user/aceptar', 'id' => $id], ['class' => 'accept-request','id' => 'aceptar']);
											echo Html::a('<span class="icon-minus">
	                                            <svg class="olymp-happy-face-icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
	                                        </span>', ['user/rechazar', 'id' => $id], ['class' => 'accept-request','id' => 'rechazar']);

										} else if(!in_array(Yii::$app->user->id, $model->peticiones)){
											echo Html::a('<span class="icon-add without-text">
		                                    <svg class="olymp-happy-face-icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
		                                </span>', ['user/enviar-peticion', 'id' => $id], ['class' => 'accept-request']);
										}else {
											echo Html::a('<span class="icon-minus">
	                                            <svg class="olymp-happy-face-icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
	                                        </span>', ['user/eliminar-peticion', 'id' => $id], ['class' => 'accept-request']);
										}
									
	                            	} else {
	                                        
	                            		echo Html::a('<span class="icon-minus">
	                                            <svg class="olymp-happy-face-icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
	                                        </span>', ['user/eliminar', 'id' => $id], ['class' => 'accept-request']);
	                            	}
								}
							} else if(Yii::$app->user->id == $model->id ){
							?>
							<a href="35-YourAccount-FriendsRequests.html" class="btn btn-control bg-blue">
								<svg class="olymp-happy-face-icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
							</a>

							<div class="btn btn-control bg-primary more">
								<svg class="olymp-settings-icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-settings-icon"></use></svg>

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
						<a href="02-ProfilePage.html" class="author-thumb">
							<img id="foto_perfil" src="<?= $model->getAvatarUrl()?>" alt="author">
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

<!-- Friends -->

<div class="container">
	<div class="row">
		<?= $model->mostrarAmigosPlantilla()?>
	</div>
</div>

<!-- ... end Friends -->
