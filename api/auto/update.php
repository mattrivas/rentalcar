<?php
include_once './objects/product.php';

function update($db, $terminator){
    echo "ENTRE A PRODUCTO \n";
    $product = new Product($db);
    $stmt = $product->update($terminator);

    if($stmt==true){
        echo json_encode("Actualización Hecha correctamente");
    }
    else{
        echo json_encode("No se pudo realizar la Actualización. Intente nuevamente");
    }
}
?>