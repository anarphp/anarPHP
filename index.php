<?php
//-------------------------
//This is not of framework
 $start = microtime(true);
 //----------------------
 require './config.php';
 $security=new security(); //start session
 $boot=new bootloader();
 $boot->setDefaultModule("main");
 $boot->setDefaultComponent("first");
 $module= $boot->bootLoad();
 $theme=new themeManager("base"); // default skin
 $theme->registerData("module", $module);
 $theme->registerData("start", $start); // only for check time creation not important
 $theme->loadLayout();
?>

