<?php require_once 'include/header.php'; ?>

<section role="main" class="content-body">
    <!-- <section role="main" class="content-body"> -->
    <header class="page-header">
        <h2>รายการครุภัณฑ์ที่ยืม</h2>
    </header>
    <!-- end: page -->
    <!-- </section> -->
    <section class="panel">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="well form-horizontal">
                        <fieldset>
                            <legend>รายการครุภัณฑ์ที่ยืม</legend>

                            <table id="myTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <!-- <th id="th_css">ลำดับ</th> -->
                                        <th id="th_css">ชื่อผู้ยืม</th>
                                        <th id="th_css">รูปภาพ</th>
                                        <th id="th_css">รหัสครุภัณฑ์</th>
                                        <th id="th_css">ลักษณะ/ยี่ห้อ</th>
                                        <th id="th_css">สถานะการยืม</th>
                                        <th id="th_css">วัตถุประสงค์</th>
                                        <th id="th_css">หมายเหตุ</th>
                                        <th id="th_css">ตัวเลือก</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php
                                    include_once('php_action/db_connect.php');

                                    $sql = "SELECT rent.user_id, rent.product_code, rent.rent_status, rent.rent_etc,
                                            product.product_style, users_personal.fullname, product.product_image_64,rent.rent_id,
                                            DATE_FORMAT(rent.rent_report_date, '%e %M %Y'),DATE_FORMAT(rent_detail.rent_date, '%e %M %Y'),
                                            DATE_FORMAT(rent_detail.return_datefix, '%e %M %Y'),DATE_FORMAT(rent_detail.return_date, '%e %M %Y'),rent_detail.rent_detail FROM rent
                                            INNER JOIN product ON rent.product_code = product.product_code
                                            INNER JOIN users_personal ON rent.user_id = users_personal.user_id
                                            INNER JOIN rent_detail ON rent.rent_report_date = rent_detail.rent_report_date
                                            WHERE rent.user_id = '$session_username'";
                                    $result = $connect->query($sql);

                                    if ($result->num_rows > 0) {
                                        $status = "";
                                        while ($row = $result->fetch_array()) {
                                            $userID = $row[0];
                                            $productCode = $row[1];
                                            $productStyle = $row[4];
                                            $Fullname = $row[5];
                                            $Photo = $row[6];
                                            $Etc = $row[3];
                                            $rentID = $row[7];
                                            $rentReportDate = $row[8];
                                            $rentDate = $row[9];
                                            $returnDatefix = $row[10];
                                            $returnDate = $row[11];
                                            $rent_detail = $row[12];

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

                                            if ($row[2] == 0) {
                                                echo
                                                    "<tr>
                                    <td id='td_css'>" . $Fullname . "</td>
                                    <td id='td_css'><img src='" . $Photo . "' style='height:40px; width:40px;'/></td>
									<td id='td_css'>" . $productCode . "</td>
									<td id='td_css'>" . $productStyle . "</td>
                                    <td id='td_css'>" . $status . "</td>
                                    <td id='td_css'>" . $rent_detail . "</td>
                                    <td id='td_css'>" . $Etc . "</td>
                                    <td id='td_css'>
                                            <a href='php_action/removeRent.php?rentId=" . $rentID . "' class='btn btn-danger' title='ยกเลิก' name='actionRentCancel' data-toggle='modal' >
                                            <i class='glyphicon glyphicon-remove-circle' title='ยกเลิก'></i></a>
                                            <a href='#showRentDetail_" . $rentID . "' class='btn btn-info' title='รายละเอียด' name='actionRepairFollow' data-toggle='modal' >
                                            <i class='glyphicon glyphicon-list-alt' title='รายละเอียด'></i></a>
                                    </td>
                                </tr>";
                                            } else {
                                                echo
                                                    "<tr>
                                    <td id='td_css'>" . $Fullname . "</td>
                                    <td id='td_css'><img src='" . $Photo . "' style='height:40px; width:40px;'/></td>
									<td id='td_css'>" . $productCode . "</td>
									<td id='td_css'>" . $productStyle . "</td>
                                    <td id='td_css'>" . $status . "</td>
                                    <td id='td_css'>" . $rent_detail . "</td>
                                    <td id='td_css'>" . $Etc . "</td>
                                    <td id='td_css'>
                                            <a href='php_action/removeRent.php?rentId=" . $rentID . "' class='btn btn-danger disabled' title='ยกเลิกไม่ได้' name='actionRentCancel' data-toggle='modal' >
                                            <i class='glyphicon glyphicon-remove-circle' title='ยกเลิกไม่ได้'></i></a>
                                            <a href='#showRentDetail_" . $rentID . "' class='btn btn-info' title='รายละเอียด' name='actionRepairFollow' data-toggle='modal' >
                                            <i class='glyphicon glyphicon-list-alt' title='รายละเอียด'></i></a>
                                    </td>
                                </tr>";
                                            }

                                    ?>
                                            <!-- Modal -->
                                            <div class='modal fade' id='showRentDetail_<?= $rentID ?>' tabindex='-1' role='dialog' aria-labelledby='exampleModalScrollableTitle' aria-hidden='true'>
                                                <div class='modal-dialog modal-dialog-scrollable' role='document'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h5 class='modal-title' id='exampleModalScrollableTitle'>
                                                                รายละเอียดการยืม</h5>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class='modal-body'>

                                                            <div class='well form-horizontal'>
                                                                <fieldset>
                                                                    <legend>รายละเอียดการยืม</legend>
                                                                    <div>
                                                                        <span style='color:black;font-size:14px;font-weight:bold;'> &nbsp;
                                                                            ชื่อผู้ยืม :</span>
                                                                        <span style='color:black;font-size:14px;'><?= $Fullname ?></span>
                                                                    </div>
                                                                    <div>
                                                                        <span style='color:black;font-size:14px;font-weight:bold;'> &nbsp;
                                                                            รหัสครุภัณฑ์ :</span>
                                                                        <span style='color:black;font-size:14px;'><?= $productCode ?></span>
                                                                    </div>
                                                                    <div>
                                                                        <span style='color:black;font-size:14px;font-weight:bold;'> &nbsp;
                                                                            ลักษณะ/ยี่ห้อ :</span>
                                                                        <span style='color:black;font-size:14px;'><?= $productStyle ?></span>
                                                                    </div>
                                                                    <div>
                                                                        <span style='color:black;font-size:14px;font-weight:bold;'> &nbsp;
                                                                            วันที่แจ้งยืม :</span>
                                                                        <span style='color:black;font-size:14px;'><?= $rentReportDate ?></span>
                                                                    </div>
                                                                    <div style='margin-bottom:20px;'>
                                                                        <span style='color:black;font-size:14px;font-weight:bold;'><i class='glyphicon glyphicon-exclamation-sign'></i>
                                                                            &nbsp; สถานะการยืม :</span>
                                                                        <span style='color:black;font-size:14px;'><?= $status ?></span>
                                                                    </div>
                                                                    <div>
                                                                        <span style='color:black;font-size:14px;font-weight:bold;'> &nbsp;
                                                                            หมายเหตุ :</span>
                                                                        <span style='color:black;font-size:14px;'><?= $Etc ?></span>
                                                                    </div>
                                                                    <div>
                                                                        <span style='color:black;font-size:14px;font-weight:bold;'> &nbsp;
                                                                            วันที่ยืม :</span>
                                                                        <span style='font-size:14px;' class="badge badge-warning"><?= $rentDate ?></span>
                                                                    </div>
                                                                    <div>
                                                                        <span style='color:black;font-size:14px;font-weight:bold;'> &nbsp;
                                                                            วันที่กำหนดส่งคืน :</span>
                                                                        <span style='font-size:14px;' class="badge badge-danger"><?= $returnDatefix ?></span>
                                                                    </div>

                                                                </fieldset>
                                                            </div>

                                                            <div class='modal-footer'>
                                                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>ปิด</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        <?php

                                        }
                                    }
                                        ?>



                                </tbody>
                            </table>
                        </fieldset>

                    </div>
                </div> <!-- /col-md-12 -->
            </div> <!-- /row -->
        </div>
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