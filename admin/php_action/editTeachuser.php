<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {

	$email = $_POST['Teachemail'];
	$password = $_POST['Teachpassword'];
	$passwordHash = md5($password);
	$fullname = $_POST['Teachfullname'];
	$phone = $_POST['Teachphone'];

	$user_id = $_POST['editTeachId'];

	$sql = "UPDATE users_personal SET user_id = '$email', password = '$passwordHash', email = '$email', fullname = '$fullname', phone = '$phone' WHERE user_id = '$user_id'";

	if ($connect->query($sql)) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating the categories";
	}

	$connect->close();

	echo json_encode($valid);
} // /if $_POST
