<?php require '../../../base.php'; ?>

<form action="" class="op1 form-horizontal">
	<div class="msj"></div>
	<div class="form-group">
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Descripción</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="des">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Latitud</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="lat">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Longitud</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" name="lon">
			</div>
			<div class="col-sm-2">
				<button class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Ok</button>
			</div>
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
				lat: {
					required: true,
					number:true,
				},
				lon: {
					required: true,
					number:true,
				},
			},

			messages: {
				des: {
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
				$.post('prc-matra-insert',$(formulario).serialize(),function(data){
					if(data==1) {
						load('vst-atra-lista','parq=<?php echo $parq ?>','.lista2');
						load('vst-atra-insert','parq=<?php echo $parq ?>','.insert');
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