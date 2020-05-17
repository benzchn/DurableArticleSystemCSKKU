<?php
require_once 'core.php';

$sql = "SELECT news_id,news_image_64,news_title,news_detail,news_who_create,DATE_FORMAT(news_date, '%d %M %Y'),news_status FROM news_ad";
//use for MySQLi-OOP
$query = $connect->query($sql);
if($query->num_rows > 0) {
while($row = $query->fetch_array()){
    $newsTitle = $row[2];
    $newsDate = $row[5];
    $newsWho = $row[4];
    $newsId = $row[0];
    $newsDetail = $row[3];
    $newsStatus = $row[6];
    $imagefile = $row[1];


    if($newsStatus == 1){

                $filename = "".$newsId.".php";
                $ourFileName = $filename;
                $ourFileHandle = fopen($ourFileName, 'w');

		   echo     "
                                <article id='featured'>
                                <div>
                                    <?php if('".$imagefile."' == ''){ 

                                    } else { ?>
                                        <div style='display: flex; justify-content: center; align-items: center;'>
                                    <a href='".$newsId.".php'><img src='".$imagefile."' width='100px' alt='' /></a>
                                    </div>
                                    <?php } ?>
                                    <h3 style='color:black;'>".$newsTitle."&nbsp;<img src='http://oxygen.readyplanet.com/images/column_1303576852/icon0002.gif' width='25px'/></h3>
                                    <p>ประกาศเมื่อ : ".$newsDate." </p>
                                    <p>โดย : ".$newsWho."</p>
                                    <a  href='".$newsId.".php'  class='readmore'>อ่านเพิ่มเติม-></a>
                                    </div>
                                </article>
 
                    ";
        
                    
					$written =  
								"<?php require_once 'include/header.php'; ?>
<section role='main' class='content-body'>
    <!-- <section role='main' class='content-body'> -->
    <header class='page-header'>
        <h2>หน้าแรก</h2>
    </header>
    <!-- end: page -->
    <!-- </section> -->
    <section class='panel'>
        <div class='row'>
            <div class='col-md-12'>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        <div class='page-heading'> <i class='glyphicon glyphicon-edit'></i> ข่าวประชาสัมพันธ์</div>
                    </div> <!-- /panel-heading -->
                    <div class='panel-body'>


                        <h3 style='-webkit-text-decoration-line: underline; /* Safari */
                            text-decoration-line: underline; color: black;'><?php echo '".$newsTitle."'; ?></h3>
                            <p>ประกาศเมื่อ : ".$newsDate."  โดย : ".$newsWho."</p>
                        <?php 
							require_once 'php_action/core.php';
									".'$sql'." = 'SELECT * FROM news_ad where news_id = ".$newsId."';
								//use for MySQLi-OOP
								".'$query = $connect->query($sql);'."
								".'$row = $query->fetch_assoc();'."
							
							if('".$imagefile."' == ''){
							
							} else { ?>
                        <div style='display: flex;justify-content: center;align-items: center;'>
                            <img src='".$imagefile."' width='100px'>
                        </div>


                        <?php } ?>
                        <h4 style='color: black;'><?php echo '".$newsDetail."'; ?></h4>


                    </div> <!-- /panel-body -->
                </div> <!-- /panel -->
            </div> <!-- /col-md-12 -->
        </div> <!-- /row -->
    </section>
    <aside id='sidebar-right' class='sidebar-right'>
        <div class='nano'>
            <div class='nano-content'>
                <a href='#' class='mobile-close visible-xs'>
                    Collapse <i class='fa fa-chevron-right'></i>
                </a>
                <div class='sidebar-right-wrapper'>
                    <div class='sidebar-widget widget-calendar'>
                        <h6>Upcoming Tasks</h6>
                        <div data-plugin-datepicker data-plugin-skin='dark'></div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</section>
<?php require_once 'include/footer.php'; ?>
";

fwrite($ourFileHandle,$written);

fclose($ourFileHandle);

}
}
}

?>