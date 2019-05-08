<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = "Configuración de la cuenta";

if(isset($_GET['id'])){
	if($_GET['id'] != Yii::$app->user->id){
		$this->title = "Perfil de ".$model->name;
	}
}

?>

<div class="container">
	<div class="row">
		<div class="profile-settings-responsive">

	<a href="#" class="js-profile-settings-open profile-settings-open">
		<svg class="svg-inline--fa fa-angle-right fa-w-8" aria-hidden="true" data-prefix="fa" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path></svg><!-- <i class="fa fa-angle-right" aria-hidden="true"></i> -->
		<svg class="svg-inline--fa fa-angle-left fa-w-8" aria-hidden="true" data-prefix="fa" data-icon="angle-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"></path></svg><!-- <i class="fa fa-angle-left" aria-hidden="true"></i> -->
	</a>
	<div class="mCustomScrollbar ps ps--theme_default" data-mcs-theme="dark" data-ps-id="9d5cd592-1072-cf0b-f263-a2c950017370">
		<div class="ui-block">
			<div class="your-profile">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Tu perfil</h6>
					</div>
				
					<div id="accordion" role="tablist" aria-multiselectable="true">
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<h6 class="mb-0">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Configuración
										<svg class="olymp-dropdown-arrow-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
									</a>
								</h6>
							</div>
				
							<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
								<ul class="your-profile-menu">
									<li>
										<?=
										Html::a('Información personal', ['user/configuracion'])
										?>
									</li>
									<li>
										<?=
										Html::a('Cambiar contraseña', ['user/configuracion', 'cp' => 1])
										?>
									</li>
									<li>
										<?=
										Html::a('Sobre mí', ['user/configuracion', 'am' => 1])
										?>
									</li>
									<li>
										<?=
										Html::a('Cambiar imagen perfil', ['user/configuracion', 'ci' => 1])
										?>
									</li>
									<li>
										<?=
										Html::a('Cambiar imagen cabecera', ['user/configuracion', 'cc' => 1])
										?>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
		</div>
	<div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
</div>
		<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<?php
			if(isset($_GET['cp'])){
				echo $this->render('_formChangePass', [
			        'changePasswordModel' => $changePasswordModel,
			        'centro' => $centro
			    ]);
			}else if(isset($_GET['am'])) {
				echo $this->render('_formAbout', [
			        'model' => $model,
			        'centro' => $centro
			    ]);
			} else if(isset($_GET['ci'])){
				echo $this->render('_formChangeImage', [
			        'model' => $model,
			        'centro' => $centro
			    ]);
			} else if(isset($_GET['cc'])){
				echo $this->render('_formChangeCabe', [
			        'model' => $model,
			        'centro' => $centro
			    ]);
			}else{
				echo $this->render('_formInfPer', [
			        'model' => $model,
			        'centro' => $centro
			    ]);
			}
			?>
		</div>

		<div class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12  responsive-display-none">
			<div class="ui-block">
				<!-- Your Profile  -->
				
				<div class="your-profile">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Tu perfil</h6>
					</div>
				
					<div id="accordion" role="tablist" aria-multiselectable="true">
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<h6 class="mb-0">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Configuración
										<svg class="olymp-dropdown-arrow-icon"><use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
									</a>
								</h6>
							</div>
				
							<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
								<ul class="your-profile-menu">
									<li>
										<?=
										Html::a('Información personal', ['user/configuracion'])
										?>
									</li>
									<li>
										<?=
										Html::a('Cambiar contraseña', ['user/configuracion', 'cp' => 1])
										?>
									</li>
									<li>
										<?=
										Html::a('Sobre mí', ['user/configuracion', 'am' => 1])
										?>
									</li>
									<li>
										<?=
										Html::a('Cambiar imagen perfil', ['user/configuracion', 'ci' => 1])
										?>
									</li>
									<li>
										<?=
										Html::a('Cambiar imagen cabecera', ['user/configuracion', 'cc' => 1])
										?>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				
				<!-- ... end Your Profile  -->
				

			</div>
		</div>
	</div>
</div>
