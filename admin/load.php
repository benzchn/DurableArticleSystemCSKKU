<?php

//load.php


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

// $connect = new PDO('mysql:host=10.199.66.227;dbname=20s3_g5', '20S3_g5', 'MxYu3Zik');

$data = array();

$query = "SELECT * FROM events ORDER BY id";
$result = $connect->query($query);

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {



// $statement = $connect->prepare($query);

// $statement->execute();

// $result = $statement->fetchAll();

// foreach($result as $row)
// {
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}
}

echo json_encode($data);

?>