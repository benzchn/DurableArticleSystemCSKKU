<?php 	

require_once 'core.php';

$productId = $_GET['i'];

$sql = "SELECT product_image_64 FROM product WHERE product_id = {$productId}";
$data = $connect->query($sql);
$result = $data->fetch_row();

$connect->close();

echo $result[0];
