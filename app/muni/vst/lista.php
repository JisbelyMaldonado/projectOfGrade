<?php require '../../../base.php' ?>
<div class="table-responsive clearfix">
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>Descripción</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($mmuni->lista($esta) as $r): ?>
				<tr>
					<td><?php echo $r->muni_descrip ?></td>
					<td>
						<div class="action-buttons">
							<a class="blue" href="#" onclick="load('vst-muni-update','esta=<?php echo $esta ?>&ide=<?php echo $r->muni_ide ?>','.insert'); return false;">
								<i class="fa fa-edit bigger-150"></i>
							</a>
							<a class="red" href="#" onclick="borrar('ide=<?php echo $r->muni_ide ?>'); return false">
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
		if(confirm('¿Desea borrar el municipio seleccionado?')==true) {
			$.post('prc-mmuni-delete',datos,function(data){
				if(data==1) {
					load('vst-muni-lista','esta=<?php echo $esta ?>','.lista2');
					load('vst-muni-insert','esta=<?php echo $esta ?>','.insert');
				} else {
					alerta('.msj','danger',data);
				}
			})
		}
	}
</script>