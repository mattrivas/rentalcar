<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once 'Model/acceso_db.php';
 
// instantiate database and product object
$db = DB::getInstance();

 
// query products
$sentencia = "SELECT * FROM auto Where fecha_hasta='2018/05/30'";
$stmt = $db->execute_query($sentencia);
 
// check if more than 0 record found
if($db->checkRows($stmt)){
 
    // products array
    $products_arr=array();
    $products_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $db->getRows($stmt)){
        $product_item=array(
            "id" => $row["id"],
            "name" => $row["nombre"],
            "description" => $row["descripcion"],
            "marca" => $row["marca_id"],
            "categoria_id" => $row["categoria_id"],
            "precio" => $row["precio"],
            "fecha_hasta" => $row["fecha_hasta"],
            "cobertura_id" => $row["cobertura_id"],
            "agencia_id" => $row["agencia_id"],
            "patente" => $row["patente"],
            "fecha_desde" => $row["fecha_desde"]
        );
 
        array_push($products_arr["records"], $product_item);
    }
 
    echo json_encode($products_arr);
}
 
else{
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>