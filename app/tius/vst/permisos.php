<?php require '../../../base.php'; ?>
<?php echo $fn->modalHeader('Modificar Permisos'); ?>
<div class="modal-body">
	<div class="msj"></div>
	<div class="lista-permsisos"></div>
</div>
<div class="clearfix"></div>
<?php echo $fn->modalFooter(2) ?>

<script>
	load('vst-tius-perm.lista','tius_ide=<?php echo $ide ?>','.lista-permsisos');
</script>