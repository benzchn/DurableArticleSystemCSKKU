<?php require_once 'includes/header.php'; ?>

<div class="row">
    <div class="col-md-12">

        <ol class="breadcrumb">
            <li><a href="dashboard.php">หน้าแรก</a></li>
            <li class="active">แก้ไขประกาศ</li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> แก้ไขประกาศ</div>
            </div> <!-- /panel-heading -->
            <div class="panel-body">


                <?php
require_once 'php_action/core.php';
    
    if(isset($_GET['EditNews'])){
        
        $newsID = $_GET['EditNews'];
		$sql = "SELECT * FROM news_ad where news_id = $newsID";
		//use for MySQLi-OOP
		$query = $connect->query($sql);
		while($row = $query->fetch_assoc()){
?>
                <form action="updateNews.php" method="POST" role="form" enctype="multipart/form-data">
                    <legend></legend>
                    <div class="form-group">
                        <label for="">หัวข้อ</label>
                        <textarea type="text" class="form-control" id="newsTitle" name="newsTitle"
                            placeholder="ใส่หัวข้อ" required><?php echo $row['news_title'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">รายละเอียด</label>
                        <textarea type="text" class="form-control" id="newsMessage" name="newsMessage"
                            placeholder="ใส่รายละเอียด" required><?php echo $row['news_detail'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">เลือกรูปภาพ</label>
                        <input type="file" class="form-control" id="newsImages" name="newsImages">
                    </div>
                    <div class="form-group">
                        <label for="">เลือกวันที่ประกาศ</label>
                        <input type="date" class="form-control" id="newsDate" name="newsDate" required></textarea>
                    </div>
                        <input type="hidden" id="newsId" name="newsId" value="<?php echo $row['news_id'];?>">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">อัพเดท</button>
                </form>
                <?php }
                
        }?>
            </div> <!-- /panel-body -->
        </div> <!-- /panel -->
    </div> <!-- /col-md-12 -->
</div> <!-- /row -->

<?php require_once 'includes/footer.php'; ?>