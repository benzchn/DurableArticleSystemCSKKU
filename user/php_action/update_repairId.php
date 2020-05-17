<?php 	

require_once 'core.php';

$whoCreate = $_SESSION['fullname'];
$User_name = $_SESSION['user_name'];


$sql1 = "SELECT repair_id FROM repair_report WHERE repair_who_create = '$whoCreate' AND user_name = '$User_name'";
$query = $connect->query($sql1);
$row = $query->fetch_assoc();
$repairId = $row['repair_id'];

$sql2 = "UPDATE repair_report SET repair_id = '$repairId' WHERE repair_who_create = '$whoCreate' AND user_name = '$User_name'";

if($connect->query($sql2) === TRUE) {
    echo "<script>if(confirm('แจ้งการซ่อมแล้ว !!')){document.location.href='../repair_report.php'};</script>";
}else {
    echo "<script>if(confirm('แจ้งซ่อมไม่สำเร็จ !!')){document.location.href='../repair_report.php'};</script>";
}
?>