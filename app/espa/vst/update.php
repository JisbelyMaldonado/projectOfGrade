<?php require '../../../base.php'; ?>
<?php foreach($mespa->poride($ide) as $r): ?>
	<form action="" class="op2 form-horizontal">
		<div class="msj"></div>
		<div class="form-group">
			<div class="form-group">
				<label for="" class="control-label col-sm-3 bolder">Estado</label>
				<div class="col-sm-8">
					<select name="est" id="" class="form-control" onchange="load('vst-espa-select','esta='+this.value,'.municipio')">
						<option value=""></option>
						<?php foreach($mesta->lista() as $ra): ?>
							<option value="<?php echo $ra->esta_ide ?>" <?php echo $fn->select($ra->esta_ide,$r->esta_ide) ?>><?php echo $ra->esta_descrip ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-3 bolder">Municipio</label>
				<div class="col-sm-6">
					<select name="mun" id="" class="form-control municipio">
						<option value=""></option>
						<?php foreach($mmuni->lista($r->esta_ide) as $ra): ?>
							<option value="<?php echo $ra->muni_ide ?>" <?php echo $fn->select($ra->muni_ide,$r->muni_ide) ?>><?php echo $ra->muni_descrip ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="col-sm-2">
					<button class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Ok</button>
				</div>
			</div>
		</div>
		<input type="hidden" name="ide" value="<?php echo $r->mupa_ide ?>">
		<input type="hidden" name="parq" value="<?php echo $parq ?>">
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
				$.post('prc-mespa-update',$(formulario).serialize(),function(data){
					if(data==1) {
						load('vst-espa-lista','parq=<?php echo $parq ?>','.lista2');
						load('vst-espa-insert','parq=<?php echo $parq ?>','.insert');
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