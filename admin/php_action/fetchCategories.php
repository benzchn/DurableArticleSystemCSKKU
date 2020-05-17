<?php 	

require_once 'core.php';

$sql = "SELECT categories_id, categories_code, categories_name, categories_status FROM categories WHERE categories_status = 1";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 while($row = $result->fetch_array()) {
 	$categoriesId = $row[0];
	 $nameCat = $row[2];
	$categoriesCode = $row[1];
 	$CategoriesName = '<a href="categoriesSub.php?code='.$categoriesCode.'"><label style="Font-weight:normal;font-size:15px;">'.$nameCat.'</label></a>';

	 $button = '<!-- Single button -->
	 <div class="btn-group" role="group">
	 <button type="button" class="btn btn-warning" data-toggle="modal" id="editCategoriesModalBtn" data-target="#editCategoriesModal" onclick="editCategories('.$categoriesId.')"> <i class="glyphicon glyphicon-edit"></i> แก้ไข</button>
	 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeCategoriesModal" id="removeCategoriesModalBtn" onclick="removeCategories('.$categoriesId.')"> <i class="glyphicon glyphicon-trash"></i> ลบ</button>
	
	</div>
	';

 	$output['data'][] = array( 		
		$row[1],
		$CategoriesName, 	
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);