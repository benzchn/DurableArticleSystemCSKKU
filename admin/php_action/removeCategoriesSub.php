<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$categoriesId = $_POST['categoriesId'];

if($categoriesId) { 

 $sql = "UPDATE categories_sublist SET sublist_status = 2 WHERE sublist_id = {$categoriesId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "ลบสำเร็จ";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "ลบไม่สำเร็จ กรุณาลองอีกครั้ง";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST