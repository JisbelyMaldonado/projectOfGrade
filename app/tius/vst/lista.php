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
			<?php foreach($mtius->lista() as $r): ?>
				<tr>
					<td style="text-transform:capitalize"><?php echo $r->tius_descrip ?></td>
					<td>
						<div class="action-buttons">
							<a class="blue" href="#" onclick="modal('vst-tius-update','ide=<?php echo $r->tius_ide ?>'); return false;">
								<i class="fa fa-edit bigger-150"></i>
							</a>
							<a class="red" href="#" onclick="modal('vst-tius-delete','ide=<?php echo $r->tius_ide ?>'); return false">
								<i class="fa fa-trash-o bigger-150"></i>
							</a>
							<a class="green" href="#" onclick="modal('vst-tius-permisos','ide=<?php echo $r->tius_ide ?>'); return false">
								<i class="fa fa-lock bigger-150"></i>
							</a>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>