<?php require '../../../base.php' ?>
<div class="table-responsive clearfix">
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>Actividad</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($macpa->lista($parq) as $r): ?>
				<tr>
					<td><?php echo $r->acti_descrip ?></td>
					<td>
						<div class="action-buttons">
							<a class="red" href="#" onclick="borrar('ide=<?php echo $r->acpa_ide ?>'); return false">
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
		if(confirm('¿Desea borrar la actividad seleccionada?')==true) {
			$.post('prc-macpa-delete',datos,function(data){
				if(data==1) {
					load('vst-acpa-lista','parq=<?php echo $parq ?>','.lista2');
					load('vst-acpa-insert','parq=<?php echo $parq ?>','.insert');
				} else {
					alerta('.msj','danger',data);
				}
			})
		}
	}
</script>