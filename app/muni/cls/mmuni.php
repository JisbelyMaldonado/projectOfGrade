<?php 
class mmuni {
	 function __clone() {

	 }
	 function __construct() {

	 }

	 function lista($esta) {
	 	return Enlace::sql("SELECT * FROM tbl_municipi where muni_esta=?",array($esta),3,'','','');
	 }

	 function poride($ide) {
	 	return Enlace::sql("SELECT * FROM tbl_municipi where muni_ide=?",array($ide),3,'','','');
	 }

	 function insert() {
	 	extract($_POST);
	 	$datos = array(0,$des,$esta,1);
	 	$sql = "SELECT sf_municipi(?,?,?,?) as res";
	 	return Enlace::sql($sql,$datos,5,'','','res');
	 }

	 function update() {
	 	extract($_POST);
	 	$datos = array($ide,$des,$esta,2);
	 	$sql = "SELECT sf_municipi(?,?,?,?) as res";
	 	return Enlace::sql($sql,$datos,5,'','','res');
	 }

	 function delete() {
	 	extract($_POST);
	 	$datos = array($ide,0,0,3);
	 	$sql = "SELECT sf_municipi(?,?,?,?)";
	 	return Enlace::sql($sql,$datos,2,'','','');
	 }
}
?>