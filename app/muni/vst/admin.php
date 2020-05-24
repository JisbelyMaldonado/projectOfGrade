<?php require '../../../cfg/base.php'; ?>
<?php $row = $mesta->poride($esta); ?>
<?php  echo $fn->modalHeader('Cargar Municipio a '.$row[0]->esta_descrip) ?>
<div class="modal-body">
	<div class="insert"></div>
	<div class="clearfix"></div>
	<div class="space-10"></div>
	<div class="lista2"></div>
</div>
<?php echo $fn->modalFooter(2) ?>
<script>
	load('vst-muni-lista','esta=<?php echo $esta ?>','.lista2');
	load('vst-muni-insert','esta=<?php echo $esta ?>','.insert');
</script>