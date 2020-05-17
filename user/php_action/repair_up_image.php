<?php 
    if(isset($_POST['submit'])){ 
        // Include the database configuration file 
        require_once 'core.php';
         
        $productId = $_POST['product_id'];
        $productCode = $_POST['pcode'];
        $repairDetail = $_POST['detail'];
        $etc = $_POST['etc'];
        $who = $_SESSION['fullname'];
        $name = $_SESSION['user_name'];
        
    // $insert = $connect->query("INSERT INTO repair_report_image (repair_id,repair_name_image, repair_image_date) VALUES $insertValuesSQL"); 
                // Count total files
                $targetDir = "../../images/repair/"; 
                $allowTypes = array('jpg','png','jpeg','gif'); 
                 
                $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
                $fileNames = array_filter($_FILES['files']['name']); 
                if(!empty($fileNames)){ 
                    foreach($_FILES['files']['name'] as $key=>$val){ 
                        // File upload path
                        $fileName = explode(".", $_FILES['files']['name'][$key]);
                        // $fileName = basename($_FILES['files']['name'][$key]);
                        $new_name = md5(rand()) . '.' . $fileName[1];
                        $targetFilePath = $targetDir . $new_name;

                        // Check whether file type is valid 
                        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION)); 

                        if(in_array($fileType, $allowTypes)){ 

                        // Convert to base64 
                        $image_base64 = base64_encode(file_get_contents($_FILES['files']['tmp_name'][$key]));
                        $image = 'data:repair_image_64/'.$fileType.';base64,'.$image_base64;

                            // Upload file to server 
                            // if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                                // Image db insert sql 
                                $insertValuesSQL .= "(0,'".$new_name."', '".$image."', NOW(), '".$who."', '".$name."'),"; 
                            // }
                        }
                    } 
                     
                    if(!empty($insertValuesSQL)){ 
                        $insertValuesSQL = trim($insertValuesSQL, ','); 
                        // Insert image file name into database
                        
                        $command = "INSERT INTO repair_report_image (repair_id,repair_name_image, repair_image_64, repair_create_date, repair_who_create, user_name) VALUES $insertValuesSQL";
                        $insert = $connect->query($command); 
                        if($insert){ 
                            if($who != ''){
                            ?>

 <body onload="document.form1.submit();">
     <form name="form1" action="repair_up_text.php" method="post">
         <input type="hidden" name="product_id" value="<?=$productId?>">
         <input type="hidden" name="pcode" value="<?=$productCode?>">
         <input type="hidden" name="detail" value="<?=$repairDetail?>">
         <input type="hidden" name="etc" value="<?=$etc?>">
         <input type="hidden" name="fullname" value="<?=$who?>">
         <input type="hidden" name="name" value="<?=$name?>">
     </form>
 </body>
 <?php }
                        }else{ 
                            $statusMsg = "Sorry, there was an error uploading your file."; 
                        } 
                    } 
                }else{ 
                    $statusMsg = 'Please select a file to upload.'; 
                } 
                 
                // Display status message 
                echo $statusMsg; 
            } 
            ?>