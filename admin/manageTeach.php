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
<div class="modal fade" id="editTeachUserModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form class="form-horizontal" id="editTeachForm" action="php_action/editTeachuser.php" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i>แก้ไขข้อมูลส่วนตัวผู้ใช้งาน</h4>
                </div>
                <div class="modal-body">

                    <div id="edit-Teach-messages"></div>

                    <div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                        <span class="sr-only">Loading...</span>
                    </div>

                    <div class="edit-Teach-result">
                        <div style="padding:30px;">


                            <div class="form-group">
                                <label for="Teachemail">อีเมล *</label>&nbsp;<span class="label label-info" style="font-weight:normal;">(ใช้ @kku.ac.th เท่านั้น)</span>
                                <input type="email" class="form-control" id="Teachemail" name="Teachemail" placeholder="user@kku.ac.th" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="Teachpassword">รหัสผ่าน *</label>&nbsp;<span class="label label-info" style="font-weight:normal;">(กรอกอักษร a-z,A-z และตัวเลข 0-9 จำนวน 6-10
                                    ตัวเท่านั้น)</span>
                                <input type="password" class="form-control" id="Teachpassword" name="Teachpassword" pattern="[A-Za-z0-9]{6,10}" placeholder="Password" autocomplete="off" required>
                                <!-- <small id="emailHelp" class="form-text text-muted">Password incorrect.</small> -->
                            </div>
                            <div class="form-group">
                                <label for="Teachfullname">ชื่อ - นามสกุล *</label>
                                <input type="text" class="form-control" id="Teachfullname" name="Teachfullname" placeholder="Full Name" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="Teachphone">เบอร์โทรศัพท์ *</label>&nbsp;<span class="label label-info" style="font-weight:normal;">(ไม่ต้องใส่ขีด)</span>
                                <input type="text" class="form-control" id="Teachphone" name="Teachphone" placeholder="Phone" autocomplete="off" required OnKeyPress="return chkNumber(this)">
                            </div>
                        </div>
                    </div>
                    <!-- /edit brand result -->

                </div> <!-- /modal-body -->

                <div class="modal-footer editTeachFooter">
                    <button type="button" id="clostEditModal" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> ปิด</button>

                    <button type="submit" class="btn btn-success" id="editTeachBtn" name="editTeachBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i>
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


<script src="custom/js/manageTeachuser.js"></script>

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