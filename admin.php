<?php 
require 'base.php';
$cusuarios->redirectLogin();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>..::[Imparques - Administración]::..</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php require 'css/ace.php'; ?>
		<?php require 'js/ace.php'; ?>
	</head>
	<body class="col-sm-12">
		<div class="bootbox modal fade in" role="dialog" tabindex="-1" style="" aria-hidden="false">
			<div class="modal-dialog">
				<div class="modal-content"></div>
			</div>
		</div>
		<img src="img/logo.png" alt="" class="logoad">
		<div class="col-sm-12">
			<small class="pull-right">
				Estás conectado como: <strong><?php echo $s_usua_nombres ?> (<?php echo $s_tius_descrip ?>)</strong>
				- <?php echo date('d-m-Y H:i:s') ?>
			</small>
		</div>

		<div class="col-sm-2">				
			<ul class="nav nav-list"><?php require 'menu.php'; ?></ul>
		</div>
		<div class="col-sm-10">
			<?php require 'contenido.php'; ?>
		</div>
	</body>
</html>