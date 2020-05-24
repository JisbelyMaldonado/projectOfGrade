<?php require '../../../base.php'; ?>
<?php echo $fn->modalWidth('60%') ?>
<form action="" class="op1">
	<?php echo $fn->modalHeader('Agregar Parque'); ?>
	<div class="modal-body">
		<div class="msj"></div>
		<div class="form-group col-sm-6">
			<label for="" class="control-label col-sm-12 bolder">Nombre:</label>
			<div class="col-sm-12">
				<input type="text" class="form-control" name="nom">
			</div>
		</div>
		<div class="form-group col-sm-6">
			<label for="" class="control-label col-sm-12 bolder">Característica Principal:</label>
			<div class="col-sm-12">
				<input type="text" class="form-control" name="car">
			</div>
		</div>
		<div class="form-group col-sm-6">
			<label for="" class="control-label col-sm-12 bolder">Latitud:</label>
			<div class="col-sm-12">
				<input type="text" class="form-control" name="lat">
			</div>
		</div>
		<div class="form-group col-sm-6">
			<label for="" class="control-label col-sm-12 bolder">Longitud:</label>
			<div class="col-sm-12">
				<input type="text" class="form-control" name="lon">
			</div>
		</div>
		<div class="form-group col-sm-6">
			<label for="" class="control-label col-sm-12 bolder">Clima:</label>
			<div class="col-sm-12">
				<input type="text" class="form-control" name="cli">
			</div>
		</div>
		<div class="form-group col-sm-6">
			<label for="" class="control-label col-sm-12 bolder">msnm:</label>
			<div class="col-sm-12">
				<input type="text" class="form-control" name="msn">
			</div>
		</div>
		<div class="form-group col-sm-6">
			<label for="" class="control-label col-sm-12 bolder">Límite Norte:</label>
			<div class="col-sm-12">
				<input type="text" class="form-control" name="nor">
			</div>
		</div>
		<div class="form-group col-sm-6">
			<label for="" class="control-label col-sm-12 bolder">Límite Sur:</label>
			<div class="col-sm-12">
				<input type="text" class="form-control" name="sur">
			</div>
		</div>
		<div class="form-group col-sm-6">
			<label for="" class="control-label col-sm-12 bolder">Límite Este:</label>
			<div class="col-sm-12">
				<input type="text" class="form-control" name="est">
			</div>
		</div>
		<div class="form-group col-sm-6">
			<label for="" class="control-label col-sm-12 bolder">Límite Oeste:</label>
			<div class="col-sm-12">
				<input type="text" class="form-control" name="oes">
			</div>
		</div>
		<div class="form-group col-sm-6">
			<label for="" class="control-label col-sm-12 bolder">Otro Detalle:</label>
			<div class="col-sm-12">
				<input type="text" class="form-control" name="det">
			</div>
		</div>
		<div class="form-group col-sm-6">
			<label for="" class="control-label col-sm-12 bolder">Ubicación General:</label>
			<div class="col-sm-12">
				<input type="text" class="form-control" name="ubi">
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<?php echo $fn->modalFooter(1) ?>
</form>

<script>
	$(function() { 
		var formulario = '.op1';
		$(formulario).validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			rules: {
				des: {
					required: true,
				},
				car: {
					required: true,
				},
				lat: {
					required: true,
					number: true,
				},
				lon: {
					required: true,
					number: true,
				},
			},

			messages: {
				des: {
					required: 'Obligatorio',
				},
				car: {
					required: 'Obligatorio',
				},
				lat: {
					required: 'Obligatorio',
					number: 'Numérico',
				},
				lon: {
					required: 'Obligatorio',
					number: 'Numérico',
				},
			},

			invalidHandler: function (event, validator) { //display error alert on form submit   
				$('.alert-danger', $(formulario)).show();
			},

			highlight: function (e) {
				$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			},

			success: function (e) {
				$(e).closest('.form-group').removeClass('has-error').addClass('has-info');
				$(e).remove();
			},

			submitHandler: function (form) {
				$.post('prc-mparq-insert',$(formulario).serialize(),function(data){
					if(data==1) {
						load('vst-parq-lista','','.lista');
						cerrarmodal();
					} else {
						alerta('.msj','danger',data);
					}
				})
			},
			invalidHandler: function (form) {
			}
		});
	})
</script>