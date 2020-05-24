<?php 
class macpa {
	 function __clone() {

	 }
	 function __construct() {

	 }

	 function lista($parq) {
	 	$sql = "SELECT * FROM tbl_actiparq AS a INNER JOIN tbl_activida AS b ON a.acpa_acti=b.acti_ide WHERE acpa_parq=?";
	 	return Enlace::sql($sql,array($parq),3,'','','');
	 }

	 function actividadParque($acti) {
	 	$sql = "SELECT * FROM tbl_actiparq AS a INNER JOIN tbl_parques AS b ON a.acpa_parq=b.parq_ide WHERE acpa_acti=?";
	 	return Enlace::sql($sql,array($acti),3,'','','');
	 }

	 function poride($ide) {
	 	return Enlace::sql("SELECT * FROM tbl_atraccio where atra_ide=?",array($ide),3,'','','');
	 }

	 function insert() {
	 	extract($_POST);
	 	$datos = array(0,$des,$parq,1,$_SESSION['s_usua_ide']);
	 	$sql = "SELECT sf_actiparq(?,?,?,?,?) as res";
	 	return Enlace::sql($sql,$datos,5,'','','res');
	 }

	 function update() {
	 	extract($_POST);
	 	$datos = array($ide,$des,$parq,2,$_SESSION['s_usua_ide']);
	 	$sql = "SELECT sf_actiparq(?,?,?,?,?) as res";
	 	return Enlace::sql($sql,$datos,5,'','','res');
	 }

	 function delete() {
	 	extract($_POST);
	 	$datos = array($ide,0,0,3,$_SESSION['s_usua_ide']);
	 	$sql = "SELECT sf_actiparq(?,?,?,?,?)";
	 	return Enlace::sql($sql,$datos,2,'','','');
	 }
}
?>