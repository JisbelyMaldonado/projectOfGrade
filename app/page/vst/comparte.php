<?php $row = $mpage->experiencias() ?>
<!--<h1><img src="img/comparte.jpg" alt="" style="width:100%"></h1>-->
<hr>
<div class="text-center">
	<button class="btn btn-link btn-lg" onclick="modal('vst-expe-admin2','')">¿Quieres Compartir tú Experiencia? Haz Click Aquí</button>
</div>
<hr>	
<div class="clearfix"></div>
<?php if(count($row)>0) : ?>
	<?php foreach($row as $r): ?>
		<div class="col-sm-6">
			<div class="widget-box">
				<div class="widget-header">
					<h5><?php echo $r->expe_nombre ?> <i class="fa fa-"></i> 
						<small>
							<?php echo $r->expe_correo ?>
							<div class="widget-toolbar">
								<?php echo date('d-m-Y',strtotime($r->expe_fecha)); ?>
							</div>
						</small>
					</h5>
				</div>
				<div class="widget-body">
					<div class="widget-main">
						<div class="col-sm-3"><img src="img/expe/<?php echo $r->expe_ide; ?>.jpeg" alt="" style="width:100%"></div>
						<div class="col-sm-9">
							<?php echo $r->expe_comenta ?>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
<?php else: ?>
	<div class="alert alert-info">No hay experiencias para compartir</div>
<?php endif; ?>