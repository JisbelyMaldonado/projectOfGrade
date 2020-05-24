<?php require '../../../base.php'; ?>
<form action="" class="op1 form-horizontal">
	<?php echo $fn->modalHeader('Agregar usuario'); ?>
	<div class="modal-body">
		<div class="msj"></div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Cédula:</label>
			<div class="col-sm-3">
				<select name="nac" id="" class="form-control">
					<option value="V">V</option>
					<option value="E">E</option>
					<option value="P">P</option>
					<option value="J">J</option>
				</select>
			</div>
			<div class="col-sm-5">
				<input type="text" class="form-control" name="ced">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Apellidos:</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="ape">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Nombres:</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="nom">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Teléfono:</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="tel">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Correo:</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="cor">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Red:</label>
			<div class="col-sm-8">
				<select name="rede" id="" class="form-control">
					<?php foreach($mrede->lista() as $r): ?>
						<option value="<?php echo $r->rede_ide ?>"><?php echo $r->rede_nombre.' - '.$r->divi_descrip ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Padre:</label>
			<div class="col-sm-8">
				<select name="padre" id="" class="form-control">
					<option value="0">Cabeza de Red (Ninguno)</option>
					<?php foreach($musuarios->lista() as $r): ?>
						<option value="<?php echo $r->usua_ide ?>"><?php echo $r->usua_apellid.', '.$r->usua_nombres ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Tipo:</label>
			<div class="col-sm-8">
				<select name="tip" id="" class="form-control">
					<option value=""></option>
					<?php foreach($mtius->lista() as $r): ?>
						<option value="<?php echo $r->tius_ide ?>"><?php echo $r->tius_descrip ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Usuario:</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="usu">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Clave:</label>
			<div class="col-sm-8">
				<input type="password" class="form-control" name="cla" id="cla">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Confirme:</label>
			<div class="col-sm-8">
				<input type="password" class="form-control" name="cla2">
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
				padre: {
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
				padre: {
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
				$.post('prc-musuarios-insert',$(formulario).serialize(),function(data){
					if(!isNaN(data)) {
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