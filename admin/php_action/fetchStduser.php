<?php 	

require_once 'core.php';

$sql = "SELECT user_id, fullname, role_id, id FROM users_personal WHERE role_id = 3 AND user_status = 1";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

	$roleStatus = "";
 while($row = $result->fetch_array()) {
	 $userId = $row[0];
	 $number = $row[3];
	$role = $row[2];
	
		$button = '<!-- Single button -->
	 <div class="btn-group" role="group">
	 <button type="button" class="btn btn-warning" data-toggle="modal" id="editStdUserModalBtn" data-target="#editStdUserModal" onclick="editStudent('.$number.')"> <i class="glyphicon glyphicon-edit"></i> แก้ไข</button>
	 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeCategoriesModal" id="removeCategoriesModalBtn" onclick="removeCategories('.$number.')"> <i class="glyphicon glyphicon-remove"></i> ปิดใช้งาน</button>
	
    </div>';
    
	$roleStatus = "<label class='label label-success'>นักศึกษา</label>";

 	$output['data'][] = array( 		
		$row[0],
		$row[1],
		$roleStatus,	
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);