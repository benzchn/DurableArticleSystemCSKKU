<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
	$categoriesCode = $_POST['categoriesCode'];
	$categoriessubName = $_POST['categoriesName'];
	$subprice = $_POST['priceSub'];
	$subget = $_POST['getSub'];
	$fiscalYear = $_POST['fiscalYear'];

	$sql = "INSERT INTO categories_sublist (sublist_title, categories_code, sublist_priceperunit, 
			sublist_get, sublist_fiscalyear, sublist_status) VALUES ('$categoriessubName', '$categoriesCode','$subprice','$subget','$fiscalYear', 1)";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Added";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
	}

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST