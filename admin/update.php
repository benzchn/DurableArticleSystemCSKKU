<?php

//update.php

$connect = new PDO('mysql:host=10.199.66.227;dbname=20s3_g5', '20S3_g5', 'MxYu3Zik');
$connect->exec("set names utf8");
if(isset($_POST["id"]))
{
 $query = "
 UPDATE events 
 SET title=:title, start_event=:start_event, end_event=:end_event 
 WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':id'   => $_POST['id']
  )
 );
}

?>