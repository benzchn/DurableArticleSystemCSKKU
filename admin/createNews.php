<?php

require_once 'php_action/core.php';

// $valid['success'] = array('success' => false, 'messages' => array());
	$newsMessage = $_POST['newsMessage'];
	// $newsDate = $_POST['newsDate'];
	$newsTitle = $_POST['newsTitle'];
	$who = $_SESSION['fullname'];
// File upload path
$targetDir = "../images/news/";
$fileName = basename($_FILES["newsImages"]["name"]);
$new_name = md5(rand()) . '.' . $fileName;
$targetFilePath = $targetDir . $new_name;
$fileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));

if(isset($_POST["submit"]) && !empty($_FILES["newsImages"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
		
		// Convert to base64 
		$image_base64 = base64_encode(file_get_contents($_FILES['newsImages']['tmp_name']) );
		$image = 'data:news_image_64/'.$fileType.';base64,'.$image_base64;
		
			// Insert image file name into database

				$sql = "INSERT INTO news_ad (news_image, news_title, news_image_64, news_detail,news_who_create, news_date, news_status) VALUES ('$new_name', '$newsTitle','$image', '$newsMessage', '$who', NOW(), 1)";

			if($connect->query($sql)){
        		echo "<script>if(confirm('ลงประกาศข่าวสารแล้ว !!')){document.location.href='news_ad.php'};</script>";
			} else {
	 			echo "<script>if(confirm('ลงประกาศข่าวสารไม่สำเร็จ กรุณากรอกใหม่ !!')){document.location.href='news_ad.php'};</script>";
			}
			
}else{
	echo 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
}
}else{
	if($fileName == ''){
	// echo 'Please select a file to upload.';
			$sql = "INSERT INTO news_ad (news_image, news_title, news_detail, news_who_create, news_date, news_status) VALUES ('', '$newsTitle', '$newsMessage', '$who', '$newsDate', 1)";

			if($connect->query($sql)){
        		echo "<script>if(confirm('ลงประกาศข่าวสารแล้ว !!')){document.location.href='news_ad.php'};</script>";
			} else {
	 			echo "<script>if(confirm('ลงประกาศข่าวสารไม่สำเร็จ กรุณากรอกใหม่ !!')){document.location.href='news_ad.php'};</script>";
			}
	}
}
?>