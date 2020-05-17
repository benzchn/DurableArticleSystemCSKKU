<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>


<?php
    if(!empty($_GET['subcode'])){
        $cateCode = $_SESSION['catecode'];
        $cateName = $_SESSION['catename'];
        $subCode = $_GET['subcode'];
        $_SESSION['subcode'] = $subCode;
            $sql = "SELECT * FROM categories_sublist WHERE sublist_id = '$subCode'";
            $query = $connect->query($sql);
            $rowSubCategories = $query->fetch_array();
            $subTitle = $rowSubCategories['sublist_title'];
            $_SESSION['sublistId'] = $rowSubCategories['sublist_id'];
    }
    $connect->close();
?>



<div class="row">
    <div class="col-md-12">

        <ol class="breadcrumb">
            <li><a href="categories.php">คลัง</a></li>
            <li><a href="categoriesSub.php?code=<?=$cateCode;?>"><?=$cateName;?></a></li>
            <li class="active"><?= $subTitle; ?></li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 style="text-align:center;"><?= $subTitle; ?></h3>
            </div>
            <!-- /panel-heading -->

            <div class="panel-body">

                <div class="remove-messages"></div>

                <div class="div-action pull pull-right" style="padding-bottom:20px;">
                    <button class="btn btn-success button1" data-toggle="modal" id="addProductModalBtn"
                        data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i> เพิ่มครุภัณฑ์ใหม่
                    </button>
                </div>
                <!-- /div-action -->

                <table class="table" id="manageProductTable">
                    <thead>
                        <tr>
                            <th>รหัสครุภัณฑ์</th>
                            <th style="width:10%;">รูปภาพ</th>
                            <th>ลักษณะ/ยี่ห้อ</th>
                            <th>สิทธิการยืม</th>
                            <th>ตำแหน่งที่ตั้ง</th>
                            <th>สถานะ</th>
                            <th>หมายเหตุ</th>
                            <th style="width:15%;">ตัวเลือก</th>
                        </tr>
                    </thead>
                </table>
                <!-- /table -->
            </div> <!-- /panel-body -->
        </div> <!-- /panel -->
    </div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form class="form-horizontal" id="submitProductForm" action="createProduct.php" method="POST"
                enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> เพิ่มรูปภาพ</h4>
                </div>

                <div class="modal-body" style="max-height:450px; overflow:auto;">

                    <div id="add-product-messages"></div>

                    <div class="form-group">
                        <label for="productImage" class="col-sm-3 control-label">รูปครุภัณฑ์: </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                            <!-- the avatar markup -->
                            <div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>
                            <div class="kv-avatar center-block">
                                <input type="file" class="form-control" id="productImage" placeholder="รูปครุภัณฑ์"
                                    name="productImage" class="file-loading" style="width:auto;" />
                            </div>

                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="productCode" class="col-sm-3 control-label">รหัสครุภัณฑ์: </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="productCode" placeholder="รหัสครุภัณฑ์"
                                name="productCode" autocomplete="off">
                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="productStyle" class="col-sm-3 control-label">ลักษณะ/ยี่ห้อ: </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="productStyle" placeholder="ตัวอย่าง Acer YX250"
                                name="productStyle" autocomplete="off">
                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="productLocation" class="col-sm-3 control-label">ตำแหน่งที่ตั้ง: </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="productLocation"
                                placeholder="เช่น 6602C, นักศึกษายืมไป" name="productLocation" autocomplete="off">
                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="productRole" class="col-sm-3 control-label">สิทธิการยืม: </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                            <select class="form-control" id="productRole" name="productRole">
                                <option value="">~~เลือก~~</option>
                                <option value="1">ผู้ดูแลระบบ/บุคลากร/อาจารย์</option>
                                <option value="2">ทุกคน</option>
                            </select>
                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="productStatus" class="col-sm-3 control-label">สถานะ: </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                            <select class="form-control" id="productStatus" name="productStatus">
                                <option value="">~~เลือก~~</option>
                                <option value="1">ว่าง</option>
                                <option value="2">ไม่ว่าง</option>
                                <option value="3">ซ่อม/รอซ่อม</option>
                                <option value="4">ชำรุด</option>
                                <option value="5">บริจาค</option>
                                <option value="6">รอบริจาค</option>
                                <option value="7">ขายทอดตลาด</option>
                                <option value="8">โอนย้าย</option>
                            </select>
                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="productEtc" class="col-sm-3 control-label">หมายเหตุ: </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="productEtc"
                                placeholder="เช่น ส่งซ่อมบริษัท Acer, CPU ใช้งานไม่ได้" name="productEtc"
                                autocomplete="off">
                        </div>
                    </div> <!-- /form-group-->

                </div> <!-- /modal-body -->

                <input type="hidden" name="sublistCode" id="sublistCode" value="<?=$subCode;?>">

                <div class="modal-footer">
                    <button type="button" id="clostAddProduct" class="btn btn-default" data-dismiss="modal"> <i
                            class="glyphicon glyphicon-remove-sign"></i> ปิด</button>

                    <button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Loading..."
                        autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> บันทึก</button>
                </div> <!-- /modal-footer -->
            </form> <!-- /.form -->
        </div> <!-- /modal-content -->
    </div> <!-- /modal-dailog -->
