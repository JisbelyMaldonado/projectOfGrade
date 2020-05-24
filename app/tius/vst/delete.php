<?php require '../../../base.php'; ?>
<?php foreach($mtius->poride($ide) as $r): ?>
	<form action="" class="op3">
		<?php echo $fn->modalHeader('Eliminar tipo de usuario'); ?>
		<div class="modal-body">
			<div class="msj">
				<div class="alert alert-info">¿Borrar el registro seleccionado?</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-12 bolder">Descripción</label>
				<div class="col-sm-12">
					<input disabled type="text" class="form-control" name="des" value="<?php echo $r->tius_descrip ?>">
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<?php echo $fn->modalFooter(1) ?>
		<input type="hidden" name="ide" value="<?php echo $r->tius_ide ?>">
	</form>
<?php endforeach; ?>
<script>
	$(function() { 
		var formulario = '.op3';
		$(formulario).validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			rules: {
				des: {
					required: true,
				},
			},

			messages: {
				des: {
					required: 'Obligatorio',
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
				$.post('prc-mtius-delete',$(formulario).serialize(),function(data){
					if(data==1) {
						load('vst-tius-lista','','.lista');
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