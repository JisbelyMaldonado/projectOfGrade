<?php require '../../../base.php'; ?>

<?php echo $fn->modalHeader('Agregar Actividad'); ?>
<div class="modal-body">
	<div class="msj"><div class="alert alert-info">Click en el recuadro gris para seleccionar la imagen</div></div>
	<div id="dropzone">
		<form action="" class="dropzone">
			<div class="fallback">
				<input name="file" type="file" multiple="" />
			</div>
			<div id="gallery"></div>
		</form>
	</div>
</div>
<div class="clearfix"></div>
<?php echo $fn->modalFooter(2) ?>

<script type="text/javascript">
	load('vst-acti-foto','ide=<?php echo $ide; ?>','#gallery')
	jQuery(function($){

		try {
		  $(".dropzone").dropzone({
		     url: 'app/acti/vst/carga.icono.php?acti_ide=<?php echo $ide ?>',
		  	maxFilesize: 12,
			acceptedFiles: 'image/*', 
			paramName: 'image',
			maxFiles: 1,
			dictDefaultMessage: 'Click para subir foto',
			createImageThumbnails: true,
			addRemoveLinks : true,
			dictDefaultMessage :'',
			dictResponseError: 'Error al cargar imagen!',
			
			//change the previewTemplate to use Bootstrap progress bars
			previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class=\"progress progress-small progress-striped active\"><div class=\"progress-bar progress-bar-success\" data-dz-uploadprogress></div></div>\n  <div class=\"dz-success-mark\"><span></span></div>\n  <div class=\"dz-error-mark\"><span></span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>"
		  });
		} catch(e) {
		  alert('Dropzone.js does not support older browsers!');
		}

	});
</script>