</div>
<!-- /add categories -->


<!-- edit categories brand -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไขครุภัณฑ์</h4>
            </div>
            <div class="modal-body" style="max-height:450px; overflow:auto;">

                <div class="div-loading">
                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                    <span class="sr-only">Loading...</span>
                </div>

                <div class="div-result">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#photo" aria-controls="home" role="tab"
                                data-toggle="tab">รูปภาพ</a></li>
                        <li role="presentation"><a href="#productInfo" aria-controls="profile" role="tab"
                                data-toggle="tab">ข้อมูลรูปภาพ</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">


                        <div role="tabpanel" class="tab-pane active" id="photo">
                            <form action="editProductImage.php" method="POST" id="updateProductImageForm"
                                class="form-horizontal" enctype="multipart/form-data">

                                <br />
                                <div id="edit-productPhoto-messages"></div>

                                <div class="form-group">
                                    <label for="editProductImage" class="col-sm-3 control-label">รูปครุภัณฑ์: </label>
                                    <label class="col-sm-1 control-label">: </label>
                                    <div class="col-sm-8">
                                        <img src="" id="getProductImage" class="thumbnail"
                                            style="width:250px; height:250px;" />
                                    </div>
                                </div> <!-- /form-group-->

                                <div class="form-group">
                                    <label for="editProductImage" class="col-sm-3 control-label">เลือกรูปภาพ: </label>
                                    <label class="col-sm-1 control-label">: </label>
                                    <div class="col-sm-8">
                                        <!-- the avatar markup -->
                                        <div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>
                                        <div class="kv-avatar center-block">
                                            <input type="file" class="form-control" id="editProductImage"
                                                placeholder="ชื่อครุภัณฑ์" name="editProductImage" class="file-loading"
                                                style="width:auto;" />
                                        </div>

                                    </div>
                                </div> <!-- /form-group-->

                                <div class="modal-footer editProductPhotoFooter">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i
                                            class="glyphicon glyphicon-remove-sign"></i> Close</button>

                                    <!-- <button type="submit" class="btn btn-success" id="editProductImageBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button> -->
                                </div>
                                <!-- /modal-footer -->
                            </form>
                            <!-- /form -->
                        </div>
                        <!-- product image -->
                        <div role="tabpanel" class="tab-pane" id="productInfo">
                            <form class="form-horizontal" id="editProductForm" action="editProduct.php" method="POST">
                                <br />

                                <div id="edit-product-messages"></div>

                                <div class="form-group">
                                    <label for="editproductCode" class="col-sm-3 control-label">รหัสครุภัณฑ์: </label>
                                    <label class="col-sm-1 control-label">: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="editproductCode"
                                            placeholder="รหัสครุภัณฑ์" name="editproductCode" autocomplete="off" disabled>
                                    </div>
                                </div> <!-- /form-group-->

                                <div class="form-group">
                                    <label for="editproductStyle" class="col-sm-3 control-label">ลักษณะ/ยี่ห้อ: </label>
                                    <label class="col-sm-1 control-label">: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="editproductStyle"
                                            placeholder="ตัวอย่าง Acer YX250" name="editproductStyle"
                                            autocomplete="off">
                                    </div>
                                </div> <!-- /form-group-->

                                <div class="form-group">
                                    <label for="editproductLocation" class="col-sm-3 control-label">ตำแหน่งที่ตั้ง:
                                    </label>
                                    <label class="col-sm-1 control-label">: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="editproductLocation"
                                            placeholder="เช่น 6602C, นักศึกษายืมไป" name="editproductLocation"
                                            autocomplete="off">
                                    </div>
                                </div> <!-- /form-group-->

                                <div class="form-group">
                                    <label for="editproductRole" class="col-sm-3 control-label">สิทธิการยืม: </label>
                                    <label class="col-sm-1 control-label">: </label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="editproductRole" name="editproductRole">
                                            <option value="">~~เลือก~~</option>
                                            <option value="1">ผู้ดูแลระบบ/บุคลากร/อาจารย์</option>
                                            <option value="2">ทุกคน</option>
                                        </select>
                                    </div>
                                </div> <!-- /form-group-->

                                <div class="form-group">
                                    <label for="editproductStatus" class="col-sm-3 control-label">สถานะ: </label>
                                    <label class="col-sm-1 control-label">: </label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="editproductStatus" name="editproductStatus">
                                            <option value="">~~เลือก~~</option>
                                            <option value="1">ว่าง</option>
                                            <option value="2">ไม่ว่าง</option>
                                            <option value="3">ซ่อม/รอซ่อม</option>
                                            <option value="4">ชำรุด</option>
                                            <option value="5">บริจาค</option>
                                            <option value="6">รอบริจาค</option>
                                            <option value="7">ขายทอดตลาด</option>
                                            <option value="8">โอน</option>
                                        </select>
                                    </div>
                                </div> <!-- /form-group-->

                                <div class="form-group">
                                    <label for="editproductEtc" class="col-sm-3 control-label">หมายเหตุ: </label>
                                    <label class="col-sm-1 control-label">: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="editproductEtc"
                                            placeholder="เช่น ส่งซ่อมบริษัท Acer, CPU ใช้งานไม่ได้"
                                            name="editproductEtc" autocomplete="off">
                                    </div>
                                </div> <!-- /form-group-->

                                <div class="modal-footer editProductFooter">
                                    <button type="button" id="clostProductModal" class="btn btn-default"
                                        data-dismiss="modal">
                                        <i class="glyphicon glyphicon-remove-sign"></i>
                                        ปิด</button>

                                    <button type="submit" class="btn btn-success" id="editProductBtn"
                                        data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i>
                                        บันทึก</button>
                                        </div> <!-- /modal-footer -->
                            </form> <!-- /.form -->
                        </div>
                        <!-- /product info -->
                    </div>

                </div>

            </div> <!-- /modal-body -->


        </div>
        <!-- /modal-content -->
    </div>
    <!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeProductModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> ลบ ครุภัณฑ์</h4>
            </div>
            <div class="modal-body">

                <div class="removeProductMessages"></div>

                <p>คุณแน่ใจว่าจะลบ ?</p>
            </div>
            <div class="modal-footer removeProductFooter">
                <button type="button" class="btn btn-default" data-dismiss="modal"> <i
                        class="glyphicon glyphicon-remove-sign"></i> ปิด</button>
                <button type="button" class="btn btn-primary" id="removeProductBtn" data-loading-text="Loading..."> <i
                        class="glyphicon glyphicon-ok-sign"></i> ยืนยัน</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->


<script src="custom/js/product.js"></script>

<?php require_once 'includes/footer.php'; ?>