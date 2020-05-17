<?php 	

require_once 'php_action/core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

	$productId = $_POST['productId'];
	// $productCode = $_POST['editproductCode'];
	$productStyle = $_POST['editproductStyle'];
	$productLocation = $_POST['editproductLocation'];
	$productRole = $_POST['editproductRole'];
	$productEtc = $_POST['editproductEtc'];
	$productStatus 	= $_POST['editproductStatus'];
				
	$sql = "UPDATE product SET 
			product_style = '$productStyle',
			product_location = '$productLocation',
			role_product_id = '$productRole',
			product_etc = '$productEtc',
			active = '$productStatus', 
			status = 1 
			WHERE product_id = $productId ";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
