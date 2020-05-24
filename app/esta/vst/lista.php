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
			<?php foreach($mesta->lista() as $r): ?>
				<tr>
					<td><?php echo $r->esta_descrip ?></td>
					<td>
						<div class="action-buttons">
							<a class="blue" href="#" onclick="modal('vst-esta-update','ide=<?php echo $r->esta_ide ?>'); return false;">
								<i class="fa fa-edit bigger-150"></i>
							</a>
							<a class="red" href="#" onclick="modal('vst-esta-delete','ide=<?php echo $r->esta_ide ?>'); return false">
								<i class="fa fa-trash-o bigger-150"></i>
							</a>
							<a class="green" href="#" onclick="modal('vst-muni-admin','esta=<?php echo $r->esta_ide ?>'); return false">
								<i class="fa fa-play bigger-150"></i>
							</a>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>