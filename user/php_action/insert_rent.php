<?php

require_once 'core.php';

$productCode = $_POST['product_code'];
$userName = $_POST['user_id'];
$rent_detail = $_POST['rent_detail'];

$sql = "INSERT INTO rent(user_id,product_code,rent_status,rent_etc,rent_report_date) VALUES ('$userName','$productCode',0,'',NOW())";

if ($connect->query($sql) === TRUE) {
    //  echo "<script>if(confirm('ทำการยืมแล้ว !!')){document.location.href='../rent_my.php'};</script>";
?>

    <body onload="document.form1.submit();">
        <form name="form1" action="insert_rent_detail.php" method="post">
            <input type="hidden" name="product_code" value="<?= $productCode ?>">
            <input type="hidden" name="user_id" value="<?= $userName ?>">
            <input type="hidden" name="rent_detail" value="<?= $rent_detail ?>">
        </form>
    </body>
<?php
}
?>