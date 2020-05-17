<?php
if (!isset($_SESSION)) {
    session_start();
}
require 'config/dbconnect.php';
date_default_timezone_set("Asia/Manila");
$date = date("Y-m-d");
$date_time = date("Y-m-d h:i:s");

$usernameErr = $passwordErr = $current_passwordErr = $new_passwordErr = $repeat_passwordErr = $edit_item_idErr = $item_nameErr = $item_categoryErr = $item_descriptionErr = $item_critical_lvlErr = $quantityErr = $uomErr = $received_by = "";
$username = $txtpassword  = $current_password  = $new_password  = $repeat_password  = $edit_item_id  = $item_name  = $item_category  = $item_description  = $item_critical_lvl  = $quantity = $received_by = $remarks = "";

function clean($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = clean($_POST["username"]);
    }

    if (empty($_POST["password"])) {
        $passwordErr = "password is required";
    } else {
        $txtpassword = clean($_POST["password"]);
    }

    if (empty($_POST["current_password"])) {
        $current_passwordErr = "Current password is required";
    } else {
        $current_password = clean($_POST["current_password"]);
    }

    if (empty($_POST["new_password"])) {
        $new_passwordErr = "New password is required";
    } else {
        $new_password = clean($_POST["new_password"]);
    }

    if (empty($_POST["repeat_password"])) {
        $repeat_passwordErr = "password is required";
    } else {
        $repeat_password = clean($_POST["repeat_password"]);
    }
}


//Login Query
if (isset($_POST['login'])) {

    $password = md5($txtpassword);

    $sql = "SELECT * FROM users_personal WHERE user_id='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            if ($row['password'] == $password) {

                if ($row['user_status'] == 1) {

                    $_SESSION['user_name'] = $row['user_id'];
                    $_SESSION['role'] = $row['role_id'];
                    $_SESSION['fullname'] = $row['fullname'];

                    if (isset($_SESSION['user_name'])) {
                        if ($_SESSION['role'] == 1) {
                            header("location:admin/dashboard.php");
                        } else {
                            header("location:user/index.php");
                        }
                    }
                } else {
                    echo "<script>if(confirm('ยังไม่ได้รับอนุมัติให้เข้าใช้งาน โปรดติดต่อเจ้าหน้าที่ !')){document.location.href='login.php'};</script>";
                }
            } else {
                $passwordErr = '<div class="alert alert-warning">
                        <strong>Login!</strong> Failed.
                        </div>';
                echo "<script>if(confirm('ไม่พบผู้ใช้งาน หรือรหัสผ่านผิดพลาด กรุณาลองใหม่อีกครั้ง !')){document.location.href='login.php'};</script>";
                // $username = $row['username'];
            }
        }
    } else {
        $usernameErr = '<div class="alert alert-danger">
  <strong>Username</strong> Not Found.
</div>';
        $username = "";
    }
}
