<?php 	

require_once 'core.php';


if(isset($_POST['btnTeachSubmit'])){
    $passwordOld = $_POST['passwordOld'];
    $passwordNew = $_POST['passwordNew'];
    $passwordNewAgain = $_POST['passwordNewAgain'];

    $userId = $_SESSION['user_name'];

if($passwordNew == $passwordNewAgain){

    // $sql = "SELECT user_id, password FROM users_personal WHERE user_id = '$userId'";
    // if($connect->query($sql) === TRUE) {
        
                $sql1 = "UPDATE users_personal SET password = '$passwordNew' WHERE user_id = '$userId'";

                if($connect->query($sql1) === TRUE) {
                    echo "<script>if(confirm('เปลี่ยนรหัสผ่านเรียบร้อย !!')){document.location.href='../changepassword.php'};</script>";
            }
// }else {
//     echo "<script>if(confirm('รหัสผ่านเก่าไม่ถูกต้อง !!')){document.location.href='../changepassword.php'};</script>";
// }
}else {
    echo "<script>if(confirm('กรุณากรอกรหัสผ่านใหม่ ให้เหมือนกัน !!')){document.location.href='../changepassword.php'};</script>";
}
}else{
    $passwordOld = $_POST['passwordOld'];
    $passwordNew = $_POST['passwordNew'];
    $passwordNewAgain = $_POST['passwordNewAgain'];

    $userId = $_SESSION['user_name'];

    if($passwordNew == $passwordNewAgain){


    //     $sql = "SELECT * FROM users_personal WHERE user_id='$userId'";
    // if($connect->query($sql) === TRUE) {

                $sql1 = "UPDATE users_personal SET password = '$passwordNew' WHERE user_id = '$userId'";

                if($connect->query($sql1) === TRUE) {
                    echo "<script>if(confirm('เปลี่ยนรหัสผ่านเรียบร้อย !!')){document.location.href='../changepassword.php'};</script>";
            }
// }else {
//     echo "<script>if(confirm('รหัสผ่านเก่าไม่ถูกต้อง !!')){document.location.href='../changepassword.php'};</script>";
// }
}else {
    echo "<script>if(confirm('กรุณากรอกรหัสผ่านใหม่ ให้เหมือนกัน !!')){document.location.href='../changepassword.php'};</script>";
}
}




?>