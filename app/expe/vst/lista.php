<?php require '../../../cfg/base.php'; ?>
<?php $row = $mexpe->experiencias(); ?>
<?php if(count($row)>0): ?>
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Nombres</th>
					<th>Correo</th>
					<th style="width:10%">Foto</th>
					<th>Experiencia</th>
					<th>Opción</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($row as $r): ?>
					<tr>
						<td style="vertical-align:  middle;"><?php echo date('d-m-Y',strtotime($r->expe_fecha)); ?></td>
						<td style="vertical-align:  middle;"><?php echo $r->expe_nombre ?></td>
						<td style="vertical-align:  middle;"><?php echo $r->expe_correo ?></td>
						<td style="vertical-align:  middle;"><img src="img/expe/<?php echo $r->expe_ide ?>.jpeg" style="width:100%"></td>
						<td style="vertical-align:  middle;"><?php echo substr($r->expe_comenta,0,50) ?>...</td>
						<td style="vertical-align:  middle;">
							<div class="btn-group">
								<button class="btn btn-info btn-sm" onclick="modal('vst-expe-info','expe_ide=<?php echo $r->expe_ide ?>')"><i class="fa fa-info"></i></button>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php else: ?>
	<div class="alert alert-info">No hay experiencias para aprobar</div>
<?php endif; ?>

<script>
	$(function(){
		$('.table').dataTable();
	})
</script>