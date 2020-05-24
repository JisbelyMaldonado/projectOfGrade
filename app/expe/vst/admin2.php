<?php require '../../../cfg/base.php'; ?>
<?php echo $fn->modalWidth('70%') ?>
<form enctype="multipart/form-data" action="prc-mexpe-insertExperiencia" class="op-experiencia form-horizontal" method="POST">
	<?php echo $fn->modalHeader('Agregar Experiencia Personal') ?>
	<div class="modal-body">
		<div class="form-group">
			<label for="" class="control-label bolder col-sm-3">Nombres:</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="nombre">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label bolder col-sm-3">Correo:</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="correo">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label bolder col-sm-3">Fotografía:</label>
			<div class="col-sm-8">
				<input type="file" id="id-input-file-2" name="foto"/>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label bolder col-sm-3">Experiencia:</label>
			<div class="col-sm-8">
				<textarea name="experiencia" id="" class="form-control" rows="10"></textarea>
			</div>
		</div>
	</div>
	<?php echo $fn->modalFooter(1) ?>
</form>

<script type="text/javascript">
	jQuery(function($) {
		$('#id-input-file-2').ace_file_input({
			no_file:'Agregar ...',
			btn_choose:'Seleccionar',
			btn_change:'Cambiar',
			droppable:false,
			onchange:null,
			thumbnail:true, //| true | large
			whitelist:'gif|png|jpg|jpeg',
			blacklist:'exe|php',
			//onchange:''
			//
		});
	});
</script>
<script>
	$(function() { 
		var formulario = '.op-experiencia';
		$(formulario).validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			rules: {
				nombre: {
					required: true,
				},
				correo:{
					required: true,
					email:true
				},
				foto:{
					required: true,
				},
				experiencia:{
					required: true,
				},
			},

			messages: {
				nombre: {
					required: 'Obligatorio',
				},
				correo:{
					required: 'Obligatorio',
					email:'Correo no válido'
				},
				foto:{
					required: 'Obligatorio',
				},
				experiencia:{
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
				$(formulario).submit()
			},
			invalidHandler: function (form) {
			}
		});
	})
</script>