<?php  $row = $macpa->actividadParque($_GET['acti']); ?>
<?php  $act = $macti->poride($_GET['acti']); ?>
<div class="page-header">
	<h1><?php echo $act[0]->acti_descrip ?></h1>
</div>		
<div id="accordion" class="accordion-style1 panel-group">
	<?php foreach($row as $ri => $r): ?>
		<div class="panel <?php echo ($ri==0) ? 'panel-default' : null ?>">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="accordion-toggle <?php echo ($ri!=0) ? 'collapse' : null ?>" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $ri ?>">
						<i class="bigger-110 icon-angle-down" data-icon-hide="icon-angle-down" data-icon-show="icon-angle-right"></i>
						<?php echo $r->parq_nombre ?>
					</a>
				</h4>
			</div>

			<div style="height: auto;" class="panel-collapse <?php echo ($ri==0) ? 'in' : 'collapse' ?>" id="collapse<?php echo $ri ?>">
				<div class="panel-body">
					<div class="table-responsive">
						<div class="table-header">
							Ficha Técnica
						</div>
						<table class="table table-bordered">
							<tbody>
								<tr class="active">
									<th>Nombre:</th>
									<th>Ubicación</th>
									<th>Latitud</th>
									<th>Longitud</th>
								</tr>
								<tr>
									<td><?php echo $r->parq_nombre ?></td>
									<td><?php echo $r->parq_ubicaci ?></td>
									<td><?php echo $r->parq_latitud ?></td>
									<td><?php echo $r->parq_longitu ?></td>
								</tr>
								<tr class="active">
									<th>Límite Norte</th>
									<th>Límite Sur</th>
									<th>Límite Este</th>
									<th>Límite Oeste</th>
								</tr>
								<tr>
									<td><?php echo $r->parq_norte ?></td>
									<td><?php echo $r->parq_sur ?></td>
									<td><?php echo $r->parq_este ?></td>
									<td><?php echo $r->parq_oeste ?></td>
								</tr>
								<tr class="active">
									<th>MSNM</th>
									<th>Clima</th>
									<th>Detalles</th>
									<th>Característica General</th>
								</tr>
								<tr>
									<td><?php echo $r->parq_msnm ?></td>
									<td><?php echo $r->parq_clima ?></td>
									<td><?php echo $r->parq_detalle ?></td>
									<td><?php echo $r->parq_caracte ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>