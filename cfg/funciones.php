<?php 
class Funciones {
	
	function modalFooter($var) {
		if($var==1):
			$rt = '<div class="modal-footer clearfix">
			<button data-dismiss="modal" class="btn btn-default" type="button" data-bb-handler="cancel"><i class="fa fa-times"></i> Cerrar</button>
			<button class="btn btn-primary" type="submit" data-bb-handler="confirm"><i class="fa fa-check"></i> Aceptar</button>
			</div>';
		else:
			$rt = '<div class="modal-footer">
			<button data-dismiss="modal" class="btn btn-default" type="button" data-bb-handler="cancel"><i class="fa fa-times"></i> Cerrar</button>
			</div>';
		endif;
		return $rt;
	}

	function modalHeader($titulo) {
		$rt = '<div class="modal-header">
		<button data-dismiss="modal" class="bootbox-close-button close" type="button">×</button>
		<h4 class="modal-title">'.$titulo.'</h4>
		</div>';
		return $rt;
	}

	function select($var,$var2) {
		$rt = (!strcmp($var,$var2)) ? 'selected' : null;
		return $rt;
	}

	function check($var,$var2) {
		$rt = (!strcmp($var,$var2)) ? 'checked' : null;
		return $rt;
	}


	public function modalWidth($ancho) {
		$rt = '
				<style>
					@media screen and (min-width: 768px) {
					  .modal-dialog {
					    right: auto;
					    left: 50%;
					    width: '.$ancho.';
					    padding-top: 30px;
					    padding-bottom: 30px;
					  }
					}
				</style>
			';
		return $rt;
	}

	public function header($icono,$tit,$des) {
		$rt = '
			<div class="page-header">
				<h1>
					<i class="fa fa-'.$icono.'"></i>
					'.$tit.'
					<small>
						<i class="icon-double-angle-right"></i>
						'.$des.'
					</small>
				</h1>
			</div>';	
		return $rt;
	}

	public function content($file) {
		$rt = 
			'<div class="row">
				<div class="col-sm-12">';
					require $file.'.php';
		$rt .='
				</div>
			</div>';	
		return $rt;
	}

	public function contentopen() {
		$rt = 
			'<div class="row">
				<div class="col-sm-12">';
		return $rt;
	}

	public function contentclose() {
		$rt = '
				</div>
			</div>';	
		return $rt;
	}

	public function banners() {
		$rt = null;
		if(!isset($_GET['var_page']) or empty($_GET['var_page'])) {
			require 'app/page/vst/banner.php';
			if(!isset($_SESSION['s_usua_ide'])) {
				require 'app/usua/vst/login.php';
			} else {
				require 'app/usua/vst/perfil.php';
			}
		} else {
			$rt = null;
		}
		return $rt;
	}
				

}
?>