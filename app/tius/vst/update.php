<?php require '../../../base.php'; ?>
<?php foreach($mtius->poride($ide) as $r): ?>
	<form action="" class="op2">
		<?php echo $fn->modalHeader('Actualizar tipo de usuario'); ?>
		<div class="modal-body">
			<div class="msj"></div>
			<div class="form-group">
				<label for="" class="control-label col-sm-12 bolder">Descripción</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="des" value="<?php echo $r->tius_descrip ?>">
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
		var formulario = '.op2';
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
				$.post('prc-mtius-update',$(formulario).serialize(),function(data){
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