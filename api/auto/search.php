<?php
include_once './objects/product.php';

function getSome($db, $params){
	$product = new Product($db);
	$stmt = $product->read($params);
	$num = $stmt->rowCount();
	if($num){
		$products_arr=array();
		$products_arr["auto"]=array();

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			$product_item=array(
				"id" => $id,
				"nombre" => $nombre,
				"descripcion" => $descripcion,
<<<<<<< HEAD
				"puertas" =>$puertas,
				"marca_nombre" => $marca_nombre,
				"categoria_nombre" => $categoria_nombre,
				"precio" => $precio,
				"cobertura_titulo" => $cobertura_titulo,
				"aseguradora_nombre" => $aseguradora_nombre,
				"agencia_id" => $agencia_nombre,
				"patente" => $patente
=======
				"marca_nombre" => $marca_nombre,
				"categoria_nombre" => $categoria_nombre,
				"precio" => $precio,
				"fecha_hasta" => $fecha_hasta,
				"cobertura_titulo" => $cobertura_titulo,
				"agencia_id" => $agencia_nombre,
				"patente" => $patente,
				"fecha_desde" => $fecha_desde
>>>>>>> c785b79b82a03b22d4ab7f37c65f50124139a3e8
			);

			array_push($products_arr["auto"], $product_item);
		}
		echo json_encode($products_arr);
	}

	else{
		echo json_encode(array("message" => "Sin autos para esos parametros."));
	}
}
function getAll($db){
	$product = new Product($db);
	$stmt = $product->all();
	$num = $stmt->rowCount();
	if($num){

		$products_arr=array();
		$products_arr["auto"]=array();

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			$product_item=array(
				"id" => $id,
				"nombre" => $nombre,
				"descripcion" => $descripcion,
<<<<<<< HEAD
				"puertas" =>$puertas,
				"marca_nombre" => $marca_nombre,
				"categoria_nombre" => $categoria_nombre,
				"precio" => $precio,
				"cobertura_titulo" => $cobertura_titulo,
				"aseguradora_nombre" => $aseguradora_nombre,
				"agencia_id" => $agencia_nombre,
				"patente" => $patente
=======
				"marca_nombre" => $marca_nombre,
				"categoria_nombre" => $categoria_nombre,
				"precio" => $precio,
				"fecha_hasta" => $fecha_hasta,
				"cobertura_titulo" => $cobertura_titulo,
				"agencia_id" => $agencia_nombre,
				"patente" => $patente,
				"fecha_desde" => $fecha_desde
>>>>>>> c785b79b82a03b22d4ab7f37c65f50124139a3e8
			);

			array_push($products_arr["auto"], $product_item);
		}
		echo json_encode($products_arr);
	}
	else{
		echo json_encode(array("message" => "Sin autos."));
	}
}
?>