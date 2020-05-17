<?php 	

require_once 'core.php';

$rentId = $_GET['rentId'];

if($rentId) { 

 $sql = "DELETE FROM rent WHERE rent_id = {$rentId}";
 $sql1 = "DELETE FROM rent_detail WHERE rent_id = {$rentId}";

 if($connect->query($sql) === TRUE) {
    if($connect->query($sql1) === TRUE) {
    echo "<script>if(confirm('ลบการแจ้งยืมแล้ว !!')){document.location.href='../rent_my.php'};</script>";
    }
 } else {
    echo "<script>if(confirm('ลบการแจ้งยืม ไม่สำเร็จ !!')){document.location.href='../rent_my.php'};</script>";
 }
}