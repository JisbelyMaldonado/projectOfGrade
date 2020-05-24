<?php 
class mtius {
	function __clone() {

	}
	function __construct() {

	}

	public function lista() {
		return Enlace::sql("SELECT * FROM tbl_tipousua",'',3,'','','');
	}

	public function poride($ide) {
		return Enlace::sql("SELECT * FROM tbl_tipousua where tius_ide=?",array($ide),3,'','','');
	}

	public function insert() {
		extract($_POST);
		$datos = array(0,$des,1);
		$sql = "SELECT sf_tipousua(?,?,?) as res";
		return Enlace::sql($sql,$datos,5,'','','res');
	}

	public function update() {
		extract($_POST);
		$datos = array($ide,$des,2);
		$sql = "SELECT sf_tipousua(?,?,?) as res";
		return Enlace::sql($sql,$datos,5,'','','res');
	}

	public function delete() {
		extract($_POST);
		$datos = array($ide,0,3);
		$sql = "SELECT sf_tipousua(?,?,?)";
		return Enlace::sql($sql,$datos,2,'','','');
	}

	public function permlista() {
		return Enlace::sql("SELECT * FROM vw_modulos",'',3,'','','');
	}

	public function permiso($tius,$subm) {
		$datos = array($subm,$tius);
		$sql   = "SELECT * FROM tbl_permisos WHERE perm_sumo=? AND perm_tius=?";
		return Enlace::sql($sql,$datos,3,'','','');
	}

	public function permupdate() {
		extract($_POST);
		$datos = array($tius,$subm,$val);
		$sql = "SELECT sf_permisos(?,?,?)";
		return Enlace::sql($sql,$datos,2,'','','');
	}
}
?>