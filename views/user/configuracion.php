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
										<svg class="olymp-dropdown-arrow-icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
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
