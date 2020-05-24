<?php require '../../../base.php'; ?>
<?php foreach($mmuni->poride($ide) as $r): ?>
	<form action="" class="op2">
		<div class="msj"></div>
		<div class="form-group">
			<label for="" class="control-label col-sm-12 bolder">Descripción</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="des" value="<?php echo $r->muni_descrip ?>">
			</div>
			<div class="col-sm-3">
				<button class="btn btn-primary btn-sm"><i class="fa fa-check"></i></button>
				<button type="button" class="btn btn-primary btn-sm" onclick="load('vst-muni-insert','esta=<?php echo $esta ?>','.insert');"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<input type="hidden" name="ide" value="<?php echo $r->muni_ide ?>">
		<input type="hidden" name="esta" value="<?php echo $r->muni_esta ?>">
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
				$.post('prc-mmuni-update',$(formulario).serialize(),function(data){
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