<?php
include("core.php");

    $sql = mysql_query("SELECT product_code 
                        FROM product 
                        WHERE product_id ='" . mysql_real_escape_string($_POST['pid']) . "'");
    $row = mysql_fetch_assoc($sql);

    echo json_encode("pcode" => $row['product_code']);
?>