<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once './config/database.php';
include_once './auto/search.php';
include_once './auto/create.php';
include_once './auto/delete.php';

$database = new Database();
$db = $database->getConnection();

$aDonde = explode("/",$_SERVER['REQUEST_URI']);
if($aDonde[2] == 'api'){	
	switch ($aDonde[3]) {
		case 'auto':
		$params  = explode('&', urldecode ( $_SERVER['QUERY_STRING']));

		$var=explode('?', $aDonde[4]);

		switch($var[0]){
			case 'trae':
			if(!empty($var[1])){
				$parametros  = explode('&', $var[1]);
				getSome($db,$parametros);
			}else{
				getAll($db);
			}
			break;

			case 'registrar':
			$jorgito=explode('&', $var[1]);
			
			create($db,$jorgito);
			break;

			case 'eliminar':
			$fran=explode('&', $var[1]);
			
			delete($db,$fran);
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