<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

    $rentStatus = $_POST['RentStatus'];
    $rentEtc = $_POST['RentEtc'];
    $rentDate = $_POST['RentDate'];
    $returnDatefix = $_POST['ReturnDateFix'];
    $returnDate = $_POST['ReturnDate'];
    
    $fullname = $_POST['editUser'];
    $productCode = $_POST['editProductCode'];
	
  	$categoriesId = $_POST['editCategoriesId'];

	$sql = "UPDATE rent SET rent_status = $rentStatus, rent_etc = '$rentEtc' WHERE rent_id = $categoriesId";

	if($connect->query($sql) === TRUE) {

        $sql1 = "UPDATE rent_detail SET rent_date = '$rentDate', return_datefix = '$returnDatefix', return_date = '$returnDate' WHERE rent_id = $categoriesId";
        if($connect->query($sql1) === TRUE) {

            if($rentStatus == 1 || $rentStatus == 3){

                $sql2 = "UPDATE product SET active = 2, product_etc = 'ผู้ยืมคุณ $fullname' WHERE product_code = '$productCode'";
                if($connect->query($sql2) === TRUE) {

                    $valid['success'] = true;
                    $valid['messages'] = "Successfully Updated";
                }
            }
        }
        
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while updating the categories";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST