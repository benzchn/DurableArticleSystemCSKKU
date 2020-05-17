<?php 	

require_once 'core.php';


if(isset($_POST['btnTeachSubmit'])){
    $fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$userId = $_SESSION['user_name'];
$sql = "UPDATE users_personal SET fullname = '$fullname', phone = '$phone' WHERE user_id = '$userId'";
if($connect->query($sql) === TRUE) {
    echo "<script>if(confirm('อัพเดทสำเร็จ !!')){document.location.href='../editprofile.php'};</script>";
}else {
    echo "<script>if(confirm('อัพเดทไม่สำเร็จ !!')){document.location.href='../editprofile.php'};</script>";
}
}else{

    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $colYear = $_POST['col_year'];
    $userId = $_SESSION['user_name'];
    $sql = "UPDATE users_personal SET fullname = '$fullname', phone = '$phone', email = '$email', col_year = '$colYear' WHERE user_id = '$userId'";
    if($connect->query($sql) === TRUE) {
        echo "<script>if(confirm('อัพเดทสำเร็จ !!')){document.location.href='../editprofile.php'};</script>";
    }else {
        echo "<script>if(confirm('อัพเดทไม่สำเร็จ !!')){document.location.href='../editprofile.php'};</script>";
    }
    
}

?>