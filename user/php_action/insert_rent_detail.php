<?php

require_once 'core.php';

$productCode = $_POST['product_code'];
$userName = $_POST['user_id'];
$rent_detail = $_POST['rent_detail'];

$sql = "INSERT INTO rent_detail(rent_id,product_code,rent_detail,rent_report_date,rent_date,return_datefix,return_date) VALUES (0,'$productCode','$rent_detail',NOW(),NOW(),NOW(),NOW())";

if ($connect->query($sql) === TRUE) {
    //  echo "<script>if(confirm('ทำการยืมแล้ว !!')){document.location.href='../rent_my.php'};</script>";

    $sql1 = "SELECT * FROM rent WHERE user_id = '$userName' AND product_code = '$productCode' ORDER BY rent_id DESC";
    $query1 = $connect->query($sql1);

    $sql2 = "SELECT * FROM rent_detail WHERE product_code = '$productCode' ORDER BY rent_detail_id DESC";
    $query2 = $connect->query($sql2);


    while ($row1 = $query1->fetch_assoc()) {
        $rentID = $row1['rent_id'];
        $rentReportDate = $row1['rent_report_date'];


        while ($row2 = $query2->fetch_assoc()) {
            if ($row1['product_code'] == $row2['product_code'] && $row1['rent_report_date'] == $row2['rent_report_date']) {
                $sql3 = "UPDATE rent_detail SET rent_id = '$rentID' WHERE product_code = '$productCode' AND rent_report_date = '$rentReportDate' ";
                $query3 = $connect->query($sql3);
            }
        }
    }
    echo "<script>if(confirm('แจ้งยืมแล้ว !!')){document.location.href='../rent_my.php'};</script>";
} else {
    echo "<script>if(confirm('แจ้งยืมไม่สำเร็จ !!')){document.location.href='../tables_list.php'};</script>";
}
