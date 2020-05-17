<?php
if (!session_id()) session_start();

include '../controller.php';
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
if(empty($_SESSION['user_name'])){
    header("location:../login.php");
}
if(isset($_SESSION['user_name'])){
	if($_SESSION['role'] == 1){
                    header("location:../admin/dashboard.php");
    }
}
?>


<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>ระบบครุภัณฑ์ ภาควิชาวิทยาการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/th/c/c3/Science_KKU_Thai_Emblem.png" sizes="32x32">
    <!-- Mobile Metas -->
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
        rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
    <link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
    <link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="assets/vendor/morris/morris.css" />
    <link rel="stylesheet" href="assets/stylesheets/theme.css" />
    <link rel="stylesheet" href="assets/stylesheets/skins/default.css" />
    <link rel="stylesheet" href="assets/stylesheets/theme-custom.css">
    <script src="assets/vendor/modernizr/modernizr.js"></script>
    <link href="https://fonts.googleapis.com/css?family=K2D&display=swap" rel="stylesheet">

    <!-- DataTables -->
    <!-- <link rel="stylesheet" href="../assests/plugins/datatables/jquery.dataTables.min.css"> -->
    <!-- file input -->
    <link rel="stylesheet" href="../assests/plugins/fileinput/css/fileinput.min.css">
    <!-- jquery -->
    <script src="../assests/jquery/jquery.min.js"></script>
    <!-- jquery ui -->
    <link rel="stylesheet" href="../assests/jquery-ui/jquery-ui.min.css">
    <script src="../assests/jquery-ui/jquery-ui.min.js"></script>


    <link rel="stylesheet" href="datatable/jquery.dataTables.min.css">
    <link rel="stylesheet" href="datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="datatable/responsive.bootstrap.min.css">
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <!-- <script src="js/jquery.dataTables.min.js"></script> -->

    <link rel="stylesheet" href="dist/css/bootstrap-select.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> -->
