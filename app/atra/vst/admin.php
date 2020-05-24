<?php require '../../../cfg/base.php'; ?>
<?php $row = $mparq->poride($parq); ?>
<?php  echo $fn->modalHeader('Cargar Atracción a '.$row[0]->parq_nombre) ?>
<div class="modal-body">
	<div class="insert"></div>
	<div class="clearfix"></div>
	<div class="space-10"></div>
	<div class="lista2"></div>
</div>
<?php echo $fn->modalFooter(2) ?>
<script>
	load('vst-atra-lista','parq=<?php echo $parq ?>','.lista2');
	load('vst-atra-insert','parq=<?php echo $parq ?>','.insert');
</script>