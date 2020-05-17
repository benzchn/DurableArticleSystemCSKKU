<?php

require_once 'php_action/core.php';

// $valid['success'] = array('success' => false, 'messages' => array());
	$newsMessage = $_POST['newsMessage'];
	$newsDate = $_POST['newsDate'];
	$newsTitle = $_POST['newsTitle'];
	$newsId = $_POST['newsId'];
// File upload path
$targetDir = "../images/stock/";
$fileName = basename($_FILES["newsImages"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["newsImages"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["newsImages"]["tmp_name"], $targetFilePath)){
			// Insert image file name into database

				$sql = "UPDATE news_ad SET news_image = '$fileName', news_title = '$newsTitle', news_detail = '$newsMessage',
						news_date = '$newsDate' WHERE news_id = $newsId";

			if($connect->query($sql)){
        		echo "<script>if(confirm('แก้ไขประกาศแล้ว !!')){document.location.href='news_ad.php'};</script>";
			} else {
	 			echo "<script>if(confirm('แก้ประกาศไม่สำเร็จ กรุณากรอกใหม่ !!')){document.location.href='news_ad.php'};</script>";
			}
			

    } else{
		echo "Sorry, there was an error uploading your file.";
	}
}else{
	echo 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
}
}else{
	if($fileName == ''){
	// echo 'Please select a file to upload.';
			$sql = "UPDATE news_ad SET news_title = '$newsTitle', news_detail = '$newsMessage',
			news_date = '$newsDate' WHERE news_id = $newsId";

			if($connect->query($sql)){
        		echo "<script>if(confirm('แก้ไขประกาศแล้ว !!')){document.location.href='news_ad.php'};</script>";
			} else {
	 			echo "<script>if(confirm('แก้ประกาศไม่สำเร็จ กรุณากรอกใหม่ !!')){document.location.href='news_ad.php'};</script>";
			}
	}
}
?>