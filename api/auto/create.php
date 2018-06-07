<?php
include_once './objects/product.php';

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
?>