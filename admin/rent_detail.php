<?php require_once 'includes/header.php'; ?>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">

                <h3 style="text-align:center;">รายการยืม</h3>
            </div>
            <div class="panel-body">


                <table class="table" id="manageCategoriesTable">
                    <thead>
                        <tr>
                            <th>รหัสครุภัณฑ์</th>
                            <th>ลักษณะ/ยี่ห้อ</th>
                            <th>ชื่อผู้ยืม</th>
                            <th>วัตถุประสงค์</th>
                            <th>สถานะการยืม</th>
                            <th style="width:20%;">ตัวเลือก</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div> <!-- /panel-body -->
    </div> <!-- /panel -->
</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<!-- edit categories brand -->
<div class="modal fade" id="editCategoriesModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form class="form-horizontal" id="editCategoriesForm" action="php_action/editRent.php" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i>จัดการรายการยืม</h4>
                </div>
                <div class="modal-body">

                    <div id="edit-categories-messages"></div>

                    <div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                        <span class="sr-only">Loading...</span>
                    </div>

                    <div class="edit-categories-result">

                        <div class="form-group">
                            <label for="editProductCode" class="col-sm-3 control-label">รหัสครุภัณฑ์</label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="editProductCode" placeholder="รหัสครุภัณฑ์" name="editProductCode" autocomplete="off" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="editUser" class="col-sm-3 control-label"> ชื่อผู้ยืม</label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="editUser" placeholder="ชื่อผู้ยืม" name="editUser" autocomplete="off" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <div style="display: flex;justify-content: center;align-items: center;">
                                ---------------------------------------------------
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="RentStatus" class="col-sm-3 control-label">สถานะการยืม</label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-7">
                                <select class="form-control" id="RentStatus" name="RentStatus">
                                    <option value="">~~เลือก~~</option>
                                    <option value="0">แจ้งยืม (รออนุมัติ)</option>
                                    <option value="1">อนุมัติแล้ว</option>
                                    <option value="2">ไม่อนุมัติ</option>
                                    <option value="3">กำลังยืม</option>
                                    <option value="4">ส่งคืนแล้ว</option>
                                    <option value="5">ยกเลิกการยืม</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="RentEtc" class="col-sm-3 control-label"> หมายเหตุ</label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="RentEtc" placeholder="รายละเอียดเพิ่มเติม.." name="RentEtc" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="RentDate" class="col-sm-3 control-label"> วันที่ยืม</label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" id="RentDate" placeholder="วันที่ยืม" name="RentDate" autocomplete="off">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="ReturnDateFix" class="col-sm-3 control-label"> วันที่กำหนดคืน</label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" id="ReturnDateFix" placeholder="วันที่กำหนดคืน" name="ReturnDateFix" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ReturnDate" class="col-sm-3 control-label"> วันที่ผู้ยืมคืน</label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" id="ReturnDate" placeholder="วันที่ผู้ยืมคืน" name="ReturnDate" autocomplete="off">
                            </div>
                        </div>

                    </div>
                    <!-- /edit brand result -->

                </div> <!-- /modal-body -->

                <div class="modal-footer editCategoriesFooter">
                    <button type="button" id="clostEditModal" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> ปิด</button>

                    <button type="submit" class="btn btn-success" id="editCategoriesBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> บันทึก</button>
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


<script src="custom/js/rent.js"></script>


<?php require_once 'includes/footer.php'; ?>