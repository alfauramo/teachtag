<div class="ui-block">
	<div class="ui-block-title">
		<h6 class="title">Información personal</h6>
	</div>
	<div class="ui-block-content">				
		<!-- Personal Information Form  -->
					
		<form>
			<div class="row">
					
				<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="form-group label-floating">
						<label class="control-label">Nombre</label>
						<input class="form-control" placeholder="" value="<?= $model->name ?>" type="text">
					<span class="material-input"></span></div>
					
					<div class="form-group label-floating">
						<label class="control-label">Correo electrónico</label>
						<input class="form-control" placeholder="" value="<?= $model->email ?>" type="email">
					<span class="material-input"></span></div>			
				</div>
					
				<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="form-group label-floating">
						<label class="control-label">Usuario</label>
						<input class="form-control" placeholder="" value="@<?= $model->username ?>" type="text">
					<span class="material-input"></span></div>
					
					<div class="form-group date-time-picker label-floating">
						<label class="control-label">Cumpleaños</label>
						<input name="datetimepicker" value="<?= $model->birthday ?>" >
						<span class="input-group-addon">
							<svg class="olymp-month-calendar-icon icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use></svg>
						</span>
					</div>
				</div>
					
				<div class="col col-lg-4 col-md-4 col-sm-12 col-12" >
					<fieldset disabled="">
						<div class="form-group has-disabled label-floating is-select">
							<label class="control-label">Tu centro</label>
							<input class="form-control" placeholder="<?= $centro->nombre ?>" type="text">
						<span class="material-input"></span></div>
					</fieldset>				
				</div>
				<div class="col col-lg-4 col-md-4 col-sm-12 col-12" >
					<fieldset disabled="">
						<div class="form-group has-disabled label-floating is-select">
							<label class="control-label">Municipio</label>
							<input class="form-control" placeholder="<?= $centro->poblacion ?>" type="text">
						<span class="material-input"></span></div>
					</fieldset>
				</div>
				<div class="col col-lg-4 col-md-4 col-sm-12 col-12" >
					<fieldset disabled="">
						<div class="form-group has-disabled label-floating is-select">
							<label class="control-label">Provincia</label>
							<input class="form-control" placeholder="<?= $centro->provincia ?>" type="text">
						<span class="material-input"></span></div>
					</fieldset>
				</div>
				<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="form-group with-icon label-floating">
						<label class="control-label">Tu cuenta de Facebook</label>
						<input class="form-control" value="<?= $model->facebook ?>" type="text">
						<svg class="svg-inline--fa fa-facebook-f fa-w-9 c-facebook" aria-hidden="true" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264 512" data-fa-i2svg=""><path fill="currentColor" d="M76.7 512V283H0v-91h76.7v-71.7C76.7 42.4 124.3 0 193.8 0c33.3 0 61.9 2.5 70.2 3.6V85h-48.2c-37.8 0-45.1 18-45.1 44.3V192H256l-11.7 91h-73.6v229"></path></svg><!-- <i class="fab fa-facebook-f c-facebook" aria-hidden="true"></i> -->
					<span class="material-input"></span></div>
					<div class="form-group with-icon label-floating">
						<label class="control-label">Tu cuenta de Twitter</label>
						<input class="form-control" value="<?= $model->twitter ?>" type="text">
						<svg class="svg-inline--fa fa-twitter fa-w-16 c-twitter" aria-hidden="true" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg><!-- <i class="fab fa-twitter c-twitter" aria-hidden="true"></i> -->
						<span class="material-input"></span>
					</div>				
				</div>
				<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
					<button class="btn btn-primary btn-lg full-width">Guardar</button>
				</div>
				<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
					<button class="btn btn-secondary btn-lg full-width">Volver sin guardar</button>
				</div>
			</div>
		</form>
					
					<!-- ... end Personal Information Form  -->
	</div>
</div>