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
			<?php foreach($macti->lista() as $r): ?>
				<tr>
					<td><?php echo $r->acti_descrip ?></td>
					<td>
						<div class="action-buttons">
							<a class="blue" href="#" onclick="modal('vst-acti-update','ide=<?php echo $r->acti_ide ?>'); return false;">
								<i class="fa fa-edit bigger-150"></i>
							</a>
							<a class="red" href="#" onclick="modal('vst-acti-delete','ide=<?php echo $r->acti_ide ?>'); return false">
								<i class="fa fa-trash-o bigger-150"></i>
							</a>
							<a class="green" href="#" onclick="modal('vst-acti-icono','ide=<?php echo $r->acti_ide ?>'); return false">
								<i class="fa fa-image bigger-150"></i>
							</a>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>