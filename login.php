<?php 
require 'cfg/base.php';
?>
<form action="" class="loginpag form-horizontal">
	<?php echo $fn->modalHeader('Inicio de Sesión') ?>
	<div class="modal-body">
		<div class="msj"></div>
		<div class="form-group col-sm-12">
			<label for="" class="col-sm-3 bolder control-label">Usuario</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="usuario" placeholder="Nombre de Usuario">
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="" class="col-sm-3 bolder control-label">Clave</label>
			<div class="col-sm-8">
				<input type="password" class="form-control" name="clave" placeholder="Clave de Usuario">
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-default" type="button" data-bb-handler="cancel"><i class="fa fa-times"></i> ¿Ha olvidado su clave?</button>
		<button type="button" data-dismiss="modal" class="btn btn-default" type="button" data-bb-handler="cancel"><i class="fa fa-times"></i> Cancelar</button>
		<button class="btn btn-primary"><i class="fa fa-key"></i> Entrar</button>
	</div>
</form>
<script>
	$(function(){
		$('.loginpag').validate({
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
				$.post('prc-cusuarios-clogin',$('.loginpag').serialize(), function(data){
					if(data==1) {
						location.reload();
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