<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>..::[INPARQUES]::..</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php require 'css/ace.php'; ?>
		<link rel="stylesheet" href="css/principal.css">
		<link rel="stylesheet" href="lib/font-awesome-4.3.0/css/font-awesome.min.css" />
		<?php require 'js/ace.php'; ?>
		
	</head>
	<body>
		<div class="bootbox modal fade in" role="dialog" tabindex="-1" style="" aria-hidden="false">
			<div class="modal-dialog">
				<div class="modal-content"></div>
			</div>
		</div>
		<div id="contenido">
			<div class="menuverde">
				<ul class="menusimple">
					<li><a href="index.php">Inicio</a></li>
					<li><a href="index_cont.php?page=<?php echo base64_encode('comparte') ?>">Comparte tu Experiencia</a></li>
					<li><a href="index_cont.php?page=<?php echo base64_encode('contacto') ?>">Contacto</a></li>
					<li><a href="index_cont.php?page=<?php echo base64_encode('conocenos') ?>">Conócenos</a></li>
					<li><a href="">Folletos</a></li>
					<li><a href="index_cont.php?page=<?php echo base64_encode('mapa') ?>">Mapa Interactivo</a></li>
				</ul>
				<ul class="redes">
					<li><a href=""><i class="fa fa-facebook-official fa-2x"></i></a></li>
					<li><a href=""><i class="fa fa-twitter-square fa-2x"></i></a></li>
					<li><a href=""><i class="fa fa-google-plus-square fa-2x"></i></a></li>
					<li><a href=""><i class="fa fa-youtube-square fa-2x"></i></a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
			<div class="logo">
				<img src="img/logo.png" alt="">
			</div>
			<div class="menuprincipal">
				<ul class="menup">
					<!--<li><a href="">Destinos</a></li>-->
					<li><a href="index_cont.php?page=<?php echo base64_encode('infoprac') ?>">Información Práctica</i></a></li>
					<!--<li><a href="">Selección de Idioma <i class="fa fa-chevron-down"></i></a></li>-->
					<li><?php echo $cusuarios->estadoSesion(); ?></li>
				</ul>
			</div>
			