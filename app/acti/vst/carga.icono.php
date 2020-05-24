<?php
require '../../../cfg/base.php'; 
session_regenerate_id();
$ruta = '../../../img/acti/'.$_GET["acti_ide"].'_'.session_id().'.jpeg';
if(move_uploaded_file($_FILES['image']['tmp_name'], $ruta)) {
	$macti->cargarImagen($_GET["acti_ide"].'_'.session_id(),'jpeg');
	$rt = "Tu Experiencia ha sido compartida. Espera la aprobación del administrador para ser publicada. ¡Gracias!";
} else {
	$rt = 'Ocurrió un error al procesar tu experiencia. Intenta nuevamente';
}
echo $rt;
?>