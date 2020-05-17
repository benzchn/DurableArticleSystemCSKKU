<?php

//insert.php

// $localhost = "10.199.66.227";
// $username = "20S3_g5";
// $password = "MxYu3Zik";
// $dbname = "20s3_g5";


// $connect = new mysqli($localhost, $username, $password, $dbname);

// $connect->set_charset("utf8");
// if($connect->connect_error) {
//   die("Connection Failed : " . $connect->connect_error);
// } else {
 
// }
// $title = $_POST['title'];
// $start = $_POST['start'];
// $end = $_POST['end'];

// echo $start;
// if(isset($_POST["title"]))
// {
//     $query = "INSERT INTO events (title, start_event, end_event) VALUES ('$title', $start, $end)";
//     $statement = $connect->query($sql);


$connect = new PDO('mysql:host=10.199.66.227;dbname=20s3_g5', '20S3_g5', 'MxYu3Zik');
$connect->exec("set names utf8");
if(isset($_POST["title"]))
{

 $query = "
 INSERT INTO events 
 (title, start_event, end_event) 
 VALUES (:title, :start_event, :end_event)
 ";

 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
}


?>