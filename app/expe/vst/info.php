<?php require '../../../cfg/base.php'; ?>
<?php echo $fn->modalWidth('70%') ?>
<?php $row = $mexpe->poride($expe_ide); ?>
<?php foreach($row as $r): ?>
<form action="" class="op-experiencia form-horizontal">
	<?php echo $fn->modalHeader('Aprobar Experiencia Personal') ?>
	<div class="modal-body">
		<table>
			<tr>
				<td style="width:30%" style="vertical-align:top">
					<img src="img/expe/<?php echo $r->expe_ide ?>.jpeg" style="width:100%">
				</td>
				<td>
					<div class="form-group">
						<label for="" class="control-label bolder col-sm-3">Nombres:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="nombre" disabled value="<?php echo $r->expe_nombre ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label bolder col-sm-3">Correo:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="correo" disabled value="<?php echo $r->expe_correo ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label bolder col-sm-3">Fecha:</label>
						<div class="col-sm-8">
							<input type="text" disabled value="<?php echo date('d-m-Y',strtotime($r->expe_fecha)); ?>">
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br><br>
					<div class="form-group">
						<label for="" class="control-label bolder col-sm-3">Experiencia:</label>
						<div class="col-sm-8">
							<textarea disabled name="experiencia" id="" class="form-control" rows="10"><?php echo $r->expe_comenta ?></textarea>
						</div>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<div class="modal-footer clearfix">
		<button data-dismiss="modal" class="btn btn-default" type="button" data-bb-handler="cancel"><i class="fa fa-times"></i> En otro momento</button>
		<button class="btn btn-danger" type="button" onclick="fn_forma(2)"><i class="fa fa-ban"></i> Rechazar</button>
		<button class="btn btn-primary" type="button" onclick="fn_forma(1)"><i class="fa fa-check"></i> Aprobar</button>
	</div>
	<input type="hidden" class="form-control" name="ide"  value="<?php echo $r->expe_ide ?>">
	<input type="hidden" id="forma" name="forma">
</form>
<?php endforeach; ?>

<script>
	function fn_forma(valor) {
		//alert(valor);
		$('#forma').val(valor);
		$('.op-experiencia').submit();
	}
	$(function() { 
		var formulario = '.op-experiencia';
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
				$.post('prc-mexpe-aprobar',$(formulario).serialize(),function(data){
					if(data==1) {
						load('vst-expe-lista','','.lista');
						cerrarmodal();
					} else {
						alert(data);
					}
				})
			},
			invalidHandler: function (form) {
			}
		});
	})
</script>