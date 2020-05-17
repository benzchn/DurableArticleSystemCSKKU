<!-- Modal -->
<div class="modal fade" id="showRepairDetail_<?php echo $row[8]; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">รายละเอียดการซ่อม</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="well form-horizontal">
                    <fieldset>
                        <legend>รายละเอียดของ ผู้แจ้งซ่อม</legend>
                        <div>
                            <span><i class='glyphicon glyphicon-user'></i> &nbsp; ชื่อ - นามสกุล :
                                <?=$fullname?></span>
                        </div>
                        <div>
                            <span><i class='glyphicon glyphicon-earphone'></i> &nbsp; โทรศัพท์ :
                                <?=$phone?></span>
                        </div>
                    </fieldset>

                </div>

                <div class="well form-horizontal">
                    <fieldset>
                        <legend>รายละเอียดการซ่อม</legend>
                        <div>
                            <span><i class='glyphicon glyphicon-user'></i> &nbsp; พัสดุ :
                                <?=$productName?></span>
                        </div>
                        <div>
                            <span><i class='glyphicon glyphicon-earphone'></i> &nbsp; หมายเลขพัสดุ/เลขทะเบียน :
                                <?=$productCode?></span>
                        </div>
                        <div>
                            <span><i class='glyphicon glyphicon-earphone'></i> &nbsp; วันที่แจ้ง :
                                <?=$DateCreate?></span>
                        </div>
                        <div>
                            <span><i class='glyphicon glyphicon-earphone'></i> &nbsp; รายละเอียดการซ่อม/ปัญหา :
                                <?=$detail?></span>
                        </div>
                        <div>
                            <span><i class='glyphicon glyphicon-earphone'></i> &nbsp; หมายเหตุ :
                                <?=$etc?></span>
                        </div>


                </fieldset>

            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
    </div>
</div>
</div>