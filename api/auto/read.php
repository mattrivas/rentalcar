<?php
include_once './objects/product.php';

function hazlotuyo($db, $terminator){

    $product = new Product($db);
    $stmt = $product->read($terminator);
    $num = $stmt->rowCount();
    if($num>0){

     $products_arr=array();
     $products_arr["auto"]=array();

     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
            "id" => $id,
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "marca_id" => $marca_id,
            "categoria_id" => $categoria_id,
            "precio" => $precio,
            "fecha_hasta" => $fecha_hasta,
            "cobertura_id" => $cobertura_id,
            "agencia_id" => $agencia_id,
            "patente" => $patente,
            "fecha_desde" => $fecha_desde
        );

        array_push($products_arr["auto"], $product_item);
    }

    echo json_encode($products_arr);
}

else{
    echo json_encode(
        array("message" => "Sin autos.")
    );
}

}
?>
