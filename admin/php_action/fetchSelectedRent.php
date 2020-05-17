<?php

require_once 'core.php';

$categoriesId = $_POST['categoriesId'];

$sql = "SELECT rent.user_id, rent.product_code, rent.rent_status, rent.rent_etc,
                product.product_style, users_personal.fullname, product.product_image_64,rent.rent_id,
                rent.rent_report_date,rent_detail.rent_date,rent_detail.return_datefix,rent_detail.return_date FROM rent
                INNER JOIN product ON rent.product_code = product.product_code
                INNER JOIN users_personal ON rent.user_id = users_personal.user_id
                INNER JOIN rent_detail ON rent.rent_report_date = rent_detail.rent_report_date
                WHERE rent.rent_id = $categoriesId";

$result = $connect->query($sql);


if ($result->num_rows > 0) {
    $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);
