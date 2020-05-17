<?php 	

require_once 'php_action/core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {		

$productId = $_POST['productId'];		

	$target_dir = "../images/stock/";
	$fileName = basename($_FILES["editProductImage"]["name"]);
	$new_name = md5(rand()) . '.' . $fileName;
	$targetFilePath = $target_dir . $new_name;
// $target_file = $target_dir . basename($_FILES["productImage"]["name"]);
$imageFileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
$extensions_arr = array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG');

	if(in_array($imageFileType, $extensions_arr)) {

		$image_base64 = base64_encode(file_get_contents($_FILES['editProductImage']['tmp_name']) );
		$image = 'data:product_image_64/'.$imageFileType.';base64,'.$image_base64;


		if(is_uploaded_file($_FILES['editProductImage']['tmp_name'])) {			
			// if(move_uploaded_file($_FILES['editProductImage']['tmp_name'], $targetFilePath)) {

				$sql = "UPDATE product SET product_image = '$new_name', product_image_64 = '$image' WHERE product_id = $productId";				

				if($connect->query($sql) === TRUE) {									
					$valid['success'] = true;
					$valid['messages'] = "Successfully Updated";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while updating product image";
				}
			// }	else {
			// 	return false;
			// }	
			// /else	
		} // if
	} // if in_array 		
	 
	$connect->close();

	echo json_encode($valid);
 
} 
// /if $_POST