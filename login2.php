<?php 
require 'cfg/base.php';
$cusuarios->redirectIndex();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Login Administración - Imparques</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php require 'css/ace.php'; ?>
	</head>

	<body>
	<div class="fondo"></div>
		<div class="col-sm-10 col-sm-offset-1">
			<img src="img/fondo1.jpg" alt="" class="logo">

			<form action="" class="col-sm-6 col-sm-offset-3 login">
				<div class="msj"></div>
				<div class="form-group col-sm-6">
					<div class="col-sm-12">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="icon-user blue bigger-150"></i>
							</span>
							<input type="text" class="form-control input-lg" name="usuario" placeholder="Usuario">
						</div>
					</div>
				</div>
				<div class="form-group col-sm-6">
					<div class="col-sm-12">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="icon-key blue bigger-150"></i>
							</span>
							<input type="password" class="form-control  input-lg" name="clave" placeholder="Contraseña">
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="form-actions clearfix">
					<div class="btn-group pull-right">
						<button type="button" class="btn btn-gray" onclick="location.href='recuperar.php'"><i class="fa fa-lock"></i> Recuperar</button>
						<button class="btn btn-inverse"><i class="fa fa-key"></i> Entrar</button>
					</div>
				</div>
				
			</form>
			<div class="clearfix"></div>
		</div>
		<?php require 'js/ace.php'; ?>
		
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
								location.href='admin.php';
							} else {
								alerta('.msj','danger',data);
							}
						});
					},
					invalidHandler: function (form) {
					}
				});
			})
		</script>

	</body>
</html>