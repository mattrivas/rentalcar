<?php

//registrar?id=34&fecha_desde=2018-06-01&fecha_hasta=2018-06-15&dni=38796493
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once './config/database.php';
include_once './auto/read.php';
include_once './auto/create.php';
include_once './auto/delete.php';

$database = new Database();
$db = $database->getConnection();

$aDonde = explode("/",$_SERVER['REQUEST_URI']);
if($aDonde[2] == 'api'){	
	switch ($aDonde[3]) {
		case 'auto':
		$var=explode('?', $aDonde[4]);

		switch($var[0]){
			case 'trae':
			$carlitos  = explode('&', $var[1]);
			getAll($db, $carlitos);
			break;

			case 'registrar':
			$jorgito=explode('&', $var[1]);
			//echo $_SERVER['QUERY_STRING'];
			//echo "\n";
			//echo $var[1];
			create($db,$jorgito);
			break;
                    
                        case 'eliminar':
			$fran=explode('&', $var[1]);
			//echo $_SERVER['QUERY_STRING'];
			//echo "\n";
			//echo $var[1];
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