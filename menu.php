<li>
	<a href="index.php">
		<i class="fa fa-arrow-left bigger-130"></i>
		<span class="menu-text"> &nbsp;&nbsp;Volver</span>
	</a>
</li>
<li>
	<a href="admin.php">
		<i class="fa fa-home bigger-130"></i>
		<span class="menu-text"> &nbsp;&nbsp;Inicio</span>
	</a>
</li>
<li>
	<a href="?g_vartip=1&g_var2=<?php echo base64_encode('usua/vst/cuenta2'); ?>">
		<i class="fa fa-user bigger-130"></i>
		<span class="menu-text"> &nbsp;&nbsp;Mi Cuenta</span>
	</a>
</li>
<?php foreach($musuarios->opcionesMenu() as $m) : ?>
	<?php if($m->sumo_ide==13): ?>
		<li>
			<a href="app/<?php echo $m->sumo_url ?>/admin.php">
				<i class="fa fa-<?php echo $m->sumo_icono; ?>  bigger-130"></i>
				<span class="menu-text"> &nbsp;&nbsp;<?php echo $m->sumo_descrip ?></a></span>
		</li>
	<?php else: ?>
		<li>
			<a href="?g_var=<?php echo $m->sumo_ide ?>">
				<i class="fa fa-<?php echo $m->sumo_icono; ?>  bigger-130"></i>
				<span class="menu-text"> 
					&nbsp;&nbsp;<?php echo $m->sumo_descrip; ?>
				</span>
			</a>
		</li>
	<?php endif; ?>
<?php endforeach; ?>
<li>
	<a href="logout.php">
		<i class="fa fa-sign-in bigger-130"></i>
		<span class="menu-text"> &nbsp;&nbsp;Cerrar Sesión</span>
	</a>
</li>