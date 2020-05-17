<?php require_once 'include/header.php'; ?>

<section role="main" class="content-body">
    <!-- <section role="main" class="content-body"> -->
    <header class="page-header">
        <h2>แจ้งซ่อม</h2>
    </header>
    <!-- end: page -->
    <!-- </section> -->
    <section class="panel">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <!-- <div class="panel-heading">
                        <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> รายละเอียดการซ่อม </div>
                    </div> -->
                    <!-- <div class="panel-body"> -->


                    <form class="well form-horizontal" action="php_action/repair_up_image.php" method="post"
                        id="contact_form" enctype="multipart/form-data" form="form1">
                        <fieldset>

                            <!-- Form Name -->
                            <legend>รายละเอียดการซ่อม</legend>

                            <!-- Select Basic -->

                            <div class="form-group">
                                <label class="col-md-4 control-label">พัสดุ</label>
                                <div class="col-md-4 selectContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <img src='https://image.flaticon.com/icons/svg/745/745437.svg' width="21px"
                                                height="21px">
                                        </span>



                                        <?php
							include_once('php_action/db_connect.php');
							$sql = "SELECT * FROM product";
							//use for MySQLi-OOP
                            $query = $conn->query($sql);

                            echo '<select id="select-testing" class="form-control selectpicker"
                                            data-live-search="true" title="เลือกพัสดุ" id="pname" name="product_id"
                                            onchange="document.location=\'repair_report.php?pid=\'+this.value">';

							while($row = $query->fetch_assoc()){
                                if($row['status'] == 1 && $row['role_product_id'] == 2 && $_SESSION['role'] == 3){
                                    echo '<option value="'.$row['product_id'].'"';

                                    if(isset($_GET['pid']) && $_GET['pid'] == $row['product_id'])
                                            echo 'selected="selected"';
                                    echo '>';
                                    echo $row['product_style'];
                                    echo '</option>';	
                                }
                                if($row['status'] == 1 && $_SESSION['role'] == 2){
								
                                    echo '<option value="'.$row['product_id'].'"';

                                    if(isset($_GET['pid']) && $_GET['pid'] == $row['product_id'])
                                            echo 'selected="selected"';
                                    echo '>';
                                    echo $row['product_style'];
                                    echo '</option>';	
                                }
                            }
                                
                                        echo '</select>';
                                        
                                        ?>
                                    </div>
                                    <label style="color:#60e160;padding-left:20px;">ค้นหาพัสดุโดย
                                        ชื่อพัสดุ/ยี่ห้อ</label>
                                </div>
                            </div>

                            <!-- Text input-->

                            <div class="form-group">
                                <label class="col-md-4 control-label">หมายเลขพัสดุ/เลขทะเบียน</label>
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <img src='https://image.flaticon.com/icons/svg/2627/2627843.svg'
                                                width="21px" height="21px">
                                        </span>
                                        <?php
                                    if(isset($_GET['pid']) && is_numeric($_GET['pid'])) {
                                        $sql = 'SELECT product_code FROM product 
                                        WHERE product_id = '.$_GET["pid"].' ';

                                    $query = $conn->query($sql);
                                    $row = $query->fetch_assoc();
                                    }
                                    ?>
                                        <input name="pcode" id="pcode" value="<?=$row['product_code']?>"
                                            class="form-control" type="text">
                                    </div>

                                </div>
                            </div>

                            <!-- Text area -->

                            <div class="form-group">
                                <label class="col-md-4 control-label">รายละเอียดการซ่อม/ปัญหา</label>
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <img src='https://image.flaticon.com/icons/svg/1102/1102457.svg'
                                                width="21px" height="21px">
                                        </span>
                                        <textarea class="form-control" name="detail" id="detail" placeholder="" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Text input-->

                            <div class="form-group">
                                <label class="col-md-4 control-label">หมายเหตุ</label>
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <img src='https://image.flaticon.com/icons/svg/2615/2615067.svg'
                                                width="21px" height="21px">
                                        </span>
                                        <input name="etc" id="etc" placeholder="" class="form-control" type="text" required>

                                    </div>
                                    <label
                                        style="color:#60e160;padding-left:20px;">คำอธิบายหรือหมายเหตุเพิ่มเติม (สถานที่/เลขห้อง)</label>
                                </div>
                            </div>


                            <!-- Text input-->

                            <div class="form-group">
                                <label class="col-md-4 control-label">เพิ่มไฟล์ภาพ</label>
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <img src='https://image.flaticon.com/icons/svg/685/685686.svg' width="21px"
                                                height="21px">
                                        </span>
                                        <input name="files[]" class="form-control" type="file" multiple>
                                    </div>

                                    <label style="color:#60e160;padding-left:20px;">เลือกรูปภาพอัปโหลด
                                        (สามารถเลือกได้หลายไฟล์)</label>
                                </div>
                            </div>

                            <!-- Button -->
                            <!-- <input type="hidden" name="whoCreate" value="<?=$_SESSION['fullname']?>">
                            <input type="hidden" name="name" value="<?=$_SESSION['user_name']?>"> -->
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" name="submit" class="btn btn-warning">บันทึก <span
                                            class="glyphicon glyphicon-save"></span></button>
                                </div>
                            </div>

                        </fieldset>
                    </form>


                    <!-- </div> -->
                    <!-- /panel-body -->
                </div>
                <!-- /panel -->
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


<script>
$(document).ready(function() {
    $('#pname').change(function() {
        $.POST("my-ajax-call-code.php", {
                pid: $("#pname").val()
            },
            function(data) {
                $('input[name="pcode"]').val(data.description);
            }, "json");
    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('.selectpicker').selectpicker();

    $('#framework').change(function() {
        $('#hidden_framework').val($('#framework').val());
    });

    $('#multiple_select_form').on('submit', function(event) {
        event.preventDefault();
        if ($('#framework').val() != '') {
            var form_data = $(this).serialize();
            $.ajax({
                url: "insert.php",
                method: "POST",
                data: form_data,
                success: function(data) {
                    //console.log(data);
                    $('#hidden_framework').val('');
                    $('.selectpicker').selectpicker('val', '');
                    alert(data);
                }
            })
        } else {
            alert("Please select framework");
            return false;
        }
    });
});
</script>

<?php require_once 'include/footer.php'; ?>