<?php require_once 'include/header.php'; ?>

<section role="main" class="content-body">
    <!-- <section role="main" class="content-body"> -->
    <header class="page-header">
        <h2>หน้าแรก</h2>
    </header>
    <!-- end: page -->
    <!-- </section> -->

    <section class="panel">



        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> ข่าวประชาสัมพันธ์</div>
                    </div> <!-- /panel-heading -->
                    <div class="panel-body">

                        <div id="secwrapper">
						<section style='width: 1000px;margin: auto;'>
						   <?php require_once 'php_action/fetchNews.php'; ?>
						   </section>
                        </div>

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