<script src="dist/js/bootstrap-select.js"></script>

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
    <style>
    #th_css {
        background-color: #d96459;
        color: white;
        text-align: center;
    }

    #td_css {
        color: black;
        text-align: center;
        font-size: 13px;
    }


    .dataTables_wrapper .dataTables_length {
        float: left;
    }

    .dataTables_wrapper .dataTables_filter {
        /* float: left;
text-align: right; */
        width: 100%;
        float: none;
        text-align: center;

    }

    input[type="search"] {
        height: 20px;
        width: 20px;
        margin-right: 500px;
        padding: 15px;
        font-size: 10px;
        border: 1px solid #CCCCCC;
    }

    @font-face {
        font-family: 'K2D';
        src: url('https://fonts.googleapis.com/css?family=K2D&display=swap');
        font-weight: normal;
        font-style: normal;
    }
    #success_message{ display: none;}
    body {
        font-family: 'K2D' !important;
    }
    #secwrapper{
	/*background: url('images/bg.gif') fixed;
	background-color: #f47771;*/ 
	padding-top: 20px; 
}
#featured{
	position: relative;
}
#featuredico{
	position: absolute;
	top: 0;
	left: 0;
}
.readmore{
	background-color: black;
	padding: 5px 10px;
	color: white;
	text-decoration: none;
	border-radius: 3px;
	display: inline-block;
}
.readmore:hover{
	background-color: #383838;
}
.old_ie header h1, .old_ie nav, .old_ie nav li, .old_ie #adbanner a, .old_ie article, .old_ie .readmore, .old_ie #sponsors a {
    display: inline;
    zoom: 1;
}
article{
	width: 280px;
	margin-right: 40px;
	display: inline-block;
	vertical-align: top;
	border: 1px solid #c8c8c8;
	margin-bottom: 20px;
	padding: 7px;
	border-radius: 3px;
	box-shadow: 0 2px 3px #ccc;
	background-color: white;
	*display:inline;
    zoom:1;
}
article p{
	margin-bottom: 7px;
}
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}
.column {
  float: left;
  width: 25%;
  text-align:center;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

#cssmenu,
#cssmenu ul,
#cssmenu ul li,
#cssmenu ul li a {
  margin: 0;
  padding: 0;
  border: 0;
  list-style: none;
  line-height: 1;
  display: block;
  position: relative;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
#cssmenu:after,
#cssmenu > ul:after {
  content: ".";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0;
}
#cssmenu {
  width: auto;
  border-bottom: 3px solid #47c9af;
  line-height: 1;
}
#cssmenu ul {
  background: #ffffff;
}
#cssmenu > ul > li {
  float: left;
}
#cssmenu.align-center > ul {
  font-size: 0;
  text-align: center;
}
#cssmenu.align-center > ul > li {
  display: inline-block;
  float: none;
}
#cssmenu.align-right > ul > li {
  float: right;
}
#cssmenu.align-right > ul > li > a {
  margin-right: 0;
  margin-left: -4px;
}
#cssmenu > ul > li > a {
  z-index: 2;
  padding: 18px 25px 12px 25px;
  font-size: 15px;
  font-weight: 400;
  text-decoration: none;
  color: #444444;
  -webkit-transition: all .2s ease;
  -moz-transition: all .2s ease;
  -ms-transition: all .2s ease;
  -o-transition: all .2s ease;
  transition: all .2s ease;
  margin-right: -4px;
}
#cssmenu > ul > li.active > a,
#cssmenu > ul > li:hover > a,
#cssmenu > ul > li > a:hover {
  color: #ffffff;
}
#cssmenu > ul > li > a:after {
  position: absolute;
  left: 0;
  bottom: 0;
  right: 0;
  z-index: -1;
  width: 100%;
  height: 120%;
  border-top-left-radius: 8px;
  border-top-right-radius: 8px;
  content: "";
  -webkit-transition: all .2s ease;
  -o-transition: all .2s ease;
  transition: all .2s ease;
  -webkit-transform: perspective(5px) rotateX(2deg);
  -webkit-transform-origin: bottom;
  -moz-transform: perspective(5px) rotateX(2deg);
  -moz-transform-origin: bottom;
  transform: perspective(5px) rotateX(2deg);
  transform-origin: bottom;
}
#cssmenu > ul > li.active > a:after,
#cssmenu > ul > li:hover > a:after,
#cssmenu > ul > li > a:hover:after {
  background: #47c9af;
}




.portfolio{
		padding:6%;
		text-align:center;
	}
	.heading{
		background: #fff;
		padding: 1%;
		text-align: left;
		box-shadow: 0px 0px 4px 0px #545b62;
	}
	.heading img{
		width: 10%;
	}
	.bio-info{
		padding: 5%;
		background:#fff;
		box-shadow: 0px 0px 4px 0px #b0b3b7;
	}
	.name{
		/* font-family: 'Charmonman', cursive; */
		font-weight:600;
	}
	.bio-image{
		text-align:center;
	}
	.bio-image img{
		border-radius:50%;
	}
	.bio-content{
		text-align:left;
	}
	.bio-content p{
		font-weight:600;
		font-size:30px;
	}

    </style>
</head>

