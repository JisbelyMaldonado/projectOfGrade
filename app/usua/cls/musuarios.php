<?php 
class musuarios {
	function __clone() {

	}

	function __construct() {
		
	}

	public function login() {
		extract($_POST);
		$datos = array($usuario,$clave,1);
		$sql = 'SELECT * FROM vw_usuarios WHERE acce_nombre=? AND acce_clave=? AND acce_estado=?';
		return Enlace::sql($sql,$datos,3,'','','');
	}

	public function opcionesMenu() {
		extract($_SESSION);
		$datos = array($s_tius_ide,1);
		$sql = 'SELECT * FROM vw_permisos WHERE perm_tius=? AND perm_estado=?';
		return Enlace::sql($sql,$datos,3,'','','');
	}

	public function contenido() {
		extract($_SESSION); extract($_GET);
		$datos = array($s_tius_ide,1,$g_var);
		$sql = 'SELECT * FROM vw_permisos WHERE perm_tius=? AND perm_estado=? AND sumo_ide=?';
		return Enlace::sql($sql,$datos,3,'','','');
	}

	public function lista() {
		return Enlace::sql("SELECT * FROM vw_usuarios WHERE acce_estado=1",'',3,'','','');
	}

	public function poride($ide) {
		return Enlace::sql("SELECT * FROM vw_usuarios WHERE usua_ide=?",array($ide),3,'','','');
	}

	public function insert() {
		extract($_POST);
		$datos = array(0,$nac,$ced,$nom,$ape,$tel,$cor,$usu,$cla,$tip,1,$_SESSION['s_usua_ide']);
		$sql = "SELECT sf_usuarios(?,?,?,?,?,?,?,?,?,?,?,?) as res";
		return Enlace::sql($sql,$datos,5,'','','res');
	}

	public function update() {
		extract($_POST);
		$datos = array($ide,$nac,$ced,$nom,$ape,$tel,$cor,$usu,$cla,$tip,2,$_SESSION['s_usua_ide']);
		$sql = "SELECT sf_usuarios(?,?,?,?,?,?,?,?,?,?,?,?) as res";
		return Enlace::sql($sql,$datos,5,'','','res');
	}

	public function delete() {
		extract($_POST);
		$datos = array($ide,0,0,0,0,0,0,0,0,0,3,$_SESSION['s_usua_ide']);
		$sql = "SELECT sf_usuarios(?,?,?,?,?,?,?,?,?,?,?,?)";
		return Enlace::sql($sql,$datos,2,'','','');
	}

	public function auditoria() {
		$sql = "SELECT * FROM tbl_auditori AS a JOIN tbl_usuarios AS b ON a.usua=b.usua_ide JOIN tbl_acceso AS c ON b.usua_ide=c.acce_usua";
		return Enlace::sql($sql,'',3,'','','');
	}

}
?>