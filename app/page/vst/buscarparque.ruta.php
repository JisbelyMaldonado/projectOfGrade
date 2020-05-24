<?php require '../../../cfg/base.php'; ?>
<form action="" class="mapinter">
	<?php echo $fn->modalHeader('Buscar Parque y Analizar ruta') ?>
	<div class="modal-body">
		<div class="form-group">
			<label for="" class="control-label col-sm-12 bolder">Seleccione Parque</label>
			<div class="col-sm-12">
				<select name="parque" id="" class="form-control chosen">
					<option value=""></option>
					<?php foreach($mparq->lista() as $r): ?>
						<option value="<?php echo $r->parq_ide ?>"><?php echo $r->parq_nombre ?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<?php echo $fn->modalFooter(1) ?>
</form>

<script>
	$(function(){
		$('.chosen').chosen();
		$('.chosen-container,.chosen-container-single').prop('style','width:100%')
	})
</script>
<script>
	$(function() { 
		var formulario = '.mapinter';
		$(formulario).validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			rules: {
				parque: {
					required: true,
				},
			},

			messages: {
				
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
				load('vst-page-maparutaparque',$(formulario).serialize(),'.mapa');
				cerrarmodal();
			},
			invalidHandler: function (form) {
			}
		});
	})
</script>