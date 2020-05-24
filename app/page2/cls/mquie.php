<?php 
class mquie {
	 function __clone() {

	 }
	 function __construct() {

	 }

	 function poride($ide) {
	 	return Enlace::sql("SELECT * FROM tbl_contenid where cont_ide=?",array($ide),3,'','','');
	 }

	 function update() {
	 	extract($_POST);
	 	$datos = array($ide,$des,$tit,$img,2);
	 	$sql = "SELECT sf_contenido(?,?,?,?,?) as res";
	 	return Enlace::sql($sql,$datos,5,'','','res');
	 }
}
?>