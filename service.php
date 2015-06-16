<?php
 require './config.php';
 $security=new security();
 $boot=new bootloader();
 $boot->setDefaultModule("update");
 $boot->setDefaultComponent("service");
 $module= $boot->bootLoad();
 $module->modPrint();