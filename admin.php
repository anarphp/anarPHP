<?php
//-------------------------
//This is not of framework
 $start = microtime(true);
 //----------------------
 require './config.php';
 $security=new security();
 if (!$security->isLogin() || !$security->isAdmin()){
     header("Location:login.php");
     return;
 }
 $boot=new bootloader();
 $boot->setDefaultModule("dashboard");
 $boot->setDefaultComponent("first");
 $module= $boot->bootLoad();
 $theme=new themeManager("base","admin"); // admin skin (metronik)
 
 $module->setThemeName("admin");
 $theme->registerData("module", $module);
 $theme->registerData("start", $start); // only for check time creation not important
 $theme->loadLayout();
