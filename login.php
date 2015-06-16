<?php

 require './config.php';
 $security=new security();
 $boot=new bootloader();
 $boot->setDefaultModule("users");
 $boot->setDefaultComponent("admin");
 $module= $boot->bootLoad();
 $theme=new themeManager("base","admin"); // base is not important(index.php) ,admin skin 
 
 $module->setThemeName("admin"); //setting theme name of module
 
 $theme->registerData("module", $module);
 $theme->loadLayout("login.php");