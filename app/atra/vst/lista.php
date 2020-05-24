<?php require '../../../base.php' ?>
<div class="table-responsive clearfix">
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>Descripción</th>
				<th>Latitud</th>
				<th>Longitud</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($matra->lista($parq) as $r): ?>
				<tr>
					<td><?php echo $r->atra_descrip ?></td>
					<td><?php echo $r->atra_latitud ?></td>
					<td><?php echo $r->atra_longitu ?></td>
					<td>
						<div class="action-buttons">
							<a class="blue" href="#" onclick="load('vst-atra-update','parq=<?php echo $parq ?>&ide=<?php echo $r->atra_ide ?>','.insert'); return false;">
								<i class="fa fa-edit bigger-150"></i>
							</a>
							<a class="red" href="#" onclick="borrar('ide=<?php echo $r->atra_ide ?>'); return false">
								<i class="fa fa-trash-o bigger-150"></i>
							</a>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<script>
	function borrar(datos) {
		if(confirm('¿Desea borrar la atracción seleccionada?')==true) {
			$.post('prc-matra-delete',datos,function(data){
				if(data==1) {
					load('vst-atra-lista','parq=<?php echo $parq ?>','.lista2');
					load('vst-atra-insert','parq=<?php echo $parq ?>','.insert');
				} else {
					alerta('.msj','danger',data);
				}
			})
		}
	}
</script>