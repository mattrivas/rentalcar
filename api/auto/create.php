<?php
include_once './objects/product.php';

<<<<<<< HEAD
	function create($db, $terminator)
	{
    	echo "ENTRE A PRODUCTO";
    	$product = new Product($db);
    	$stmt = $product->create($terminator);
    	$num = $stmt->rowCount();
    	if($num==1){
    		$products_arr=array();
    		$products_arr["auto"]=array();

    		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    			//echo "ENTRE A EXTRAER $row";
    			print_r($row);
    			extract($row);
    			$product_item=array(
    				"id" => $maximo
    			);
    			print_r($product_item);
    			array_push($products_arr["auto"], $product_item);
    		}
    		echo json_encode($products_arr);
		}
		else{
    		echo json_encode("-1");
		}
	}
=======
function create($db, $terminator)
{
    echo "ENTRE A PRODUCTO";
    $product = new Product($db);
    $stmt = $product->create($terminator);
    $num = $stmt->rowCount();
    if($num==1){

     $products_arr=array();
     $products_arr["auto"]=array();

     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        //echo "ENTRE A EXTRAER $row";
        print_r($row);
        extract($row);
        $product_item=array(
            "id" => $maximo
        );
        print_r($product_item);
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
>>>>>>> c785b79b82a03b22d4ab7f37c65f50124139a3e8
?>