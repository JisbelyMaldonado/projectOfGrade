<?php 
class ctius extends mtius {

	public function estado($tius,$subm,$ind) {
		$perm = $this->permiso($tius,$subm);
		$estado = (count($perm)>0) ? $perm[0]->perm_estado : 0;
		$text = ($estado==1) ? 'Activo' : 'Bloqueado';
		$val  = ($estado==1) ? 0 : 1;
		$btn  = ($estado==1) ? 'danger' : 'success';
		$btnv = ($estado==1) ? 'Bloquear' : 'Activar';
		$rt = array($text,$val,$btn,$btnv);
		return $rt[$ind];
	}

}
?>