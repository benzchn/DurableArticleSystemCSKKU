<?php 	

require_once 'php_action/core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$productCode 	= $_POST['productCode'];
	$productStyle = $_POST['productStyle'];
	$productLocation = $_POST['productLocation'];
	$productRole = $_POST['productRole'];
	$productStatus 	= $_POST['productStatus'];
	$productEtc = $_POST['productEtc'];
	$sublistCode = $_POST['sublistCode'];
	

	// $type = explode('.', $_FILES['productImage']['name']);
	// $type = $type[count($type)-1];
	// $url = '../images/stock/'.uniqid(rand()).'.'.$type;
	

	// $name = $_FILES['productImage']['name'];
	$target_dir = "../images/stock/";
	$fileName = basename($_FILES["productImage"]["name"]);
	$new_name = md5(rand()) . '.' . $fileName;
	$targetFilePath = $target_dir . $new_name;

	// $target_file = $target_dir . basename($_FILES["productImage"]["name"]);
	$imageFileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
	$extensions_arr = array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG');

	if(in_array($imageFileType, $extensions_arr)) {

		$image_base64 = base64_encode(file_get_contents($_FILES['productImage']['tmp_name']) );
		$image = 'data:product_image_64/'.$imageFileType.';base64,'.$image_base64;

		if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {
			
			// if(move_uploaded_file($_FILES['productImage']['tmp_name'], $targetFilePath)) {
				
				$sql = "INSERT INTO product (product_code, product_image, product_image_64, product_style, product_location, role_product_id, product_etc, sublist_id, active, status) 
				VALUES ('$productCode', '$new_name', '$image', '$productStyle', '$productLocation', '$productRole', '$productEtc','$sublistCode', '$productStatus', 1)";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				}

			// }		
		} // if
	} // if in_array 		

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST