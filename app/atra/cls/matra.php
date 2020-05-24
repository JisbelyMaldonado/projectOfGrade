<?php 
class matra {
	 function __clone() {

	 }
	 function __construct() {

	 }

	 function lista($esta) {
	 	return Enlace::sql("SELECT * FROM tbl_atraccio where atra_parq=?",array($esta),3,'','','');
	 }

	 function poride($ide) {
	 	return Enlace::sql("SELECT * FROM tbl_atraccio where atra_ide=?",array($ide),3,'','','');
	 }

	 function insert() {
	 	extract($_POST);
	 	$datos = array(0,$des,$parq,$lat,$lon,1);
	 	$sql = "SELECT sf_atraccio(?,?,?,?,?,?) as res";
	 	return Enlace::sql($sql,$datos,5,'','','res');
	 }

	 function update() {
	 	extract($_POST);
	 	$datos = array($ide,$des,$parq,$lat,$lon,2);
	 	$sql = "SELECT sf_atraccio(?,?,?,?,?,?) as res";
	 	return Enlace::sql($sql,$datos,5,'','','res');
	 }

	 function delete() {
	 	extract($_POST);
	 	$datos = array($ide,0,0,0,03);
	 	$sql = "SELECT sf_atraccio(?,?,?,?,?,?)";
	 	return Enlace::sql($sql,$datos,2,'','','');
	 }
}
?>