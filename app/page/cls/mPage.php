<?php class mpage {

	public function __clone() {}
	public function __construct() {}

	public function experiencias() {
		$sql = "SELECT * FROM tbl_experien WHERE expe_aprobad=? ORDER BY expe_ide DESC LIMIT 0,10";
		$datos = array(1);
		return Enlace::sql($sql,$datos,3,'','','');
	}
} ?>