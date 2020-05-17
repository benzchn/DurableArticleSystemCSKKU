<?php

//delete.php

if(isset($_POST["id"]))
{
$connect = new PDO('mysql:host=10.199.66.227;dbname=20s3_g5', '20S3_g5', 'MxYu3Zik');
 $query = "
 DELETE from events WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>