<?php 
require '../../../cfg/base.php';
$datos = $musuarios->poride($s_usua_ide);
?>
<div class="col-sm-5" style="min-height:300px;background:#fff;box-shadow:0 0 2px #000;padding:20px">
	<div class="page-header">
		<h1>
			Perfil de Usuario
			<button class="btn btn-danger btn-sm pull-right" onclick="location.href='logout.php'">
				<i class="fa fa-sign-out"></i>Salir
			</button>
		</h1>
	</div>
	<div class="col-sm-9">
		<div class="profile-user-info profile-user-info-striped">
			<div class="profile-info-row">
				<div class="profile-info-name">Apellidos: </div>
				<div class="profile-info-value">
					<span id="username" class="editable editable-click"><?php echo $datos[0]->usua_apellid ?></span>
				</div>
			</div>
			<div class="profile-info-row">
				<div class="profile-info-name"> Nombres: </div>
				<div class="profile-info-value">
					<span id="username" class="editable editable-click"><?php echo $datos[0]->usua_nombres ?></span>
				</div>
			</div>
			<div class="profile-info-row">
				<div class="profile-info-name"> Cédula I.: </div>
				<div class="profile-info-value">
					<span id="username" class="editable editable-click"><?php echo $datos[0]->usua_naciona ?><?php echo $datos[0]->usua_cedula ?></span>
				</div>
			</div>
			<div class="profile-info-row">
				<div class="profile-info-name"> Correo: </div>
				<div class="profile-info-value">
					<span id="username" class="editable editable-click"><?php echo $datos[0]->usua_correo ?></span>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<span class="profile-picture">
			<img id="avatar" class="editable img-responsive editable-click editable-empty" src="lib/assets/avatars/profile-pic.jpg" alt="Avatar de <?php echo $datos[0]->usua_nombres ?>"><?php echo $datos[0]->acce_nombre ?></img>
		</span>
	</div>
	<div class="clearfix"></div>
	<div class="space-10"></div>
	<div class="row">
		<div class="col-sm-12">
			<div class="btn-group pull-right">
				<button class="btn btn-purple btn-sm" onclick="modal('vst-usua-update_perfil','')">
					<i class="fa fa-edit"></i> Modificar Perfil
				</button>
				<button class="btn btn-primary btn-sm">
					<i class="fa fa-child"></i>
					Datos de Cuenta
				</button>
				<?php echo $cusuarios->administracion() ?>
			</div>
		</div>
	</div>
</div>