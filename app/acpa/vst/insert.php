<?php require '../../../base.php'; ?>

<form action="" class="op1">
	<div class="msj"></div>
	<div class="form-group">
		<label for="" class="control-label col-sm-12 bolder">Actividad</label>
		<div class="col-sm-10">
			<select name="des" id="" class="form-control">
				<option value=""></option>
				<?php foreach($macti->lista() as $r): ?>
					<option value="<?php echo $r->acti_ide ?>"><?php echo $r->acti_descrip ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="col-sm-2">
			<button class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Ok</button>
		</div>
	</div>
	<input type="hidden" name="parq" value="<?php echo $parq ?>">
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
				$.post('prc-macpa-insert',$(formulario).serialize(),function(data){
					if(data==1) {
						load('vst-acpa-lista','parq=<?php echo $parq ?>','.lista2');
						load('vst-acpa-insert','parq=<?php echo $parq ?>','.insert');
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