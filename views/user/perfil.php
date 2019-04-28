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
										<?= Html::a('Configuración',['user/ajustes']);
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
							<img src="theme/img/author-main1.jpg" alt="author">
						</a>
						<div class="author-content">
							<a href="02-ProfilePage.html" class="h4 author-name"><?= $model->name; ?></a>
							<div class="country">Centro del perfil</div>
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
								<img src="theme/img/author-page.jpg" alt="author">
					
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
							<span class="text">Hi, I’m James, I’m 36 and I work as a Digital Designer for the  “Daydreams” Agency in Pier 56.</span>
						</li>
						<li>
							<span class="title">Mis series y películas favoritas:</span>
							<span class="text">Breaking Good, RedDevil, People of Interest, The Running Dead, Found,  American Guy.</span>
						</li>
						<li>
							<span class="title">Mi música y artistas preferidos:</span>
							<span class="text">Iron Maid, DC/AC, Megablow, The Ill, Kung Fighters, System of a Revenge.</span>
						</li>
					</ul>
					
					<!-- .. end W-Personal-Info -->
					<!-- W-Socials -->
					
					<div class="widget w-socials">
						<h6 class="title">Otras redes sociales:</h6>
						<a href="#" class="social-item bg-facebook">
							<svg class="svg-inline--fa fa-facebook-f fa-w-9" aria-hidden="true" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264 512" data-fa-i2svg=""><path fill="currentColor" d="M76.7 512V283H0v-91h76.7v-71.7C76.7 42.4 124.3 0 193.8 0c33.3 0 61.9 2.5 70.2 3.6V85h-48.2c-37.8 0-45.1 18-45.1 44.3V192H256l-11.7 91h-73.6v229"></path></svg><!-- <i class="fab fa-facebook-f" aria-hidden="true"></i> -->
							Facebook
						</a>
						<a href="#" class="social-item bg-twitter">
							<svg class="svg-inline--fa fa-twitter fa-w-16" aria-hidden="true" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg><!-- <i class="fab fa-twitter" aria-hidden="true"></i> -->
							Twitter
						</a>
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