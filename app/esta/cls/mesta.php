<?php 
class mesta {
	 function __clone() {

	 }
	 function __construct() {

	 }

	 function lista() {
	 	return Enlace::sql("SELECT * FROM tbl_estado",'',3,'','','');
	 }

	 function poride($ide) {
	 	return Enlace::sql("SELECT * FROM tbl_estado where esta_ide=?",array($ide),3,'','','');
	 }

	 function insert() {
	 	extract($_POST);
	 	$datos = array(0,$des,1);
	 	$sql = "SELECT sf_estado(?,?,?) as res";
	 	return Enlace::sql($sql,$datos,5,'','','res');
	 }

	 function update() {
	 	extract($_POST);
	 	$datos = array($ide,$des,2);
	 	$sql = "SELECT sf_estado(?,?,?) as res";
	 	return Enlace::sql($sql,$datos,5,'','','res');
	 }

	 function delete() {
	 	extract($_POST);
	 	$datos = array($ide,0,3);
	 	$sql = "SELECT sf_estado(?,?,?)";
	 	return Enlace::sql($sql,$datos,2,'','','');
	 }
}
?>