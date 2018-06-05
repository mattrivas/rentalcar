<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once './config/database.php';
include_once './auto/read.php';

$database = new Database();
$db = $database->getConnection();

$aDonde = explode("/",$_SERVER['REQUEST_URI']);
if($aDonde[2] == 'api'){	
	switch ($aDonde[3]) {
		case 'auto':
		$params  = explode('&', urldecode ( $_SERVER['QUERY_STRING']));
		getAll($db, $params);
		break;
		default:
		echo "Pillin queres ir a $aDonde[3] con : $aDonde[4]";
		break;
	}
}
?>