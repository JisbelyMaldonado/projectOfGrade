<?php require '../../../base.php'; ?>
<?php foreach($musuarios->poride($s_usua_ide) as $r): ?>
	<form action="" class="op2 form-horizontal">
		<?php echo $fn->modalHeader('Modificar Perfil'); ?>
		<div class="modal-body">
			<div class="msj"></div>
			<div class="form-group">
				<label for="" class="control-label col-sm-3 bolder">Cédula:</label>
				<div class="col-sm-3">
					<select name="nac" id="" class="form-control">
						<option value="V" <?php echo $fn->select('V',$r->usua_naciona) ?>>V</option>
						<option value="E" <?php echo $fn->select('E',$r->usua_naciona) ?>>E</option>
						<option value="P" <?php echo $fn->select('P',$r->usua_naciona) ?>>P</option>
						<option value="J" <?php echo $fn->select('J',$r->usua_naciona) ?>>J</option>
					</select>
				</div>
				<div class="col-sm-5">
					<input type="text" class="form-control" name="ced" value="<?php echo $r->usua_cedula ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-3 bolder">Apellidos:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="ape" value="<?php echo $r->usua_apellid ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-3 bolder">Nombres:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="nom" value="<?php echo $r->usua_nombres ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-3 bolder">Teléfono:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="tel" value="<?php echo $r->usua_telefon ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-3 bolder">Correo:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="cor" value="<?php echo $r->usua_correo ?>">
				</div>
			</div>
			<!-- <div class="form-group">
				<label for="" class="control-label col-sm-3 bolder">Tipo:</label>
				<div class="col-sm-8">
					<select name="tip" id="" class="form-control">
						<option value=""></option>
						<?php foreach($mtius->lista() as $r2): ?>
							<option value="<?php echo $r2->tius_ide ?>" <?php echo $fn->select($r2->tius_ide,$r->acce_tius) ?>>
								<?php echo $r2->tius_descrip ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
			</div> -->
			<input type="hidden" name="tip" value="<?php echo $r->acce_tius ?>">
			<div class="form-group">
				<label for="" class="control-label col-sm-3 bolder">Usuario:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="usu" value="<?php echo $r->acce_nombre ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-3 bolder">Clave:</label>
				<div class="col-sm-8">
					<input type="password" class="form-control" name="cla" id="cla" value="<?php echo $r->acce_clave ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-3 bolder">Confirme:</label>
				<div class="col-sm-8">
					<input type="password" class="form-control" name="cla2" value="<?php echo $r->acce_clave ?>">
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
		var formulario = '.op2';
		$(formulario).validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			rules: {
				ced: {
					required: true,
					number: true,
					maxlength: 9,
					minlength: 7,
				},
				ape: {
					required: true,
				},
				nom: {
					required: true,
				},
				tel: {
					required: true,
					number: true,
					maxlength: 11,
					minlength: 7,
				},
				cor: {
					required: true,
					email: true,
				},
				tip: {
					required: true,
				},
				usu: {
					required: true,
				},
				cla: {
					required: true,
				},
				cla2: {
					equalTo: '#cla',
				},
			},

			messages: {
				ced: {
					required: 'Obligatorio',
					number: 'Numérico',
					maxlength: '9 dígitos máximo',
					minlength: '7 dígitos máximo',
				},
				ape: {
					required: 'Obligatorio',
				},
				nom: {
					required: 'Obligatorio',
				},
				tel: {
					required: 'Obligatorio',
					number: 'Numérico',
					maxlength: '11 dígitos máximo',
					minlength: '7 dígitos máximo',
				},
				cor: {
					required: 'Obligatorio',
					email: 'dirección inválida',
				},
				tip: {
					required: 'Obligatorio',
				},
				usu: {
					required: 'Obligatorio',
				},
				cla: {
					required: 'Obligatorio',
				},
				cla2: {
					equalTo: 'Las claves no coinciden',
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
				$.post('prc-musuarios-update',$(formulario).serialize(),function(data){
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