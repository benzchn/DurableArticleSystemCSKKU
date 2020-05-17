<?php 	

require_once 'core.php';

	$cateCode = $_SESSION['catecode'];

$sql = "SELECT sublist_id, sublist_title, categories_code, FORMAT(sublist_priceperunit, 2),sublist_get,sublist_fiscalyear, sublist_status FROM categories_sublist WHERE sublist_status = 1 AND categories_code = '$cateCode'";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 while($row = $result->fetch_array()) {
	$sublistId = $row[0];
	$sublistTitle = $row[1];
	$categoriesCode = $row[2];
	// $price = $row[3];
	// $get = $row[4];
	// $fiscalYear = $row[5];


 	$sublistName = '<a href="product.php?subcode='.$sublistId.'"><label style="Font-weight:normal;font-size:15px;">'.$sublistTitle.'</label></a>';

	 $button = '<!-- Single button -->
	 <div class="btn-group" role="group">
	 <button type="button" class="btn btn-warning" data-toggle="modal" id="editCategoriesModalBtn" data-target="#editCategoriesModal" onclick="editCategories('.$sublistId.')"> <i class="glyphicon glyphicon-edit"></i> แก้ไข</button>
	 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeCategoriesModal" id="removeCategoriesModalBtn" onclick="removeCategories('.$sublistId.')"> <i class="glyphicon glyphicon-trash"></i> ลบ</button>
	</div>
	';

 	$output['data'][] = array(
		$sublistName,
		 $row[3],
		$row[4],
		$row[5],
 		$button		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);
