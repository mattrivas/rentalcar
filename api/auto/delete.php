<?php
include_once './objects/product.php';

function delete($db, $terminator)
{
    echo "ENTRE A delete";
    $product = new Product($db);
    $stmt = $product->delete($terminator);
    $products_arr=array();
    $products_arr["auto"]=array();

        $product_item=array(
            "id" => $stmt
        );
        print_r($product_item);
        array_push($products_arr["auto"], $product_item);

    echo json_encode($products_arr);
}
?> 
