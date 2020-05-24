<?php require '../../../base.php' ?>
<div class="table-responsive clearfix">
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>Fecha</th>
				<th>Cédula</th>
				<th>Apellidos y Nombres</th>
				<th>Usuario</th>
				<th>Tabla</th>
				<th>Operación</th>
				<th>Registro</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($musuarios->auditoria() as $r): ?>
				<tr>
					<td><?php echo date('d-m-Y',strtotime($r->fecha)) ?></td>
					<td><?php echo $r->usua_naciona ?><?php echo $r->usua_cedula ?></td>
					<td><?php echo $r->usua_apellid ?> <?php echo $r->usua_nombres ?></td>
					<td><?php echo $r->acce_nombre ?></td>
					<td><?php echo $r->tabl ?></td>
					<td><?php echo $r->oper ?></td>
					<td><?php echo $r->regi ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<script>
	$(function(){
		$('.table').dataTable();
	})
</script>