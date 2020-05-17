<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$CategoriesCode = $_POST['editCategoriesCode'];
	$CategoriesName = $_POST['editCategoriesName'];
	
  	$categoriesId = $_POST['editCategoriesId'];

	$sql = "UPDATE categories SET categories_code = '$CategoriesCode', categories_name = '$CategoriesName' WHERE categories_id = '$categoriesId'";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while updating the categories";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST