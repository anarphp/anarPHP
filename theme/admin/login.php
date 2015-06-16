<?php
  //$this=new themeManager;
  $this->Tools()->addCss("assets/plugins/font-awesome/css/font-awesome.min.css");
  $this->Tools()->addCss("assets/plugins/bootstrap/css/bootstrap-rtl.min.css");
  $this->Tools()->addCss("assets/plugins/uniform/css/uniform.default.css");
  $this->Tools()->addCss("assets/plugins/select2/select2_metro_rtl.css");
  $this->Tools()->addCss("assets/css/style-metronic-rtl.css");
  $this->Tools()->addCss("assets/css/style-rtl.css");
  $this->Tools()->addCss("assets/css/style-responsive-rtl.css");
  $this->Tools()->addCss("assets/css/plugins-rtl.css");
  $this->Tools()->addCss("assets/css/themes/default-rtl.css");
  $this->Tools()->addCss("assets/css/pages/login-soft-rtl.css");
  $this->Tools()->addCss("assets/css/custom-rtl.css");
  
  $this->Tools()->addJs("assets/plugins/jquery-1.10.2.min.js");
  $this->Tools()->addJs("assets/plugins/jquery-migrate-1.2.1.min.js");
  $this->Tools()->addJs("assets/plugins/bootstrap/js/bootstrap.min.js");
  $this->Tools()->addJs("assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js");
  $this->Tools()->addJs("assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js");
  $this->Tools()->addJs("assets/plugins/jquery.blockui.min.js");
  $this->Tools()->addJs("assets/plugins/jquery.cookie.min.js");
  $this->Tools()->addJs("assets/plugins/uniform/jquery.uniform.min.js");
  $this->Tools()->addJs("assets/plugins/jquery-validation/dist/jquery.validate.min.js");
  $this->Tools()->addJs("assets/plugins/backstretch/jquery.backstretch.min.js");
  $this->Tools()->addJs("assets/plugins/select2/select2.min.js");
  $this->Tools()->addJs("assets/scripts/app.js");
  $this->Tools()->addJs("assets/scripts/login-soft.js");
  
  
  $module = $this->loadData("module");   
  $async_modPrint = $module->Async_modPrint();
  

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>ورود به ارتباط با مشتریان</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <meta name="MobileOptimized" content="320">
   <?php
      $this->Tools()->printCss();              
   ?>
   <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
   <!-- BEGIN LOGO -->
   <div class="logo">
      <img src="<?php echo $this->Tools()->ThemePath("assets/img/logo-big.png");?>" alt="" /> 
   </div>
   <!-- END LOGO -->
   <!-- BEGIN LOGIN -->
   <div class="content">
     <?php       
      echo $async_modPrint;
     ?>
   </div>
   <!-- END LOGIN -->
   <!-- BEGIN COPYRIGHT -->
   <div class="copyright">
      تمامی حقوق محفوظ است
   </div> 
   <!--[if lt IE 9]>
   <script src="<?php echo $this->Tools()->ThemePath("assets/plugins/respond.min.js");?>"></script>
   <script src="<?php echo $this->Tools()->ThemePath("assets/plugins/excanvas.min.js");?>"></script> 
   <![endif]-->   
   <?php
     $this->Tools()->printJs();
   ?>
   <script>
      jQuery(document).ready(function() {     
        App.init();
        Login.init('<?php echo $this->Tools()->ThemePath(""); ?>');
      });
   </script>
   <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>