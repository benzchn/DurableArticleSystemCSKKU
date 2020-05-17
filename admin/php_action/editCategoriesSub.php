<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$CategoriesSubName = $_POST['editCategoriesName'];
  $categorieSubId = $_POST['editCategoriesSubId'];
  $subprice = $_POST['editpriceSub'];
	$subget = $_POST['editgetSub'];
	$fiscalYear = $_POST['editfiscalYear'];

	$sql = "UPDATE categories_sublist SET sublist_title = '$CategoriesSubName', sublist_priceperunit = '$subprice',
			sublist_get='$subget', sublist_fiscalyear='$fiscalYear' WHERE sublist_id = '$categorieSubId'";

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