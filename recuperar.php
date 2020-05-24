<?php 
require 'cfg/base.php';
$cusuarios->redirectIndex();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>..::[IMPARQUES]::..</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php require 'css/ace.php'; ?>
	</head>

	<body>
		<div class="col-sm-10 col-sm-offset-1">
			<!--<img src="img/logo.png" alt="" class="logo">-->
			<form action="" class="well col-sm-4 col-sm-offset-4 login">
				<div class="msj"></div>
				<div class="form-group col-sm-12">
					<label for="" class="col-sm-12 bolder control-label">Correo Electrónico:</label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="usuario" placeholder="Indique su correo electrónico">
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="form-actions clearfix">
					<button class="btn btn-primary pull-right"><i class="fa fa-key"></i> Enviar</button>
				</div>
				<a href="login2.php">Volver</a>
			</form>
			<div class="clearfix"></div>
			<div class="col-sm-12">
				<hr>
				<span class="text-muted pull-right">
					
				</span>
			</div>
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
					},

					messages: {
						usuario: {
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

					submitHandler: function (form)  {
						alerta('.msj','warning','Enviando, por favor espere...');
						$.post('prc-musuarios-recuperar',$('.login').serialize(), function(data){
							if(data==1) {
								alerta('.msj','success','La clave fue enviada a su correo electrónico');
							} else {
								alerta('.msj','danger','Error al enviar el correo');
							}
						});
					},
					invalidHandler: function (form) {
					},
				});
			})
		</script>

	</body>
</html>