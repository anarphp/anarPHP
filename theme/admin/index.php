<?php
//$this = new themeManager("");
//---------- Load Data --- :)
$module = $this->loadData("module");
$start = $this->loadData("start");
//$security = $this->loadData("security");

$this->Tools()->addCss("assets/plugins/font-awesome/css/font-awesome.min.css");
$this->Tools()->addCss("assets/plugins/bootstrap/css/bootstrap-rtl.min.css");
$this->Tools()->addCss("assets/plugins/uniform/css/uniform.default.css");
$this->Tools()->addCss("assets/css/print-rtl.css", "print");
$this->Tools()->addCss("assets/css/style-metronic-rtl.css");
$this->Tools()->addCss("assets/css/style-rtl.css");
$this->Tools()->addCss("assets/css/style-responsive-rtl.css");
$this->Tools()->addCss("assets/css/plugins-rtl.css");
$this->Tools()->addCss("assets/css/pages/tasks-rtl.css");
$this->Tools()->addCss("assets/css/themes/default-rtl.css");
$this->Tools()->addCss("assets/css/custom-rtl.css");

$this->Tools()->addJs("assets/plugins/jquery-1.10.2.min.js");
$this->Tools()->addJs("assets/plugins/jquery-migrate-1.2.1.min.js");
$this->Tools()->addJs("assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js");
$this->Tools()->addJs("assets/plugins/bootstrap/js/bootstrap.min.js");
$this->Tools()->addJs("assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js");
$this->Tools()->addJs("assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js");
$this->Tools()->addJs("assets/plugins/jquery.blockui.min.js");
$this->Tools()->addJs("assets/plugins/jquery.cookie.min.js");
$this->Tools()->addJs("assets/plugins/uniform/jquery.uniform.min.js");
$this->Tools()->addJs("assets/scripts/app.js");

//use Asynchronous module :)
$async_modPrint = $module->Async_modPrint();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>مدیریت</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="mohsenAhmadian" name="description" />
        <meta content="Gchip.PI" name="author" />
        <meta name="MobileOptimized" content="320">		
        <?php
        $this->Tools()->printCss();
        $module->Theme()->Tools()->printCss();        
        $module->Theme()->Tools()->printPlugin();
        $module->HeadPrint();
        ?>	
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed">
        <!-- BEGIN HEADER -->   
        <div class="header navbar navbar-inverse navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <?php include 'plugin/menu/navBar.php' ?>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <div class="clearfix"></div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <?php include 'plugin/menu/rightMenu.php' ?>
            <!-- END SIDEBAR -->
            <!-- BEGIN PAGE -->
            <div class="page-content">
                <?php
                //$module->modPrint();
                echo $async_modPrint;
                ?>   
            </div>
            <!-- END PAGE -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="footer">
            <div class="footer-inner">
                تمامی حقوق محفوظ است
                &nbsp;
                <?php
                //-------------------------
                //This is not of framework
                $end = microtime(true);
                $creationtime = ($end - $start);
                printf("زمان ایجاد صفحه %6f ثانیه</p>", $creationtime);
                //-------------------------    
                ?>
            </div>

            <div class="footer-tools">
                <span class="go-top">
                    <i class="icon-angle-up"></i>
                </span>
            </div>
        </div>	
        <!--[if lt IE 9]>
        <script src="<?php echo $this->Tools()->ThemePath("assets/plugins/respond.min.js") ?>"></script>
        <script src="<?php echo $this->Tools()->ThemePath("assets/plugins/excanvas.min.js") ?>"></script> 
        <![endif]-->    
        <?php
        $this->Tools()->printJs();
        $module->Theme()->Tools()->printJs();
        $module->plugin();
        ?>
        <script>
            jQuery(document).ready(function() {
                App.init(); // initlayout and core plugins
            });
        </script>
    </body>
    <!-- END BODY -->
</html>