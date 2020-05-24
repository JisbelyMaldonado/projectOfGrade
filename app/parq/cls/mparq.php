<?php 
class mparq {
	 function __clone() {

	 }
	 function __construct() {

	 }

	 function lista() {
	 	return Enlace::sql("SELECT * FROM tbl_parques",'',3,'','','');
	 }

	 function listaLimit() {
	 	return Enlace::sql("SELECT * FROM tbl_parques LIMIT 0,2",'',3,'','','');
	 }

	 function poride($ide) {
	 	return Enlace::sql("SELECT * FROM tbl_parques where parq_ide=?",array($ide),3,'','','');
	 }

	 function insert() {
	 	extract($_POST);
	 	$datos = array(0,$nom,$car,$lat,$lon,$cli,$msn,$nor,$sur,$est,$oes,$det,$ubi,$_SESSION['s_usua_ide'],1);
	 	$sql = "SELECT sf_parques(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) as res";
	 	return Enlace::sql($sql,$datos,5,'','','res');
	 }

	 function update() {
	 	extract($_POST);
	 	$datos = array($ide,$nom,$car,$lat,$lon,$cli,$msn,$nor,$sur,$est,$oes,$det,$ubi,$_SESSION['s_usua_ide'],2);
	 	$sql = "SELECT sf_parques(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) as res";
	 	return Enlace::sql($sql,$datos,5,'','','res');
	 }

	 function delete() {
	 	extract($_POST);
	 	$datos = array($ide,0,0,0,0,0,0,0,0,0,0,0,0,0,3);
	 	$sql = "SELECT sf_parques(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	 	return Enlace::sql($sql,$datos,2,'','','');
	 }

	 function contador($ide) {
	 	$row = Enlace::sql("SELECT parq_busqued as tot FROM tbl_parques WHERE parq_ide=?",array($ide),5,'','','tot');
	 	$suma = $row+1;
	 	Enlace::sql("UPDATE tbl_parques SET parq_busqued=? WHERE parq_ide=?",array($suma,$ide),2,'','','');
	 }

	 function totalbusquedasP($ide) {
	 	$row = Enlace::sql("SELECT SUM(parq_busqued) AS total  FROM tbl_parques",'',5,'','','total');
	 	$row2 = Enlace::sql("SELECT SUM(parq_busqued) AS total  FROM tbl_parques WHERE parq_ide=?",array($ide),5,'','','total');
	 	$tot = ($row>0) ? number_format($row2*100/$row,2) : 0;
	 	return $tot;
	 }
	  function totalbusquedasN($ide) {
	 	$row2 = Enlace::sql("SELECT SUM(parq_busqued) AS total  FROM tbl_parques WHERE parq_ide=?",array($ide),5,'','','total');
	 	return $row2;
	 }
}
?>