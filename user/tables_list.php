<?php require_once 'include/header.php'; ?>

<section role="main" class="content-body">
    <!-- <section role="main" class="content-body"> -->
    <header class="page-header">
        <h2>ครุภัณฑ์</h2>

    </header>
    <!-- end: page -->
    <!-- </section> -->
    <section class="panel">

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> ครุภัณฑ์</div>
                    </div> <!-- /panel-heading -->
                    <div class="panel-body">



                        <table id='myTable' class='table table-hover'>
                            <thead>
                                <tr>
                                    <th id='th_css'>รหัสครุภัณฑ์</th>
                                    <th id='th_css' style='width:10%;'>รูปภาพ</th>
                                    <th id='th_css'>ลักษณะ/ยี่ห้อ</th>
                                    <th id='th_css'>ตำแหน่งที่ตั้ง</th>
                                    <th id='th_css'>สถานะ</th>
                                    <th id='th_css'>หมายเหตุ</th>
                                    <th id='th_css' style='width:15%;'>ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                include_once('php_action/db_connect.php');
                                $sql = "SELECT * FROM product";
                                //use for MySQLi-OOP
                                $query = $conn->query($sql);
                                $active = "";
                                while ($row = $query->fetch_assoc()) {

                                    // active
                                    if ($row['active'] == 1) {
                                        $active = "<label class='label label-success'>ว่าง</label>";
                                    } elseif ($row['active'] == 2) {
                                        $active = "<label class='label label-danger'>ไม่ว่าง</label>";
                                    } elseif ($row['active'] == 3) {
                                        $active = "<label class='label label-warning'>ซ่อม/รอซ่อม</label>";
                                    } elseif ($row['active'] == 4) {
                                        $active = "<label class='label label-default'>ชำรุด</label>";
                                    } elseif ($row['active'] == 5) {
                                        $active = "<label class='label label-default'>บริจาค</label>";
                                    } elseif ($row['active'] == 6) {
                                        $active = "<label class='label label-default'>รอบริจาค</label>";
                                    } elseif ($row['active'] == 7) {
                                        $active = "<label class='label label-default'>ขายทอดตลาด</label>";
                                    } elseif ($row['active'] == 8) {
                                        $active = "<label class='label label-default'>โอนย้าย</label>";
                                    } // /else

                                    if ($_SESSION['role'] == 3 && $row['status'] == 1 && $row['role_product_id'] == 2) {
                                        if ($row['active'] == 1 || $row['active'] == 2) {
                                            echo
                                                "
                            
                                <tr>
                                <td id='td_css'>" . $row['product_code'] . "</td>
                                <td id='td_css'><img class='img-round' src='" . $row['product_image_64'] . "' style='height:40px; width:40px;'  /></td>
									
									<td id='td_css'>" . $row['product_style'] . "</td>
									<td id='td_css'>" . $row['product_location'] . "</td>
                                    <td id='td_css'>" . $active . "</td>
                                    <td id='td_css'>" . $row['product_etc'] . "</td>
                                    <td id='td_css'>
                                    <div class='btn-group' role='group'>
                                    <button type='button' class='btn btn-success' data-toggle='modal' id='' data-target='#rentModal_" . $row['product_id'] . "'>ยืม</button>
                                    <button type='button' class='btn btn-dark' data-toggle='modal' id='' data-target='#Modal'>ข้อมูลเพิ่มเติม</button>
	                                </div>
                                    </td>
								</tr>";
                                        }
                                        // else{
                                        //     echo 
                                        //     "

                                        //     <tr>
                                        //     <td id='td_css'>".$row['product_code']."</td>
                                        //     <td id='td_css'><img class='img-round' src='".$row['product_image_64']."' style='height:40px; width:40px;'  /></td>

                                        //         <td id='td_css'>".$row['product_style']."</td>
                                        //         <td id='td_css'>".$row['product_location']."</td>
                                        //         <td id='td_css'>".$active."</td>
                                        //         <td id='td_css'>".$row['product_etc']."</td>
                                        //         <td id='td_css'>
                                        //         <div class='btn-group' role='group'>
                                        //         <button type='button' class='btn btn-success disabled' data-toggle='modal' id='' data-target='#Modal'>ยืม</button>
                                        //         <button type='button' class='btn btn-dark' data-toggle='modal' id='' data-target='#Modal'>ข้อมูลเพิ่มเติม</button>
                                        //         </div>
                                        //         </td>
                                        //     </tr>";	
                                        // }
                                    }

                                    if ($_SESSION['role'] == 2 && $row['status'] == 1) {

                                        if ($row['active'] == 1) {
                                            echo
                                                "
                                <tr>
                                <td id='td_css'>" . $row['product_code'] . "</td>
                                <td id='td_css'><img class='img-round' src='" . $row['product_image_64'] . "' style='height:40px; width:40px;'  /></td>
									
									<td id='td_css'>" . $row['product_style'] . "</td>
									<td id='td_css'>" . $row['product_location'] . "</td>
                                    <td id='td_css'>" . $active . "</td>
                                    <td id='td_css'>" . $row['product_etc'] . "</td>
                                    <td id='td_css'>
                                    <div class='btn-group' role='group'>
                                    <button type='button' class='btn btn-success' data-toggle='modal' id='' data-target='#rentModal_" . $row['product_id'] . "'>ยืม</button>
                                    <button type='button' class='btn btn-dark' data-toggle='modal' id='' data-target='#Modal'>ข้อมูลเพิ่มเติม</button>
	                                </div>
                                    </td>
								</tr>";
                                        } else {
                                            echo
                                                "
                                    <tr>
                                    <td id='td_css'>" . $row['product_code'] . "</td>
                                    <td id='td_css'><img class='img-round' src='" . $row['product_image_64'] . "' style='height:40px; width:40px;'  /></td>
                                        
                                        <td id='td_css'>" . $row['product_style'] . "</td>
                                        <td id='td_css'>" . $row['product_location'] . "</td>
                                        <td id='td_css'>" . $active . "</td>
                                        <td id='td_css'>" . $row['product_etc'] . "</td>
                                        <td id='td_css'>
                                        <div class='btn-group' role='group'>
                                        <button type='button' class='btn btn-success disabled' data-toggle='modal' id='' data-target='#Modal'>ยืม</button>
                                        <button type='button' class='btn btn-dark' data-toggle='modal' id='' data-target='#Modal'>ข้อมูลเพิ่มเติม</button>
                                        </div>
                                        </td>
                                    </tr>";
                                        }
                                    }

                                ?>

                                    <div class='modal fade' id='rentModal_<?= $row['product_id'] ?>' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                        <div class='modal-dialog modal-dialog-centered' role='document'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='exampleModalCenterTitle' style="color:black;">ยืนยันการยืมครุภัณฑ์</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                <div class='modal-body'>
                                                    <div>
                                                        <label style="color:black;font-size:15px;">คุณแน่ใจว่าจะยืมครุภัณฑ์ (</label>&nbsp;<label class='label label-warning' style="font-size:15px;"><?= $row['product_code'] ?>&nbsp;/&nbsp;<?= $row['product_style'] ?></label>&nbsp;<label style="color:black;font-size:15px;">) ?</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <form action="php_action/insert_rent.php" method="post">
                                                            <label for="rent_detail" style="color:black;font-size:15px;">วัตถุประสงค์ในการยืม</label>
                                                            <input type="text" class="form-control" id="rent_detail" name="rent_detail" required>
                                                            <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['user_name'] ?>" />
                                                            <input type="hidden" id="product_code" name="product_code" value="<?= $row['product_code'] ?>" />
                                                    </div>
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>ยกเลิก</button>
                                                    <button type='submit' class='btn btn-primary'>ยืนยัน</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                <?php
                                }

                                ?>
                            </tbody>
                        </table>

                    </div> <!-- /panel-body -->
                </div> <!-- /panel -->
            </div> <!-- /col-md-12 -->
        </div> <!-- /row -->

    </section>




    <aside id="sidebar-right" class="sidebar-right">
        <div class="nano">
            <div class="nano-content">
                <a href="#" class="mobile-close visible-xs">
                    Collapse <i class="fa fa-chevron-right"></i>
                </a>

                <div class="sidebar-right-wrapper">

                    <div class="sidebar-widget widget-calendar">
                        <h6>Upcoming Tasks</h6>
                        <div data-plugin-datepicker data-plugin-skin="dark"></div>

                    </div>
                </div>
            </div>
        </div>
    </aside>
</section>
<?php require_once 'include/footer.php'; ?>