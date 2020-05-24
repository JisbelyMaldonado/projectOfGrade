<?php require '../../../base.php'; ?>

<form action="" class="op1">
	<?php echo $fn->modalHeader('Agregar Estado'); ?>
	<div class="modal-body">
		<div class="msj"></div>
		<div class="form-group">
			<label for="" class="control-label col-sm-12 bolder">Descripción</label>
			<div class="col-sm-12">
				<input type="text" class="form-control" name="des">
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
				$.post('prc-mesta-insert',$(formulario).serialize(),function(data){
					if(data==1) {
						load('vst-esta-lista','','.lista');
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