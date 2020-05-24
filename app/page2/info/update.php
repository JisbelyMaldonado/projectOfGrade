<?php require '../../../base.php'; ?>
<?php foreach($minfo->poride(4) as $r): ?>
	<form action="" class="op2">
			<div class="msj"></div>
			<div class="form-group">
				<label for="" class="control-label col-sm-12 bolder">Título:</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="tit" value="<?php echo $r->cont_titulo ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-12 bolder">Contenido:</label>
				<div class="col-sm-12">
					<!--<textarea name="des" id="" rows="10" class="form-control"><?php echo $r->cont_conteni ?></textarea>-->
					<div id="editor1" class="wysiwyg-editor" contenteditable="true"><?php echo $r->cont_conteni ?></div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-actions">
				<button class="btn btn-primary btn-sm pull-right">
					<i class="fa fa-check"></i> Guardar Cambios
				</button>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		<input type="hidden" name="ide" value="<?php echo $r->cont_ide ?>">
		<input type="hidden" name="img" value="mmm">
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
				var des = $('#editor1').html();
				$.post('prc-mmisi-update',$(formulario).serialize()+'&des='+des,function(data){
					if(data==1) {
						alerta('.msj','success','Cambios guardados correctamente');
					} else {
						alerta('.msj','danger',data);
					}
				})
			},
			invalidHandler: function (form) {
			}
		});

		$('#editor1').ace_wysiwyg({
			toolbar:
			[
				'font',
				null,
				'fontSize',
				null,
				{name:'bold', className:'btn-info'},
				{name:'italic', className:'btn-info'},
				{name:'strikethrough', className:'btn-info'},
				{name:'underline', className:'btn-info'},
				null,
				{name:'insertunorderedlist', className:'btn-success'},
				{name:'insertorderedlist', className:'btn-success'},
				{name:'outdent', className:'btn-purple'},
				{name:'indent', className:'btn-purple'},
				null,
				{name:'justifyleft', className:'btn-primary'},
				{name:'justifycenter', className:'btn-primary'},
				{name:'justifyright', className:'btn-primary'},
				{name:'justifyfull', className:'btn-inverse'},
				null,
				{name:'createLink', className:'btn-pink'},
				{name:'unlink', className:'btn-pink'},
				null,
				{name:'insertImage', className:'btn-success'},
				null,
				'foreColor',
				null,
				{name:'undo', className:'btn-grey'},
				{name:'redo', className:'btn-grey'}
			],
			'wysiwyg': {
				fileUploadError: '',
			}
		}).prev().addClass('wysiwyg-style2');
	})
</script>
