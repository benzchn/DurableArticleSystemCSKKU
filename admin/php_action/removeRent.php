<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$categoriesId = $_POST['categoriesId'];

if($categoriesId) { 

//  $sql = "UPDATE users_personal SET user_status = 2 WHERE id = {$categoriesId}";

 $sql = "DELETE FROM rent WHERE rent_id = {$categoriesId}";
 $sql1 = "DELETE FROM rent_detail WHERE rent_id = {$categoriesId}";

 if($connect->query($sql) === TRUE) {
    if($connect->query($sql1) === TRUE) {
 	$valid['success'] = true;
    $valid['messages'] = "ลบสำเร็จ";
    }
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "ลบไม่สำเร็จ กรุณาลองอีกครั้ง";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST