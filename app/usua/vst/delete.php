<?php require '../../../base.php'; ?>
<?php foreach($musuarios->poride($ide) as $r): ?>
	<form action="" class="op3 form-horizontal">
		<?php echo $fn->modalHeader('Eliminar usuario'); ?>
		<div class="modal-body">
			<div class="msj"></div>
			<div class="form-group">
				<label for="" class="control-label col-sm-3 bolder">Cédula:</label>
				<div class="col-sm-3">
					<select disabled id="" class="form-control">
						<option value="V" <?php echo $fn->select('V',$r->usua_naciona) ?>>V</option>
						<option value="E" <?php echo $fn->select('E',$r->usua_naciona) ?>>E</option>
						<option value="P" <?php echo $fn->select('P',$r->usua_naciona) ?>>P</option>
						<option value="J" <?php echo $fn->select('J',$r->usua_naciona) ?>>J</option>
					</select>
				</div>
				<div class="col-sm-5">
					<input disabled type="text" class="form-control" value="<?php echo $r->usua_cedula ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-3 bolder">Apellidos:</label>
				<div class="col-sm-8">
					<input disabled type="text" class="form-control" value="<?php echo $r->usua_apellid ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-3 bolder">Nombres:</label>
				<div class="col-sm-8">
					<input disabled type="text" class="form-control" value="<?php echo $r->usua_nombres ?>">
				</div>
			</div>
		
			<div class="form-group">
				<label for="" class="control-label col-sm-3 bolder">Tipo:</label>
				<div class="col-sm-8">
					<select disabled id="" class="form-control">
						<option value=""></option>
						<?php foreach($mtius->lista() as $r2): ?>
							<option value="<?php echo $r2->tius_ide ?>" <?php echo $fn->select($r2->tius_ide,$r->acce_tius) ?>>
								<?php echo $r2->tius_descrip ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<?php echo $fn->modalFooter(1) ?>
		<input type="hidden" class="form-control" name="ide" value="<?php echo $r->usua_ide ?>">
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
				$.post('prc-musuarios-delete',$(formulario).serialize(),function(data){
					if(data==1) {
						load('vst-usua-lista','','.lista');
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