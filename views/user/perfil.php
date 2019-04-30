<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = "Mi perfil";

if(isset($_GET['id'])){
	if($_GET['id'] != Yii::$app->user->id){
		$this->title = "Perfil de ".$model->name;
	}
}

?>

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img src="theme/img/top-header1.jpg" alt="nature">
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
									<li>
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
											<ul class="more-dropdown more-with-triangle">
												<li>
													<?=
													Html::a('Eliminar amistad', ['user/eliminar-amistad','id' => $model->id]);
													?>
												</li>
												<li>
													<?=
													Html::a('Bloquear perfil',['user/bloquear', 'id' => $model->id])
													?>
												</li>
											</ul>
										</div>
									</li>
									<?php
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

						<div class="control-block-button">
							<?php
							if(Yii::$app->user->id != $model->id){
							?>
							<a href="#" class="accept-request">
                                <span class="icon-add without-text">
                                    <svg class="olymp-happy-face-icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                </span>
                            </a>
                            <?php
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
					</div>
					<div class="top-header-author">
						<a href="02-ProfilePage.html" class="author-thumb">
							<img src="<?= $model->img_perfil === null ?  './img/perfil.png' : $model->img_perfil ?>" width="120" alt="author">
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

<div class="container">
	<div class="row">

		<!-- Main Content -->

		<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
			<div id="newsfeed-items-grid">

				<div class="ui-block">
					<!-- Post -->
					
					<article class="hentry post">
					
							<div class="post__author author vcard inline-items">
								<img src="<?= $model->img_perfil === null ?  './img/perfil.png' : $model->img_perfil ?>" width="120" alt="author">
					
								<div class="author-date">
									<a class="h6 post__author-name fn" href="02-ProfilePage.html"><?= $model->name ?></a>
									<div class="post__date">
										<time class="published" datetime="2017-03-24T18:18">
											19 hours ago
										</time>
									</div>
								</div>
					
								<div class="more">
									<svg class="olymp-three-dots-icon">
										<use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
									</svg>
									<ul class="more-dropdown">
										<li>
											<a href="#">Editar Post</a>
										</li>
										<li>
											<a href="#">Eliminar Post</a>
										</li>
									</ul>
								</div>
					
							</div>
					
							<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
								pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
								mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem
								accusantium doloremque.
							</p>
					
							<div class="post-additional-info inline-items">
					
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-heart-icon">
										<use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
									</svg>
									<span>8</span>
								</a>
					
								<ul class="friends-harmonic">
									<li>
										<a href="#">
											<img src="theme/img/friend-harmonic7.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="theme/img/friend-harmonic8.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="theme/img/friend-harmonic9.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="theme/img/friend-harmonic10.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="theme/img/friend-harmonic11.jpg" alt="friend">
										</a>
									</li>
								</ul>
					
								<div class="names-people-likes">
									<a href="#">Jenny</a>, <a href="#">Robert</a> and
									<br>6 more liked this
								</div>
					
					
								<div class="comments-shared">
					
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-share-icon">
											<use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
										</svg>
										<span>24</span>
									</a>
								</div>
					
					
							</div>
					
							<div class="control-block-button post-control-button">
					
								<a href="#" class="btn btn-control">
									<svg class="olymp-like-post-icon">
										<use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
									</svg>
								</a>
					
								<a href="#" class="btn btn-control">
									<svg class="olymp-share-icon">
										<use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
									</svg>
								</a>
					
							</div>
					
						</article>
					
					<!-- .. end Post -->				</div>
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
					<h6 class="title">Amigos (86)</h6>
				</div>
				<div class="ui-block-content">

					<!-- W-Faved-Page -->
					
					<ul class="widget w-faved-page js-zoom-gallery">
						<li>
							<a href="#">
								<img src="theme/img/avatar38-sm.jpg" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="theme/img/avatar24-sm.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="theme/img/avatar36-sm.jpg" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="theme/img/avatar35-sm.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="theme/img/avatar34-sm.jpg" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="theme/img/avatar33-sm.jpg" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="theme/img/avatar32-sm.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="theme/img/avatar31-sm.jpg" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="theme/img/avatar30-sm.jpg" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="theme/img/avatar29-sm.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="theme/img/avatar28-sm.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="theme/img/avatar27-sm.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="theme/img/avatar26-sm.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="theme/img/avatar25-sm.jpg" alt="user">
							</a>
						</li>
						<li class="all-users">
							<a href="#">+74</a>
						</li>
					</ul>
					
					<!-- .. end W-Faved-Page -->
				</div>
			</div>

		</div>

		<!-- ... end Right Sidebar -->

	</div>
</div>