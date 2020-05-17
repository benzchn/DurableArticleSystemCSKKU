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
			$newsStatus = $row[6];
			$imagefile = $row[1];


			if($newsStatus == 1){
		   echo     " <article id='featured'>
						   <div>
						   <?php if('".$imagefile."' == ''){ 

						} else { ?>
<div style='display: flex; justify-content: center; align-items: center;'>
    <img src='".$imagefile."' width='50px' alt='' />
</div>
<?php } ?>
<h3 style='color:black;'>หัวข้อ : ".$newsTitle."</h3>
<p>ประกาศเมื่อ : ".$newsDate." </p>
<p>โดย : ".$newsWho."</p>
<a href='#deleteNews_".$newsId."' class='btn btn-danger' role='button' alt='ลบ' style='color:white;' data-toggle='modal'><i
        class='glyphicon glyphicon-remove'></i></a>
<a href='EditNews.php?EditNews=".$newsId."' class='btn btn-warning' role='button' alt='แก้ไข' style='color:white;'><i
        class='glyphicon glyphicon-edit'></i></a>
</div>

</article>

<!-- Modal -->
<div class='modal fade' id='deleteNews_".$newsId."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
    aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>ลบข่าว</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
			</div>
			<form action='php_action/removeNews.php' method='post'>
            <div class='modal-body'>
				คุณแน่ใจที่จะลบ ?
			</div>
			<input type='hidden' value='".$newsId."' name='deleteNews'/>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>ยกเลิก</button>
                <button type='submit' class='btn btn-danger'>ลบ</button>
			</div>
			</form>
        </div>
    </div>
</div>

";
}
}
}

?>