<?php require_once 'include/header.php'; ?>

<section role="main" class="content-body">
    <!-- <section role="main" class="content-body"> -->
    <header class="page-header">
        <h2>ข้อมูลส่วนตัว</h2>
    </header>
    <!-- end: page -->
    <!-- </section> -->
    <section class="panel">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <!-- <div class="panel-heading">
                        <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> ข่าวประชาสัมพันธ์</div>
                    </div>  -->
                    <!-- /panel-heading -->
                    <div class="panel-body">

                        <!-- <h1>USER PROFILE</h1> -->

                        <div id='cssmenu'>
                            <ul>
                                <li class='active'><a href='myprofile.php'>ข้อมูลส่วนตัว</a></li>
                                <li><a href='editProfile.php'>แก้ไขข้อมูลส่วนตัว</a></li>
                                <li><a href='Changepassword.php'>เปลี่ยนรหัสผ่าน</a></li>
                            </ul>
                        </div>

                        <div class="containner">

                            <?php

$sql = "SELECT * FROM users_personal WHERE user_id = '$session_username'";

$result = $connect->query($sql);
$row = $result->fetch_assoc();
$degree = "";
$department = "";
if($row['degree'] == 1){
    $degree = "ปริญญาตรี";
}elseif($row['degree'] == 2){
    $degree = "ปริญญาโท";
}else{
    $degree = "ปริญญาเอก";
}

if($row['department'] == 1){
    $department = "วิทยาการคอมพิวเตอร์";
}elseif($row['department'] == 2){
    $department = "เทคโนโลยีสารสนเทศ";
}else{
    $department = "ภูมิศาสตร์สารสนเทศ";
}

                            if($session_role == 2){?>

                            <!-- <div class="container portfolio"> -->

                            <div class="bio-info">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="bio-image">
                                                    <img src="https://i.ya-webdesign.com/images/transparent-teacher-flat-design-5.png"
                                                        alt="image" width="200px" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="bio-content">
                                            <div class="form-row">
                                                <h2><?= $row['fullname']; ?></h2>
                                            </div>
                                            <div class="form-row">
                                                <label>---------------------------------</label>
                                            </div>
                                            <div class="form-row">
                                                <h4>อีเมล : <span style="color:blue;"><?= $row['email']; ?></span></h4>
                                            </div>
                                            <div class="form-row">
                                                <h4>เบอร์โทรศัพท์ : <span
                                                        style="color:blue;"><?= $row['phone']; ?></span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php }else{?>

                            <div class="bio-info">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="bio-image">
                                                    <img src="https://itservice.forest.go.th/download/img/jitasa.png"
                                                        alt="image" width="200px" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="bio-content">
                                            <div class="form-row">
                                                <h2><?= $row['fullname']; ?></h2>
                                            </div>
                                            <div class="form-row">
                                                <label>---------------------------------</label>
                                            </div>
                                            <div class="form-row">
                                                <h4>รหัสนักศึกษา : <span
                                                        style="color:blue;"><?= $row['user_id']; ?></span></h4>
                                            </div>
                                            <div class="form-row">
                                                <h4>อีเมล : <span style="color:blue;"><?= $row['email']; ?></span></h4>
                                            </div>
                                            <div class="form-row">
                                                <h4>เบอร์โทรศัพท์ : <span
                                                        style="color:blue;"><?= $row['phone']; ?></span> </h4>
                                            </div>
                                            <div class="form-row">
                                                <h4>นักศึกษาชั้นปีที่ : <span
                                                        style="color:blue;"><?= $row['col_year']; ?></span></h4>
                                            </div><br>
                                            <div class="form-row">
                                                <h4>ระดับ<?= $degree ?> หลักสูตรวิชา<?= $department ?></h4>
                                            </div>
                                            <div class="form-row">
                                                <h4>มหาวิทยาลัยขอนแก่น</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <?php
                            }
                      
                            
                        
?>



                        </div><!-- containner -->
                    </div> <!-- /panel-body -->
                </div> <!-- /panel -->
            </div> <!-- /col-md-12 -->
        </div> <!-- /row -->
    </section>
    <aside id="sidebar-right" class="sidebar-right">
        <div class="nano">
            <div class="nano-content">
                <a href="#" class="mobile-close visible-xs">
                    Collapse <i class="fa fa-chevron-right"></i>
                </a>
                <div class="sidebar-right-wrapper">

                    <div class="sidebar-widget widget-calendar">
                        <h6>Upcoming Tasks</h6>
                        <div data-plugin-datepicker data-plugin-skin="dark"></div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</section>
<?php require_once 'include/footer.php'; ?>