<?php

require_once 'core.php';

$StdId = $_POST['StdId'];

$sql = "SELECT user_id,user_id, password, fullname, col_year, degree, phone, email, department,id FROM users_personal WHERE id = '$StdId'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);
