<?php 
if(isset($g_var)):
	$row = $musuarios->contenido();
	if(count($row)>0):
		if(file_exists('app/'.$row[0]->sumo_url.'/admin.php')):
			echo $fn->header($row[0]->sumo_icono,$row[0]->sumo_descrip,$row[0]->sumo_descrip);
			echo $fn->content('app/'.$row[0]->sumo_url.'/admin');
		else:
			echo $fn->header('exclamation-circle','¡Error 404!','Archivo no encontrado');
			echo $fn->content('404');
		endif;
	else:
		echo $fn->header('exclamation-circle','¡Error 505!','Acceso denegado');
		echo $fn->content('505');
	endif;
elseif(isset($g_var2)):
	switch($g_vartip) {
		case 1: 
			echo $fn->header('edit','Mi Cuenta','Datos de usuario');
			echo $fn->contentopen();
			require 'app/'.base64_decode($g_var2).'.php';
			echo $fn->contentclose();
			break;
	}
else:
	echo $fn->header('home','Inicio','Página principal');
	echo $fn->content('default');
endif;
?>