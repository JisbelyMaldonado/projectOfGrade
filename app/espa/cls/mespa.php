<?php 
class mespa {
	 function __clone() {

	 }
	 function __construct() {

	 }

	 function lista($parq) {
	 	$sql = "SELECT * from tbl_muniparqu as a 
			inner join tbl_municipi as b on a.mupa_muni=b.muni_ide 
			inner join tbl_estado as c on b.muni_esta=c.esta_ide
			where a.mupa_parq=?";
	 	return Enlace::sql($sql,array($parq),3,'','','');
	 }

	 function poride($ide) {
	 	$sql = "SELECT * from tbl_muniparqu as a 
			inner join tbl_municipi as b on a.mupa_muni=b.muni_ide 
			inner join tbl_estado as c on b.muni_esta=c.esta_ide
			where a.mupa_ide=?";
	 	return Enlace::sql($sql,array($ide),3,'','','');
	 }

	 function insert() {
	 	extract($_POST);
	 	$datos = array(0,$parq,$mun,1);
	 	$sql = "SELECT sf_muniparq(?,?,?,?) as res";
	 	return Enlace::sql($sql,$datos,5,'','','res');
	 }

	 function update() {
	 	extract($_POST);
	 	$datos = array($ide,$parq,$mun,2);
	 	$sql = "SELECT sf_muniparq(?,?,?,?) as res";
	 	return Enlace::sql($sql,$datos,5,'','','res');
	 }

	 function delete() {
	 	extract($_POST);
	 	$datos = array($ide,0,0,3);
	 	$sql = "SELECT sf_muniparq(?,?,?,?)";
	 	return Enlace::sql($sql,$datos,2,'','','');
	 }
}
?>