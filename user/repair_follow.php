<?php require_once 'include/header.php'; ?>

<section role="main" class="content-body">
    <!-- <section role="main" class="content-body"> -->
    <header class="page-header">
        <h2>ติดตามการแจ้งซ่อมของฉัน</h2>
    </header>
    <!-- end: page -->
    <!-- </section> -->
    <section class="panel">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="well form-horizontal">
                        <fieldset>
                            <legend>ติดตามการแจ้งซ่อมของฉัน</legend>

                            <table id="myTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th id="th_css">พัสดุ</th>
                                        <th id="th_css">วันที่แจ้ง</th>
                                        <th id="th_css">ผู้ปฏิบัติงาน</th>
                                        <th id="th_css">สถานะการซ่อม</th>
                                        <th id="th_css">ตัวเลือก</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                            include_once('php_action/db_connect.php');
                            
                            $sql1 = "SELECT  * FROM users_personal WHERE user_id = '$session_username'";
                            $result1 = $connect->query($sql1);
                            $row1 = $result1->fetch_array();
                            $fullname = $row1['fullname'];
                            $phone = $row1['phone'];

							$sql = "SELECT  product.product_id, product.product_style,
                                            DATE_FORMAT(repair_report.repair_create_date, '%e %M %Y'), repair_report.product_id, repair_report.repair_status, 
                                            repair_report.repair_id,repair_report.product_code,repair_report.repair_detail,repair_report.repair_etc
                                            FROM repair_report
                                            INNER JOIN product ON product.product_id = repair_report.product_id
                                            WHERE repair_report.user_name = '$session_username'";
							//use for MySQLi-OOP
                            $result = $connect->query($sql);

                            if($result->num_rows > 0) {
                                $status = "";
							while($row = $result->fetch_array()){
                                $productName = $row[1];
                                $DateCreate = $row[2];
                                $productCode = $row[6];
                                $detail = $row[7];
                                $etc = $row[8];
                                $_SESSION['repairId'] = $row[5];

                                if($row[4] == 1) {
                                    $status = "<span style='font-size:11px;font-weight: normal; background:#660000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>แจ้งซ่อม</span>";
                                } elseif ($row[4] == 2) {
                                    $status = "<span style='font-size:11px;font-weight: normal; background:#120eeb;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>กำลังดำเนินการ</label>";
                                } elseif ($row[4] == 3) {
                                   $status = "<span style='font-size:11px;font-weight: normal; background:#d940ff;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>รออะไหล่</label>";
                               } elseif ($row[4] == 4) {
                                   $status = "<span style='font-size:11px;font-weight: normal; background:#06d628;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ซ่อมสำเร็จ</label>";
                               } elseif ($row[4] == 5) {
                                    $status = "<span style='font-size:11px;font-weight: normal; background:#ff0000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ซ่อมไม่สำเร็จ</label>";
                                } elseif ($row[4] == 6) {
                                    $status = "<span style='font-size:11px;font-weight: normal; background:#ff6ff0;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ยกเลิกการซ่อม</label>";
                                } elseif ($row[4] == 7) {
                                    $status = "<span style='font-size:11px;font-weight: normal; background:#000000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ส่งมอบเรียบร้อย</label>";
                                }

									echo 
								"<tr>
									<td id='td_css'>".$productName."</td>
									<td id='td_css'>".$DateCreate."</td>
									<td id='td_css'>".$Operater."</td>
                                    <td id='td_css'>".$status."</td>
                                    <td id='td_css'>
                                            <a href='#showRepairDetail_".$row[5]."' class='btn btn-info' title='รายละเอียด' name='actionRepairFollow' data-toggle='modal' >
                                            <i class='glyphicon glyphicon-list-alt' title='รายละเอียด'></i></a>
                                    </td>
                                </tr>";	

                                $repairId = $row[5];

                                if($repairId != 0){
                                echo "
                                <!-- Modal -->
                                <div class='modal fade' id='showRepairDetail_$repairId' tabindex='-1' role='dialog'
                                    aria-labelledby='exampleModalScrollableTitle' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-scrollable' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalScrollableTitle'>รายละเอียดการซ่อม</h5>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>
                                            <div class='modal-body'>
                                
                                                <div class='well form-horizontal'>
                                                    <fieldset>
                                                        <legend>รายละเอียดของ ผู้แจ้งซ่อม</legend>
                                                        <div>
                                                                <span style='color:black;font-size:14px;font-weight:bold;'><i class='glyphicon glyphicon-user'></i> &nbsp; ชื่อ - นามสกุล :</span>
                                                                <span style='color:black;font-size:14px;'>$fullname</span>
                                                        </div>
                                                        <div>
                                                            <span style='color:black;font-size:14px;font-weight:bold;'><i class='glyphicon glyphicon-earphone'></i> &nbsp; โทรศัพท์ :</span>
                                                            <span style='color:black;font-size:14px;'>$phone</span>
                                                        </div>
                                                    </fieldset>
                                
                                                </div>
                                
                                                <div class='well form-horizontal'>
                                                    <fieldset>
                                                        <legend>รายละเอียดการซ่อม</legend>
                                                        <div>
                                                            <span style='color:black;font-size:14px;font-weight:bold;'><i class='glyphicon glyphicon-wrench'></i> &nbsp; ลักษณะ/ยี่ห้อ :</span>
                                                            <span style='color:black;font-size:14px;'>$productName</span>
                                                        </div>
                                                        <div>
                                                            <span style='color:black;font-size:14px;font-weight:bold;'><i class='glyphicon glyphicon-euro'></i> &nbsp; รหัสครุภัณฑ์/เลขทะเบียน :</span>
                                                            <span style='color:black;font-size:14px;'>$productCode</span>
                                                        </div>
                                                        <div>
                                                            <span style='color:black;font-size:14px;font-weight:bold;'><i class='glyphicon glyphicon-calendar'></i> &nbsp; วันที่แจ้ง :</span>
                                                            <span style='color:black;font-size:14px;'>$DateCreate</span>
                                                        </div>
                                                        <div>
                                                            <span style='color:black;font-size:14px;font-weight:bold;'><i class='glyphicon glyphicon-list'></i> &nbsp; รายละเอียดการซ่อม/ปัญหา :</span>
                                                            <span style='color:black;font-size:14px;'>$detail</span>
                                                        </div>
                                                        <div style='margin-bottom:20px;'>
                                                            <span style='color:black;font-size:14px;font-weight:bold;'><i class='glyphicon glyphicon-exclamation-sign'></i> &nbsp; หมายเหตุ :</span>
                                                            <span style='color:black;font-size:14px;'>$etc</span>
                                                        </div>
                                                        
                                    ";
                                    
                                    $sql2 = "SELECT * FROM repair_report_image WHERE repair_id = '$repairId'";
                                    $result2 = $connect->query($sql2);
                                    while($row2 = $result2->fetch_assoc()){
                                    echo " <img src='".$row2['repair_image_64']."' width='150px'> ";
                                }
                                    echo "
                                                    </fieldset>
                                                </div>
                                                <div class='well form-horizontal'>
                                                    <fieldset>
                                                        <legend>ประวัติการทำรายการ</legend>
                                                        ";
                                    echo "
                                                        <div class='row'>
                                                        <div style='background:#000000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;' class='column'>ผู้ปฏิบัติงาน</div>
                                                        <div style='background:#000000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;' class='column'>สถานะการซ่อม</div>
                                                        <div style='background:#000000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;' class='column'>วันที่ทำรายการ</div>
                                                        <div style='background:#000000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;' class='column'>หมายเหตุ</div>
                                                        </div>";


                                    $sql3 = "SELECT status_repiar.repair_id, status_repiar.status, 
                                                    status_repiar.role_id, status_repiar.comment, 
                                                    DATE_FORMAT(status_repiar.create_date, '%e %M %Y %T')
                                                    FROM status_repiar
                                                    WHERE repair_id = '$repairId'" ;

$result3 = $connect->query($sql3);

if($result3->num_rows > 0) {
    $status3 = "";
while($row3 = $result3->fetch_array()){

    $comment = $row3[3];
    $dateStat = $row3[4];
    

    if($row3[2] == 0){
        $Operater3 = '&nbsp;';
    }else{
        $Operater3 = "เจ้าหน้าที่";
    }

    if($row3[1] == 1) {
        $status3 = "<span style='font-size:11px;font-weight: normal; background:#660000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>แจ้งซ่อม</span>";
    } elseif ($row3[1] == 2) {
        $status3 = "<span style='font-size:11px;font-weight: normal; background:#120eeb;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>กำลังดำเนินการ</label>";
    } elseif ($row3[1] == 3) {
       $status3 = "<span style='font-size:11px;font-weight: normal; background:#d940ff;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>รออะไหล่</label>";
   } elseif ($row3[1] == 4) {
       $status3 = "<span style='font-size:11px;font-weight: normal; background:#06d628;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ซ่อมสำเร็จ</label>";
   } elseif ($row3[1] == 5) {
        $status3 = "<span style='font-size:11px;font-weight: normal; background:#ff0000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ซ่อมไม่สำเร็จ</label>";
    } elseif ($row3[1] == 6) {
        $status3 = "<span style='font-size:11px;font-weight: normal; background:#ff6ff0;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ยกเลิกการซ่อม</label>";
    } elseif ($row3[1] == 7) {
        $status3 = "<span style='font-size:11px;font-weight: normal; background:#000000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ส่งมอบเรียบร้อย</label>";
    }

                                                        echo "
                                                        <div style='color:black;font-size:14px;' class='row'>
                                                        <div style='color:black;font-size:14px;' class='column'>".$Operater3."</div>
                                                        <div style='color:black;font-size:14px;' class='column'>".$status3."</div>
                                                        <div style='color:black;font-size:14px;' class='column'>".$dateStat."</div>
                                                        <div style='color:black;font-size:14px;' class='column'>".$comment."</div>
                                                        </div>";
  
}
}
                                                  echo "</fieldset>
                                                </div>
                                    
                                                    ";
            

                                        
                                    echo " 
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>ปิด</button>
                                            <!-- <button type='button' class='btn btn-primary'>Save changes</button> -->
                                        </div>
                                    </div>
                                </div>
                                </div>";

                            }

                            } //while loop
                        }
                         // if
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