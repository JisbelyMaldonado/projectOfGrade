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
			<?php foreach($mparq->lista() as $r): ?>
				<tr>
					<td><?php echo $r->parq_nombre ?></td>
					<td>
						<div class="action-buttons">
							<a title="Editar" class="blue" href="#" onclick="modal('vst-parq-update','ide=<?php echo $r->parq_ide ?>'); return false;">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							<a title="Borrar" class="red" href="#" onclick="modal('vst-parq-delete','ide=<?php echo $r->parq_ide ?>'); return false">
								<i class="fa fa-trash-o fa-lg"></i>
							</a>
							<a title="Atracciones" class="purple" href="#" onclick="modal('vst-atra-admin','parq=<?php echo $r->parq_ide ?>'); return false">
								<i class="fa fa-anchor fa-lg"></i>
							</a>
							<a title="Actividades" class="pink" href="#" onclick="modal('vst-acpa-admin','parq=<?php echo $r->parq_ide ?>'); return false">
								<i class="fa fa-binoculars fa-lg"></i>
							</a>
							<a title="Estados" class="green" href="#" onclick="modal('vst-espa-admin','parq=<?php echo $r->parq_ide ?>'); return false">
								<i class="fa fa-flag fa-lg"></i>
							</a>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>