<?php 	

require_once 'core.php';

    $productId = $_POST['product_id'];
    $productCode = $_POST['pcode'];
    $repairDetail = $_POST['detail'];
    $repairEtc = $_POST['etc'];
    $whoCreate = $_POST['fullname'];
    $User_name = $_POST['name'];

// echo $productId."/".$productCode."/".$repairDetail."/".$repairEtc."/".$whoCreate."/".$User_name;

	$sql = "INSERT INTO repair_report (product_id, product_code, repair_detail, repair_etc, repair_create_date, repair_modified_date, repair_who_create, user_name, repair_active, repair_status) 
    VALUES ('$productId', '$productCode', '$repairDetail', '$repairEtc', NOW(),NOW(), '$whoCreate', '$User_name',1,1)";

	if($connect->query($sql) === TRUE) {

        $sql1 = "SELECT repair_id,repair_create_date FROM repair_report WHERE repair_who_create = '$whoCreate' AND user_name = '$User_name' ORDER BY repair_id DESC";
        $query1 = $connect->query($sql1);

        $sql2 = "SELECT repair_create_date FROM repair_report_image WHERE repair_who_create = '$whoCreate' AND user_name = '$User_name'ORDER BY repair_id DESC";
        $query2 = $connect->query($sql2);

        $row1Size = mysqli_num_rows($query1); 
        $row2Size = mysqli_num_rows($query2);


        while($row1 = $query1->fetch_assoc()){
            $timeCreate = $row1['repair_create_date'];
            $repairId = $row1['repair_id'];
            while($row2 = $query2->fetch_assoc()){

                if($row1['repair_create_date'] == $row2['repair_create_date']){
                    $sql3 = "UPDATE repair_report_image SET repair_id = $repairId WHERE repair_who_create = '$whoCreate' AND repair_create_date = '$timeCreate'";
                    $query3 = $connect->query($sql3);
                }
            }
        }
        
         echo "<script>if(confirm('แจ้งการซ่อมแล้ว !!')){document.location.href='../repair_follow.php'};</script>";
       
	} else {
        echo "<script>if(confirm('แจ้งซ่อมไม่สำเร็จ !!')){document.location.href='../repair_follow.php'};</script>";
	}
?>