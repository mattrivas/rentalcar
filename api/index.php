<?php

//registrar?id=34&fecha_desde=2018-06-01&fecha_hasta=2018-06-15&dni=38796493
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once './config/database.php';
include_once './auto/read.php';
include_once './auto/create.php';

$database = new Database();
$db = $database->getConnection();

$aDonde = explode("/",$_SERVER['REQUEST_URI']);
if($aDonde[2] == 'api'){	
	switch ($aDonde[3]) {
		case 'auto':
		$carlitos  = explode('&', urldecode ( $_SERVER['QUERY_STRING']));
		print_r($carlitos);
		hazlotuyo($db, $carlitos);
		break;

		case 'registar':
		$jorgito=explode('&', urldecode($_SERVER['QUERY_STRING']));
		print_r($jorgito);
		create($db,$jorgito);
		break;
		

		default:
		echo "Pillin queres ir a $aDonde[3] con : $aDonde[4]";
		break;
	}
}
?>