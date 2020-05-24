<?php require '../../../base.php' ?>
<div class="table-responsive clearfix">
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>Cédula</th>
				<th>Apellidos y Nombres</th>
				<th>Teléfono</th>
				<th>Correo</th>
				<th>Usuario</th>
				<th>Tipo</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($musuarios->lista() as $r): ?>
				<tr>
					<td><?php echo $r->usua_naciona ?><?php echo $r->usua_cedula ?></td>
					<td><?php echo $r->usua_apellid ?> <?php echo $r->usua_nombres ?></td>
					<td><?php echo $r->usua_telefon ?></td>
					<td><?php echo $r->usua_correo ?></td>
					<td><?php echo $r->acce_nombre ?></td>
					<td><?php echo $r->tius_descrip ?></td>
					<td>
						<div class="action-buttons">
							<a class="blue" href="#" onclick="modal('vst-usua-update','ide=<?php echo $r->usua_ide ?>'); return false;">
								<i class="fa fa-edit bigger-150"></i>
							</a>
							<a class="red" href="#" onclick="modal('vst-usua-delete','ide=<?php echo $r->usua_ide ?>'); return false">
								<i class="fa fa-trash-o bigger-150"></i>
							</a>
							<!-- <a class="purple" href="#" onclick="modal('vst-usua-asociar','ide=<?php echo $r->usua_ide ?>'); return false">
								<i class="fa fa-share-alt bigger-150"></i>
							</a> -->
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>