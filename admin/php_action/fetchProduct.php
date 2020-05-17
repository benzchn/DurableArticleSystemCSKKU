<?php 	

require_once 'core.php';

$sublistcode = $_SESSION['sublistId'];

$sql = "SELECT product.product_id, product.product_code, product.product_image_64, 
 		product.product_style, product.product_location, product.role_product_id, product.active, product.status, 
 		role_product.role_product_id, role_product.role_product_title, product.product_etc,product.product_image FROM product 
		INNER JOIN role_product ON product.role_product_id = role_product.role_product_id  
		WHERE product.status = 1 AND sublist_id = $sublistcode";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) {

 // $row = $result->fetch_array();
 $active = "";

 while($row = $result->fetch_array()) {
	$productId = $row[0];
	$productImage64 = $row[2];
 	// active
 	if($row[6] == 1) {
 		// activate member
 		$active = "<label class='label label-success'>ว่าง</label>";
 	} elseif ($row[6] == 2) {
 		// deactivate member
 		$active = "<label class='label label-danger'>ไม่ว่าง</label>";
 	} elseif ($row[6] == 3) {
		// deactivate member
		$active = "<label class='label label-warning'>ซ่อม/รอซ่อม</label>";
	} elseif ($row[6] == 4) {
		// deactivate member
		$active = "<label class='label label-default'>ชำรุด</label>";
	} elseif ($row[6] == 5) {
		// deactivate member
		$active = "<label class='label label-default'>บริจาค</label>";
	} elseif ($row[6] == 6) {
		// deactivate member
		$active = "<label class='label label-default'>รอบริจาค</label>";
	} elseif ($row[6] == 7) {
		// deactivate member
		$active = "<label class='label label-default'>ขายทอดตลาด</label>";
	} elseif ($row[6] == 8) {
		// deactivate member
		$active = "<label class='label label-default'>โอนย้าย</label>";
	} // /else

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" id="actionProduct" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    แก้ไข/ลบ <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editProductModalBtn" data-target="#editProductModal" onclick="editProduct('.$productId.')"> <i class="glyphicon glyphicon-edit"></i> แก้ไข</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeProductModal" id="removeProductModalBtn" onclick="removeProduct('.$productId.')"> <i class="glyphicon glyphicon-trash"></i> ลบ</a></li>       
	  </ul>
	</div>';

	// $imageUrl = substr($row[11], 3);
	// $productImage = "<img class='img-round' src='../".$imageUrl."' style='height:50px; width:50px;'  />";
	$productImage = "<img class='img-round' src='".$productImage64."' style='height:50px; width:50px;'  />";


 	$output['data'][] = array(
		$row[1],
 		$productImage,
 		$row[3], 
 		$row[9],	 	
		$row[4],
		$active,
		$row[10],
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);