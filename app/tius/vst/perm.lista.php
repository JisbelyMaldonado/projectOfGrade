<?php require '../../../base.php'; ?>
<div class="table-responsive">
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<td>Módulo</td>
				<td>Submódulo</td>
				<td>Estado</td>
				<td>Opción</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($mtius->permlista() as $r): ?>
				<tr>
					<td><?php echo $r->modu_descrip ?></td>
					<td><?php echo $r->sumo_descrip ?></td>
					<td><?php echo $ctius->estado($tius_ide,$r->sumo_ide,0) ?></td>
					<td>
						<button class="btn btn-xs btn-<?php echo $ctius->estado($tius_ide,$r->sumo_ide,2) ?>" onclick="cambiarpermiso('tius=<?php echo $tius_ide ?>&subm=<?php echo $r->sumo_ide ?>&val=<?php echo $ctius->estado($tius_ide,$r->sumo_ide,1) ?>')">
							<?php echo $ctius->estado($tius_ide,$r->sumo_ide,3) ?>
						</button>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<script>
	function cambiarpermiso(datos) {
		$.post('prc-mtius-permupdate',datos,function(data){
			if(data==1) {
				load('vst-tius-perm.lista','tius_ide=<?php echo $tius_ide ?>','.lista-permsisos');
			} else {
				alerta('.msj','danger',data);
			}
		})
	}
</script>