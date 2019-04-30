<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ui-block">
	<div class="ui-block-title">
		<h6 class="title">Hobbies e intereses</h6>
	</div>
	<div class="ui-block-content">
					<!-- Form Hobbies and Interests -->
					
		<form>
			<div class="row">					
				<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="form-group label-floating">
						<label class="control-label">Sobre mí</label>
						<textarea class="form-control" placeholder="">I like to ride the bike to work, swimming, and working out. I also like reading design magazines, go to museums, and binge watching a good tv show while it’s raining outside.
						</textarea>
						<span class="material-input"></span>
					</div>
					<div class="form-group label-floating">
						<label class="control-label">Películas y series favoritas</label>
						<textarea class="form-control" placeholder="">Breaking Good, RedDevil, People of Interest, The Running Dead, Found,  American Guy.
						</textarea>
						<span class="material-input"></span>
					</div>
					<button class="btn btn-primary btn-lg full-width">Guardar</button>
				</div>					
				<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="form-group label-floating">
						<label class="control-label">Hobbies</label>
						<textarea class="form-control" placeholder="">I like to ride the bike to work, swimming, and working out. I also like reading design magazines, go to museums, and binge watching a good tv show while it’s raining outside.
						</textarea>
						<span class="material-input"></span>
					</div>
					<div class="form-group label-floating">
						<label class="control-label">Música y artistas preferidos</label>
						<textarea class="form-control" placeholder="">Breaking Good, RedDevil, People of Interest, The Running Dead, Found,  American Guy.
						</textarea>
						<span class="material-input"></span>
					</div>
					<button class="btn btn-secondary btn-lg full-width">Volver sin guardar</button>
					
				</div>
		</form>
	</div>
					
	<!-- ... end Form Hobbies and Interests -->

	</div>	
</div>