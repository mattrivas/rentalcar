<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once './config/database.php';
include_once './auto/search.php';
include_once './auto/create.php';
<<<<<<< HEAD
include_once './auto/update.php';
=======
>>>>>>> c785b79b82a03b22d4ab7f37c65f50124139a3e8
include_once './auto/delete.php';

$database = new Database();
$db = $database->getConnection();

$aDonde = explode("/",$_SERVER['REQUEST_URI']);
if($aDonde[2] == 'api'){	
	switch ($aDonde[3]) {
		case 'auto':
		$params  = explode('&', urldecode ( $_SERVER['QUERY_STRING']));
<<<<<<< HEAD
		$var=explode('?', $aDonde[4]);

=======

		$var=explode('?', $aDonde[4]);

>>>>>>> c785b79b82a03b22d4ab7f37c65f50124139a3e8
		switch($var[0]){
			case 'trae':
			if(!empty($var[1])){
				$parametros  = explode('&', $var[1]);
				getSome($db,$parametros);
			}else{
				getAll($db);
			}
			break;
<<<<<<< HEAD

			case 'registrar':
			$jorgito=explode('&', $var[1]);
			create($db,$jorgito);
			break;

			case 'eliminar':
			$fran=explode('&',$var[1]);
			delete($db,$fran);
=======

			case 'registrar':
			$jorgito=explode('&', $var[1]);
			
			create($db,$jorgito);
			break;

			case 'eliminar':
			$fran=explode('&', $var[1]);
			
			delete($db,$fran);
			break;
>>>>>>> c785b79b82a03b22d4ab7f37c65f50124139a3e8

			case 'actualizar':
			$params=explode('&',$var[1]);
			update($db,$params);
			break;

			default:
			echo "Entré al default\n";
			echo $var[0];
			break;
		}
		break;
		default:
		echo "Pillin queres ir a $aDonde[3] con : $aDonde[4]";
		break;
	}
}
?>