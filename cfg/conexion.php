<?php 
class Enlace {
	private $driver, $host, $usr, $pwd, $dbname, $con;

	function __clone() {

	}

	function __construct() {
		
	}

	public static function conectar() {
		$driver = 'mysql';
		$host   = 'localhost';
		$usr    = 'root';
		$pwd    = '';
		$dbname = 'final_imparques';
		try {
			$con = new PDO($driver.':host='.$host.';dbname='.$dbname, $usr, $pwd);
			return $con;
		} catch(PDOException $e) {
		 	$e->getMessage();
		}
	}

	public static function sql($sql,$datos,$response,$accion,$oid,$dev) {
		$res = self::conectar()->prepare($sql);
		if (is_array($datos) and count($datos)>0) {
			foreach($datos as $ind=>&$val) {
				$num = $ind+1;
				$res->bindParam($num,$val);
			}
		}
		$tip = array(1=>'last',2=>'success',3=>'rows',4=>'count',5=>'resp');
		return self::$tip[$response]($res, $accion, $oid, $dev);
	}

	public static function last($res, $accion, $oid, $dev) {
		if ($res->execute()==true) :
			$rt = self::conectar()->lastInsertId();		
		else:
			$rt = print_r($res->errorInfo());
		endif;
		//if ($accion!='' and is_numeric($rt)) : self::auditoria($accion); endif;
		return $rt;
	}

	public static function success($res, $accion, $oid, $dev) {
		if ($res->execute()==true) :
			$rt = 1;
		else:
			$rt = print_r($res->errorInfo());
		endif;
		//if ($accion!='' and $rt==1) : self::auditoria($accion); endif;
		return $rt;
	}

	public static function rows($res, $accion, $oid, $dev) {
		if ($res->execute()==true) :
			$rt = $res->fetchAll(PDO::FETCH_OBJ);
		else:
			$rt = print_r($res->errorInfo());
		endif;
		//if ($accion!='' and is_array($rt)) : self::auditoria($accion); endif;
		return $rt;
	}

	public static function count($res, $accion, $oid, $dev) {
		if ($res->execute()==true) :
			$rt = $res->rowCount();
		else:
			$rt = print_r($res->errorInfo());
		endif;
		//if ($accion!='' and is_numeric($rt)) : self::auditoria($accion); endif;
		return $rt;
	}

	public static function resp($res, $accion, $oid, $dev) {
		if ($res->execute()==true) :
			$val = $res->fetchAll(PDO::FETCH_OBJ);
			$rt = $val[0]->$dev;
		else:
			$rt = print_r($res->errorInfo());
		endif;
		if ($accion!='' and is_array($val)) : self::auditoria($accion); endif;
		return $rt;
	}

	public static function auditoria($accion) {
		if(is_array($accion)) {
			$sql = "SELECT auditoria(?,?,?,?,?)";
			$res = self::postgres2()->prepare($sql);
			$res->bindParam(1,$_SESSION['usuaide']);
			$res->bindParam(2,$accion[0]);
			$res->bindParam(3,$accion[1]);
			$res->bindParam(4,$accion[2]);
			$res->bindParam(5,$accion[3]);
			$res->execute();
		}
	}

}
?>