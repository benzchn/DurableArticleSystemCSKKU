<?php 	

require_once 'core.php';

$categoriesSubId = $_POST['categoriesId'];

$sql = "SELECT * FROM categories_sublist WHERE sublist_id = $categoriesSubId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();

} // if num_rows

$connect->close();

echo json_encode($row);