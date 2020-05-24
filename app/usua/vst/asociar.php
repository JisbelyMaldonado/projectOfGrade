<?php require '../../../base.php'; ?>
<?php echo $fn->modalHeader('Asociar Usuario a una Red') ?>
<div class="modal-body">
	<form action="" class="form-horizontal col-sm-8 col-sm-offset-2">
		<div class="msj1"></div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2 bolder">Red:</label>
			<div class="col-sm-10">
				<select name="red" id="" class="form-control">
					<option value=""></option>
					<?php foreach($mrede->lista() as $r): ?>
						<option value="<?php echo $r->rede_ide ?>"><?php echo $r->rede_nombre.' - '.$r->divi_descrip ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	</form>
	<div class="clearfix"></div>
	<div class="listaredes"></div>
</div>
<?php echo $fn->modalFooter(1) ?>
<script>
	load('vst-usua-rede_lista','ide=<?php echo $ide ?>','.listaredes');
</script>