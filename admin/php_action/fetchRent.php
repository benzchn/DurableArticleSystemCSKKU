<?php

require_once 'core.php';

$sql = "SELECT rent.user_id, rent.product_code, rent.rent_status, rent.rent_etc,
                product.product_style, users_personal.fullname, product.product_image_64,rent.rent_id,
                DATE_FORMAT(rent.rent_report_date, '%e %M %Y'),DATE_FORMAT(rent_detail.rent_date, '%e %M %Y'),rent_detail.rent_detail FROM rent
                INNER JOIN product ON rent.product_code = product.product_code
                INNER JOIN users_personal ON rent.user_id = users_personal.user_id
                INNER JOIN rent_detail ON rent.rent_report_date = rent_detail.rent_report_date";

$result = $connect->query($sql);

$output = array('data' => array());

if ($result->num_rows > 0) {

    while ($row = $result->fetch_array()) {
        $rentId = $row[7];
        $userId = $row[0];
        $ProductCode = $row[1];
        $fullname = $row[5];
        $rent_detail = $row[10];

        if ($row[2] == 0) {
            $status = "<span style='font-size:11px;font-weight: normal; background:#660000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>แจ้งยืม (รออนุมัติ)</span>";
        } elseif ($row[2] == 1) {
            $status = "<span style='font-size:11px;font-weight: normal; background:#120eeb;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>อนุมัติแล้ว</label>";
        } elseif ($row[2] == 2) {
            $status = "<span style='font-size:11px;font-weight: normal; background:#d940ff;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ไม่อนุมัติ</label>";
        } elseif ($row[2] == 3) {
            $status = "<span style='font-size:11px;font-weight: normal; background:#06d628;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>กำลังยืม</label>";
        } elseif ($row[2] == 4) {
            $status = "<span style='font-size:11px;font-weight: normal; background:#ff0000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ส่งคืนแล้ว</label>";
        } elseif ($row[2] == 5) {
            $status = "<span style='font-size:11px;font-weight: normal; background:#ff6ff0;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ยกเลิกการยืม</label>";
        }

        $button = '<!-- Single button -->
	 <div class="btn-group" role="group">
	 <button type="button" class="btn btn-warning" data-toggle="modal" id="editCategoriesModalBtn" data-target="#editCategoriesModal" onclick="editCategories(' . $rentId . ')"> <i class="glyphicon glyphicon-edit"></i> แก้ไข</button>
	 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeCategoriesModal" id="removeCategoriesModalBtn" onclick="removeCategories(' . $rentId . ')"> <i class="glyphicon glyphicon-trash"></i> ลบ</button>
	
	</div>
	';

        $output['data'][] = array(
            $row[1],
            $row[4],
            $fullname,
            $rent_detail,
            $status,
            $button
        );
    } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);
