<?php 	

$localhost = "10.199.66.227";
$username = "20S3_g5";
$password = "MxYu3Zik";
$dbname = "20s3_g5";

// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
$connect->set_charset("utf8");
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>