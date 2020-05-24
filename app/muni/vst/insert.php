<?php require '../../../base.php'; ?>

<form action="" class="op1">
	<div class="msj"></div>
	<div class="form-group">
		<label for="" class="control-label col-sm-12 bolder">Descripción</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="des">
		</div>
		<div class="col-sm-2">
			<button class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Ok</button>
		</div>
	</div>
	<input type="hidden" name="esta" value="<?php echo $esta ?>">
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
				$.post('prc-mmuni-insert',$(formulario).serialize(),function(data){
					if(data==1) {
						load('vst-muni-lista','esta=<?php echo $esta ?>','.lista2');
						load('vst-muni-insert','esta=<?php echo $esta ?>','.insert');
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