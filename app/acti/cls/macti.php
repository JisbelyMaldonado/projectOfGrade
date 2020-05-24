<?php 
class macti {
	 function __clone() {

	 }
	 function __construct() {

	 }

	 function lista() {
	 	return Enlace::sql("SELECT * FROM tbl_activida",'',3,'','','');
	 }

	 function poride($ide) {
	 	return Enlace::sql("SELECT * FROM tbl_activida where acti_ide=?",array($ide),3,'','','');
	 }

	 function insert() {
	 	extract($_POST);
	 	$datos = array(0,$des,1);
	 	$sql = "SELECT sf_activida(?,?,?) as res";
	 	return Enlace::sql($sql,$datos,5,'','','res');
	 }

	 function update() {
	 	extract($_POST);
	 	$datos = array($ide,$des,2);
	 	$sql = "SELECT sf_activida(?,?,?) as res";
	 	return Enlace::sql($sql,$datos,5,'','','res');
	 }

	 function delete() {
	 	extract($_POST);
	 	$datos = array($ide,0,3);
	 	$sql = "SELECT sf_activida(?,?,?)";
	 	return Enlace::sql($sql,$datos,2,'','','');
	 }
	 function cargarImagen($ide,$formato) {
	 	$file = $ide.'.'.$formato;
	 	$sql = "UPDATE tbl_activida SET acti_icono=? WHERE acti_ide=?";
	 	$datos = array($file,$ide);
	 	return Enlace::sql($sql,$datos,2,'','','');
	 }

	 function deleteIcono() {
	 	$sql = "UPDATE tbl_activida SET acti_icono=? WHERE acti_ide=?";
	 	$datos = array('',$_POST['ide']);
	 	return Enlace::sql($sql,$datos,2,'','','');
	 }
}
?>