<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

$newsId = $_POST['deleteNews'];

if($newsId) { 

 $sql = "UPDATE news_ad SET news_status = 2 WHERE news_id = {$newsId}";

 if($connect->query($sql) === TRUE) {

   header("location:../news_ad.php");
   //  echo "<script>if(confirm('ลบข่าวแล้ว !!')){document.location.href='../news_ad.php'};</script>";
 } else {

   header("location:../news_ad.php");
   //  echo "<script>if(confirm('ลบไม่สำเร็จ !!')){document.location.href='../news_ad.php'};</script>";
 }
 
 $connect->close();
 echo json_encode($valid);
} // /if $_POST