<?php require_once 'includes/header.php'; ?>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">

                <h3 style="text-align:center;">จัดการบัญชีผู้ใช้</h3>
            </div>


            <div class="panel-body">
                <div class="remove-messages"></div>


                <table class="table" id="manageCategoriesTable">
                    <thead>
                        <tr>
                            <th style="width:20%;">ชื่อผู้ใช้งาน</th>
                            <th>ชื่อ - สกุล</th>
                            <th>สิทธิ์การใช้งาน</th>
                            <th style="width:30%;">ตัวเลือก</th>
                        </tr>
                    </thead>
                </table>
                <!-- /table -->

            </div> <!-- /panel-body -->
        </div> <!-- /panel -->
    </div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- edit categories brand -->
<div class="modal fade" id="editStdUserModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form class="form-horizontal" id="editStdForm" action="php_action/editStduser.php" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i>แก้ไขข้อมูลส่วนตัวผู้ใช้งาน</h4>
                </div>
                <div class="modal-body">

                    <div id="edit-Std-messages"></div>

                    <div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                        <span class="sr-only">Loading...</span>
                    </div>

                    <div class="edit-Std-result">
                        <div style="padding:30px;">

                            <div class="form-group">
                                <label for="userid">รหัสนักศึกษา *</label>&nbsp;<span class="label label-info" style="font-weight:normal;">(ตัวอย่าง:
                                    60302xxxx-x *ใส่ขีดด้วย*)</span>
                                <!-- <input type="text" name="userid" id="userid" class="form-control" autocomplete="off" required> -->
                                <input type="text" class="form-control" id="userid" name="userid" required OnInput="add_hyphen()" placeholder="60302xxxx-x" maxlength="11" OnKeyPress="return chkNumber(this)" autocomplete="off" pattern="[0-9]{8,8}.[-].[0-9]{0,0}">
                            </div>
                            <!-- <div class="form-group">
                                <label for="Stdpassword">รหัสผ่าน *</label>&nbsp;<span class="label label-info" style="font-weight:normal;">(กรอกอักษร a-z,A-z และตัวเลข 0-9 จำนวน 6-10
                                    ตัวเท่านั้น)</span> -->
                            <input type="hidden" class="form-control" id="Stdpassword" name="Stdpassword" pattern="[A-Za-z0-9]{6,10}" placeholder="Password" autocomplete="off" required>
                            <!-- <small id="emailHelp" class="form-text text-muted">Password incorrect.</small>
                            </div> -->
                            <div class="form-group">
                                <label for="Stdfullname">ชื่อ - นามสกุล *</label>
                                <input type="text" class="form-control" id="Stdfullname" name="Stdfullname" placeholder="Full Name" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="Stdemail">อีเมล *</label>&nbsp;<span class="label label-info" style="font-weight:normal;">(ใช้ @kkumail.com เท่านั้น)</span>
                                <input type="email" class="form-control" id="Stdemail" name="Stdemail" placeholder="user@kkumail.com" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="Stdphone">เบอร์โทรศัพท์ *</label>&nbsp;<span class="label label-info" style="font-weight:normal;">(ไม่ต้องใส่ขีด)</span>
                                <input type="text" class="form-control" id="Stdphone" name="Stdphone" placeholder="Phone" autocomplete="off" required OnKeyPress="return chkNumber(this)">
                                <!-- <small id="emailHelp" class="form-text text-muted">Password incorrect.</small> -->
                            </div>


                            <div class="form-group">
                                <div class="form-group col-md-4">
                                    <label for="inputCity">ระดับปริญญา *</label>
                                    <select name="degree" id="degree" class="form-control" required>
                                        <option value="" disabled="disabled" selected>..กรุณาเลือก..
                                        </option>
                                        <option value="1">ปริญญาตรี</option>
                                        <option value="2">ปริญญาโท</option>
                                        <option value="3">ปริญญาเอก</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="department">หลักสูตร *</label>
                                    <select name="department" id="department" class="form-control" required>
                                        <option value="" disabled="disabled" selected>..กรุณาเลือก..
                                        </option>
                                        <option value="1">วิทยาการคอมพิวเตอร์</option>
                                        <option value="2">เทคโนยีสารสนเทศ</option>
                                        <option value="3">ภูมิศาสตร์สารสนเทศ</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="col_year">&nbsp;</label>
                                    <input type="text" class="form-control" id="col_year" name="col_year" placeholder="ชั้นปีที่" required autocomplete="off" maxlength="1" OnKeyPress="return chkNumber1(this)">
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /edit brand result -->

                </div> <!-- /modal-body -->

                <div class="modal-footer editStdFooter">
                    <button type="button" id="clostEditModal" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> ปิด</button>

                    <button type="submit" class="btn btn-success" id="editStdBtn" name="editStdBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i>
                        บันทึก</button>
                </div>
                <!-- /modal-footer -->
            </form>
            <!-- /.form -->
        </div>
        <!-- /modal-content -->
    </div>
    <!-- /modal-dailog -->
</div>
<!-- /categories brand -->



<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeCategoriesModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> ลบประเภทครุภัณฑ์</h4>
            </div>
            <div class="modal-body">
                <p>คุณแน่ใจว่าจะลบ ?</p>
            </div>
            <div class="modal-footer removeCategoriesFooter">
                <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> ปิด</button>
                <button type="button" class="btn btn-primary" id="removeCategoriesBtn" data-loading-text="Loading...">
                    <i class="glyphicon glyphicon-ok-sign"></i> ยืนยัน</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->


<script src="custom/js/manageStduser.js"></script>

<script language="JavaScript">
    function add_hyphen() {
        var input = document.getElementById("user_id");
        var str = input.value;
        str = str.replace("-", "");
        if (str.length > 9) {
            str = str.substring(0, 9) + "-" + str.substring(9);
        }
        input.value = str
    }

    function chkNumber(ele) {
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar < '0' || vchar > '9') && (vchar != '.')) return false;
        ele.onKeyPress = vchar;
    }

    function chkNumber1(ele) {
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar < '1' || vchar > '4') && (vchar != '.')) return false;
        ele.onKeyPress = vchar;
    }
</script>

<?php require_once 'includes/footer.php'; ?>