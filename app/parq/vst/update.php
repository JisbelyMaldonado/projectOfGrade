<?php require '../../../base.php'; ?>
<?php echo $fn->modalWidth('60%') ?>
<?php foreach($mparq->poride($ide) as $r): ?>
	<form action="" class="op1">
		<?php echo $fn->modalHeader('Agregar Parque'); ?>
		<div class="modal-body">
			<div class="msj"></div>
			<div class="form-group col-sm-6">
				<label for="" class="control-label col-sm-12 bolder">Nombre:</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="nom" value="<?php echo $r->parq_nombre ?>">
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="" class="control-label col-sm-12 bolder">Característica Principal:</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="car" value="<?php echo $r->parq_caracte ?>">
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="" class="control-label col-sm-12 bolder">Latitud:</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="lat" value="<?php echo $r->parq_latitud ?>">
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="" class="control-label col-sm-12 bolder">Longitud:</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="lon" value="<?php echo $r->parq_longitu ?>">
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="" class="control-label col-sm-12 bolder">Clima:</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="cli" value="<?php echo $r->parq_clima ?>">
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="" class="control-label col-sm-12 bolder">msnm:</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="msn" value="<?php echo $r->parq_msnm ?>">
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="" class="control-label col-sm-12 bolder">Límite Norte:</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="nor" value="<?php echo $r->parq_norte ?>">
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="" class="control-label col-sm-12 bolder">Límite Sur:</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="sur" value="<?php echo $r->parq_sur ?>">
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="" class="control-label col-sm-12 bolder">Límite Este:</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="est" value="<?php echo $r->parq_este ?>">
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="" class="control-label col-sm-12 bolder">Límite Oeste:</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="oes" value="<?php echo $r->parq_oeste ?>">
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="" class="control-label col-sm-12 bolder">Otro Detalle:</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="det" value="<?php echo $r->parq_detalle ?>">
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="" class="control-label col-sm-12 bolder">Ubicación General:</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="ubi" value="<?php echo $r->parq_ubicaci ?>">
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<?php echo $fn->modalFooter(1) ?>
		<input type="hidden" name="ide" value="<?php echo $r->parq_ide ?>">
	</form>
<?php endforeach; ?>
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
				$.post('prc-mparq-update',$(formulario).serialize(),function(data){
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