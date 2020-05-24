<?php require '../../../cfg/base.php'; ?>
<?php $row = $mparq->poride($parq); ?>
<?php  echo $fn->modalHeader('Cargar Actividad a '.$row[0]->parq_nombre) ?>
<div class="modal-body">
	<div class="insert"></div>
	<div class="clearfix"></div>
	<div class="space-10"></div>
	<div class="lista2"></div>
</div>
<?php echo $fn->modalFooter(2) ?>
<script>
	load('vst-acpa-lista','parq=<?php echo $parq ?>','.lista2');
	load('vst-acpa-insert','parq=<?php echo $parq ?>','.insert');
</script>