<?php class mexpe {
	function __clone() {}
	function __construct() {}

	public function insertExperiencia() {
		$sql = "SELECT sf_experien(?,?,?) as res";
		extract($_POST);$datos = array($nombre,$experiencia,$correo);
		$res = Enlace::sql($sql,$datos,5,'','','res');
		if (is_numeric($res)) {
			$ruta = 'img/expe/'.$res.'.jpeg';
			if(move_uploaded_file($_FILES['foto']['tmp_name'], $ruta)) {
				$rt = "Tu Experiencia ha sido compartida. Espera la aprobación del administrador para ser publicada. ¡Gracias!";
			} else {
				$rt = 'Ocurrió un error al procesar tu experiencia. Intenta nuevamente';
			}
		}
		$fin = '<script>alert("'.$rt.'");location.href="index_cont.php?page=Y29tcGFydGU="</script>';
		return $fin;
	}

	public function experiencias() {
		$sql = "SELECT * FROM tbl_experien WHERE expe_aprobad=? ORDER BY expe_ide DESC";
		$datos = array(0);
		return Enlace::sql($sql,$datos,3,'','','');
	}
	public function poride($ide) {
		$sql = "SELECT * FROM tbl_experien WHERE expe_ide=?";
		$datos = array($ide);
		return Enlace::sql($sql,$datos,3,'','','');
	}
	public function aprobar() {
		$sql = "UPDATE tbl_experien SET expe_aprobad=? WHERE expe_ide=?";
		extract($_POST);$datos = array($forma,$ide);
		return Enlace::sql($sql,$datos,2,'','','');

	}
} ?>