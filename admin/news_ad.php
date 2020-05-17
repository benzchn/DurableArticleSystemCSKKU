<?php require_once 'includes/header.php'; ?>


<div class="row">
    <div class="col-md-12">

        <!-- <ol class="breadcrumb">
            <li><a href="dashboard.php">หน้าแรก</a></li>
            <li class="active">ประกาศข่าวสาร</li>
        </ol> -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> ประกาศข่าวสาร</div>
            </div> <!-- /panel-heading -->
            <div class="panel-body">

            <!-- <div class="remove-messages"></div> -->

                <form action="createNews.php" method="POST" role="form" enctype="multipart/form-data">
                    <legend></legend>
                    <div class="form-group">
                        <label for="">หัวข้อ</label>
                        <textarea type="text" class="form-control" id="newsTitle" name="newsTitle"
                            placeholder="ใส่หัวข้อ" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">รายละเอียด</label>
                        <textarea type="text" class="form-control" id="newsMessage" name="newsMessage"
                            placeholder="ใส่รายละเอียด" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">เลือกรูปภาพ</label>
                        <input type="file" class="form-control" id="newsImages" name="newsImages">
                    </div>
                    <!-- <div class="form-group">
                        <label for="">เลือกวันที่ประกาศ</label>
                        <input type="date" class="form-control" id="newsDate" name="newsDate" required></textarea>
                    </div> -->
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">ประกาศ</button>
                </form>

            </div> <!-- /panel-body -->
        </div> <!-- /panel -->
    </div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> ข่าวสารที่กำลังประกาศ</div>
            </div> <!-- /panel-heading -->
            <div class="panel-body">

                <div class="remove-messages"></div>

                <?php require_once 'php_action/fetchNews.php'; ?>

            </div> <!-- /panel-body -->
        </div> <!-- /panel -->
    </div> <!-- /col-md-12 -->
</div> <!-- /row -->

<?php require_once 'includes/footer.php'; ?>