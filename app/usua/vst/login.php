<div class="col-sm-5 banner2 well" style="padding-top: 20px; max-height:300px;height:300px;box-shadow: 0 0 2px #000">
	<div class="page-header">
		<h1>
			Iniciar Sesión
			<small class="msj"></small>
		</h1>
	</div>
	<div class="col-sm-2">
		<img src="img/login.png" alt="" style="margin: 10px 0px 0px 0px">
	</div>
	<form action="" class="col-sm-10 login">
		<div class="form-group col-sm-12">
			<div class="col-sm-9">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-user bigger-110"></i>
					</span>
					<input class="form-control" name="usuario" id="" type="text" placeholder="Usuario">
				</div>
			</div>		
		</div>
		<div class="form-group col-sm-12">
			<div class="col-sm-9">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-lock bigger-110"></i>
					</span>
					<input class="form-control" name="clave" id="" type="password" placeholder="Contraseña">
				</div>
			</div>		
			<div class="col-sm-2">
				<button class="btn btn-primary btn-sm">
					<i class="fa fa-check"></i> Entrar
				</button>
			</div>
		</div>
	</form>
	<div class="row">
		<div class="col-sm-12">
			<a href="">¿Ha olvidado su contraseña?</a> |
			<a href="">Tips de Seguridad</a> |
			<a href="">Crear una Cuenta Nueva</a>	
		</div>
	</div>	
	<div class="space-10"></div>
	<div class="row">
		<div class="col-sm-12">
			<button class="btn btb-lg btn-inverse pull-right bolder">
				Información de Cuenta
			</button>
			<button class="btn btb-lg btn-inverse pull-right bolder">
				Preguntas Frecuentes
			</button>
		</div>
	</div>			
</div>
															
<script>
	$(function(){
		$('.login').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			rules: {
				usuario: {
					required: true,
				},
				clave: {
					required: true,
				},
			},

			messages: {
				usuario: {
					required: 'Obligatorio',
				},
				clave: {
					required: 'Obligatorio',
				},
			},

			invalidHandler: function (event, validator) { //display error alert on form submit   
				$('.alert-danger', $('.login')).show();
			},

			highlight: function (e) {
				$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			},

			success: function (e) {
				$(e).closest('.form-group').removeClass('has-error').addClass('has-info');
				$(e).remove();
			},

			submitHandler: function (form) {
				$.post('prc-cusuarios-clogin',$('.login').serialize(), function(data){
					if(data==1) {
						location.reload();
					} else {
						$('.msj').html(data);
					}
				});
			},
			invalidHandler: function (form) {
			}
		});
	})
</script>