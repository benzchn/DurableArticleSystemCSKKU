<?php require_once 'includes/header.php'; ?>


<?php
    if(!empty($_GET['code'])){

        $cateCode = $_GET['code'];
        $_SESSION['catecode'] = $cateCode;
            $sql = "SELECT * FROM categories WHERE categories_code = '$cateCode'";
            $query = $connect->query($sql);
            $rowCategories = $query->fetch_array();
            // while($rowCategories = $query->fetch_array()){ }
            $cateName = $rowCategories['categories_name'];
        $_SESSION['catename'] = $cateName;
    }
?>



<div class="row">
    <div class="col-md-12">

        <ol class="breadcrumb">
            <li><a href="categories.php">คลัง</a></li>
            <li class="active"><?= $cateName; ?></li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading">
                <!-- <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> จัดการ <?= $cateName;?></div> -->
                <h3 style="text-align:center;"><?= $cateName; ?></h3>
            </div>
            <!-- /panel-heading -->
            <div class="panel-body">
                <div class="remove-messages"></div>

                <div class="div-action pull pull-right" style="padding-bottom:20px;">
                    <button class="btn btn-success button1" data-toggle="modal" id="addCategoriesModalBtn"
                        data-target="#addCategoriesModal"> <i class="glyphicon glyphicon-plus-sign"></i>
                        เพิ่มรายการใหม่ </button>
                </div> <!-- /div-action -->

                <table class="table" id="manageCategoriesSubTable">
                    <thead>
                        <tr>
                            <th>รายการ</th>
                            <th>ราคา/หน่วย</th>
                            <th>วิธีการได้มา</th>
                            <th>ปีงบประมาณ</th>
                            <th style="width:15%;">ตัวเลือก</th>
                        </tr>
                    </thead>
                </table>
                <!-- /table -->

            </div> <!-- /panel-body -->
        </div> <!-- /panel -->
    </div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add categories -->
<div class="modal fade" id="addCategoriesModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form class="form-horizontal" id="submitCategoriesForm" action="php_action/createCategoriesSub.php"
                method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> เพิ่มรายการของ<?= $cateName;?></h4>
                </div>
                <div class="modal-body">

                    <div id="add-categories-messages"></div>

                    <div class="form-group">
                        <label for="categoriesName" class="col-sm-4 control-label">ชื่อรายการ </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="categoriesName" placeholder="ชื่อรายการ"
                                name="categoriesName" autocomplete="off">
                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="priceSub" class="col-sm-4 control-label">ราคา/หน่วย </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="priceSub" placeholder="ราคาต่อหน่วย"
                                name="priceSub" autocomplete="off">
                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="getSub" class="col-sm-4 control-label">วิธีการได้มา </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="getSub" placeholder="เช่น สอบราคา" name="getSub"
                                autocomplete="off">
                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="fiscalYear" class="col-sm-3 control-label">ปีงบประมาณ </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                            <select class="form-control" id="fiscalYear" name="fiscalYear">
                                <option value="">~~เลือก~~</option>
                                <?php for($i=2500;$i<=2600;$i++){ ?>
                                <option value="<?=$i;?>"><?=$i;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div> <!-- /form-group-->

                </div> <!-- /modal-body -->
                <input type="hidden" value="<?=$cateCode;?>" name="categoriesCode" />
                <div class="modal-footer">
                    <button type="button" id="clostAddCate" class="btn btn-default" data-dismiss="modal"> <i
                            class="glyphicon glyphicon-remove-sign"></i> ปิด</button>

                    <button type="submit" class="btn btn-primary" id="createCategoriesBtn"
                        data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i>
                        บันทึก</button>
                </div> <!-- /modal-footer -->
            </form> <!-- /.form -->
        </div> <!-- /modal-content -->
    </div> <!-- /modal-dailog -->
</div>
<!-- /add categories -->


<!-- edit categories brand -->
<div class="modal fade" id="editCategoriesModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form class="form-horizontal" id="editCategoriesForm" action="php_action/editCategoriesSub.php"
                method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i>แก้ไขรายการ</h4>
                </div>
                <div class="modal-body">

                    <div id="edit-categories-messages"></div>

                    <div class="modal-loading div-hide"
                        style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                        <span class="sr-only">Loading...</span>
                    </div>

                    <div class="edit-categories-result">

                        <div class="form-group">
                            <label for="editCategoriesName" class="col-sm-4 control-label">ชื่อรายการ</label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="editCategoriesName" placeholder="ชื่อรายการ"
                                    name="editCategoriesName" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="editpriceSub" class="col-sm-4 control-label">ราคา/หน่วย </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="editpriceSub" placeholder="ราคาต่อหน่วย"
                                name="editpriceSub" autocomplete="off">
                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="editgetSub" class="col-sm-4 control-label">วิธีการได้มา </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="editgetSub" placeholder="เช่น สอบราคา"
                                name="editgetSub" autocomplete="off">
                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="editfiscalYear" class="col-sm-3 control-label">ปีงบประมาณ </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                            <select class="form-control" id="editfiscalYear" name="editfiscalYear">
                                <option value="">~~เลือก~~</option>
                            <?php for($i=2500;$i<=2600;$i++){ ?>
                                <option value="<?=$i;?>"><?=$i;?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div> <!-- /form-group-->

                    </div>
                    <!-- /edit brand result -->

                </div> <!-- /modal-body -->

                <div class="modal-footer editCategoriesFooter">
                    <button type="button" id="clostEditModal" class="btn btn-default" data-dismiss="modal"> <i
                            class="glyphicon glyphicon-remove-sign"></i> ปิด</button>

                    <button type="submit" class="btn btn-success" id="editCategoriesBtn" data-loading-text="Loading..."
                        autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> บันทึก</button>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> ลบรายการ</h4>
            </div>
            <div class="modal-body">
                <p>คุณแน่ใจว่าจะลบ ?</p>
            </div>
            <div class="modal-footer removeCategoriesFooter">
                <button type="button" class="btn btn-default" data-dismiss="modal"> <i
                        class="glyphicon glyphicon-remove-sign"></i> ปิด</button>
                <button type="button" class="btn btn-primary" id="removeCategoriesBtn" data-loading-text="Loading...">
                    <i class="glyphicon glyphicon-ok-sign"></i> ยืนยัน</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->

<script src="custom/js/categoriesSub.js"></script>

<?php require_once 'includes/footer.php'; ?>