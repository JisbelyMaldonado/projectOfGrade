<?php require '../../../base.php'; $rows = $musuarios->rede_lista($ide) ?>
<?php if(count($rows)>0): ?>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Red</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>
<?php else: ?>
	<alert class="alert-info">No hay redes asociadas a este usuario</alert>
<?php endif; ?>
