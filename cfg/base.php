<?php 
$ruta = (file_exists('cfg/config.php')) ? '' : '../../../';

require $ruta.'cfg/config.php';
require $ruta.'cfg/conexion.php';
require $ruta.'cfg/funciones.php';
require $ruta.'lib/dompdf/dompdf_config.inc.php';
require $ruta.'lib/PHPMailer/class.phpmailer.php';
$apps = array(
		'usua'=>array('musuarios','cusuarios'),
		'tius'=>array('mtius','ctius'),
		'page2'=>array('mquie','mmisi','mcont','minfo'),
		'acti'=>array('macti',),
		'esta'=>array('mesta',),
		'muni'=>array('mmuni',),
		'parq'=>array('mparq',),
		'atra'=>array('matra',),
		'acpa'=>array('macpa',),
		'page'=>array('mPage',),
		'expe'=>array('mexpe',),
		'espa'=>array('mespa',),
	);
foreach($apps as $ind=>$app) {
	foreach($app as $file) {
		require $ruta.'app/'.$ind.'/cls/'.$file.'.php';
	}
}
//$cn = new Enlace();
$fn = new Funciones();
foreach($apps as $ind=>$app) {
	foreach($app as $file) {
		$clase = strtolower($file);
		$$clase = new $file();
	}
}

?>