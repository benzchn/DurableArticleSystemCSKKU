<?php 	

require_once 'core.php';
session_start();
// $valid['success'] = array('success' => false, 'messages' => array());

if(isset($_POST['updateRoleBtn'])) {	

	$userId = $_POST['user_id'];
	$admin_name = $_SESSION['fullname'];
  	

	$sql = "UPDATE users_personal SET user_status = 1, admin_approve = '$admin_name' WHERE user_id = '$userId'";

	if($connect->query($sql) === TRUE) {
        header("location:../dashboard.php");
	} else {
        echo "<script>if(confirm('อนุมัติไม่สำเร็จ !!')){document.location.href='../dashboard.php'};</script>";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST