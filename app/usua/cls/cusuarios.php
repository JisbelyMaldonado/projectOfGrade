<?php 
class cusuarios extends musuarios {
	
	public function redirectLogin() {
		extract($_SESSION);
		if(!isset($s_usua_ide) or empty($s_usua_ide)) {
			header('location: login2.php');
		}
	}

	public function redirectIndex() {
		extract($_SESSION);
		if(isset($s_usua_ide) and !empty($s_usua_ide)) {
			header('location: index.php');
		}
	}

	public function clogin() {
		$row = $this->login();
		if(count($row)>0):
			$_SESSION = array(
					's_usua_ide'=>$row[0]->usua_ide,
					's_usua_nombres'=>$row[0]->usua_nombres,
					's_tius_ide'=>$row[0]->tius_ide,
					's_tius_descrip'=>$row[0]->tius_descrip,
				);
			$rt = 1;
		else:
			$rt = '!Error! Datos no válidos.';
		endif;
		return $rt;
	}

	public function administracion() {
		if($_SESSION['s_usua_ide']==1) {
			$rt = '<button onclick="location.href=\'admin.php\'" class="btn btn-success btn-sm"><i class="fa fa-gears"></i> Panel de Administración</button>';
		} else {
			$rt = '<button onclick="location.href=\'admin.php\'" class="btn btn-success btn-sm" disabled><i class="fa fa-gears"></i> Panel de Administración</button>';
		}
		return $rt;
	}

	public function estadoSesion() {
		if(isset($_SESSION) and isset($_SESSION['s_usua_ide'])) {
			$rt = '<li><a href="#" onclick="modal(\'vst-usua-cuenta\',\'\'); return false;">Mi Perfil</a></li>';
			if ($_SESSION['s_tius_ide']==1) {
				$rt .= '<li><a href="#" onclick="window.open(\'admin.php\'); return false;">Administración</a></li>';
			}
			$rt .='<li><a href="#" onclick="location.href=\'logout.php\'; return false">Salir</a></li>';
		} else {
			$rt = '<a href="" onclick="modal(\'login.php\',\'\');return false;">Inicio de Sesión</a>';
		}
		return $rt;
	}
}
?>