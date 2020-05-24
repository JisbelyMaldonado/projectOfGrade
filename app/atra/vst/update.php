<?php require '../../../base.php'; ?>
<?php foreach($matra->poride($ide) as $r): ?>
	<form action="" class="op2 form-horizontal">
		<div class="msj"></div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Descripción</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="des" value="<?php echo $r->atra_descrip ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Latitud</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="lat" value="<?php echo $r->atra_latitud ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Longitud</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" name="lon" value="<?php echo $r->atra_longitu ?>">
			</div>
			<div class="col-sm-3">
				<button class="btn btn-primary btn-sm"><i class="fa fa-check"></i></button>
				<button type="button" class="btn btn-primary btn-sm" onclick="load('vst-atra-insert','parq=<?php echo $parq ?>','.insert');"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<input type="hidden" name="ide" value="<?php echo $r->atra_ide ?>">
		<input type="hidden" name="parq" value="<?php echo $r->atra_parq ?>">
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
				$.post('prc-matra-update',$(formulario).serialize(),function(data){
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