<body>
    <section class="body">

        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a href="index.php" class="logo">
                    <img src="../images/cs_logo.png" width="18%">
                </a>
                <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
                    data-fire-event="sidebar-left-opened">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <!-- start: search & user box -->
            <div class="header-right">
                <span class="separator"></span>
                <ul class="notifications">
                    <li>
                        <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                            <i class="fa fa-bell"></i>
                            <span class="badge">3</span>
                        </a>

                        <div class="dropdown-menu notification-menu">
                            <div class="notification-title">
                                <span class="pull-right label label-default">3</span>
                                Alerts
                            </div>

                            <div class="content">
                                <ul>
                                    <li>
                                        <a href="#" class="clearfix">
                                            <div class="image">
                                                <i class="fa fa-thumbs-down bg-danger"></i>
                                            </div>
                                            <span class="title">Server is Down!</span>
                                            <span class="message">Just now</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="clearfix">
                                            <div class="image">
                                                <i class="fa fa-lock bg-warning"></i>
                                            </div>
                                            <span class="title">User Locked</span>
                                            <span class="message">15 minutes ago</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="clearfix">
                                            <div class="image">
                                                <i class="fa fa-signal bg-success"></i>
                                            </div>
                                            <span class="title">Connection Restaured</span>
                                            <span class="message">10/10/2014</span>
                                        </a>
                                    </li>
                                </ul>

                                <hr />

                                <div class="text-right">
                                    <a href="#" class="view-more">View All</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <span class="separator"></span>

                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <!-- <figure class="profile-picture">
								<img src="assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure> -->
                        <div class="profile-info">

                        <?php
							include_once('php_action/db_connect.php');
							$sql = "SELECT users_personal.role_id,role_table.role_title FROM users_personal
                            INNER JOIN role_table ON users_personal.role_id = role_table.role_id
                             WHERE user_id = '$session_username'";
							//use for MySQLi-OOP
							$query = $conn->query($sql);
                            if($query->num_rows > 0) { 
                                $row = $query->fetch_array();
                            }
                            ?>

                            <span class="name"><?php echo $session_username . " ($row[1])"; ?></span>
                            <!-- <span class="role">administrator</span> -->
                        </div>

                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="myprofile.php"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</a>
                            </li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="../logout.php"><i class="fa fa-power-off"></i>
                                    ออกจากระบบ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>
        <!-- end: header -->
        <div class="inner-wrapper">
            <!-- start: sidebar -->
            <aside id="sidebar-left" class="sidebar-left">
                <div class="sidebar-header">
                    <div class="sidebar-title">
                    </div>
                    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html"
                        data-fire-event="sidebar-left-toggle">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>
                <div class="nano">
                    <div class="nano-content">
                        <nav id="menu" class="nav-main" role="navigation">
                            <ul class="nav nav-main">
                                <li class="nav-active">
                                    <a href="index.php">
                                        <img src='https://image.flaticon.com/icons/svg/609/609803.svg' width="21px"
                                            height="21px">
                                        <span>&nbsp;&nbsp;หน้าแรก</span>
                                    </a>
                                </li>
                                <li class="nav-active">
                                    <a href="tables_list.php">
                                        <img src='https://image.flaticon.com/icons/svg/2535/2535554.svg' width="21px"
                                            height="21px">
                                        <span>&nbsp;&nbsp;ครุภัณฑ์</span>
                                    </a>
                                </li>
                                <li class="nav-active">
                                    <a href="rent_my.php">
                                        <img src='https://image.flaticon.com/icons/svg/609/609753.svg' width="21px"
                                            height="21px">
                                        <span>&nbsp;&nbsp;รายการครุภัณฑ์ที่ยืม</span>
                                    </a>
                                </li>

                                <li class="nav-parent">
                                    <a>
                                        <img src='https://image.flaticon.com/icons/svg/745/745437.svg' width="21px"
                                            height="21px">
                                        <span>&nbsp;&nbsp;งานซ่อม</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <!-- <li>
                                            <a href="#">
                                                พัสดุของฉัน
                                            </a>
                                        </li> -->
                                        <li>
                                            <a href="repair_report.php">
                                                แจ้งซ่อม
                                            </a>
                                        </li>
                                        <li>
                                            <a href="repair_follow.php">
                                                ติดตามการสั่งซ่อมของฉัน
                                            </a>
                                        </li>
                                        <!-- <li>
                                            <a href="#">
                                                รายการซ่อม
                                            </a>
                                        </li> -->
                                    </ul>
                                </li>


                            </ul>
                        </nav>
                    </div>
                </div>
            </aside>
            <!-- end: sidebar -->