<?php
$all = TblcontentModel::findBySql($this->getPdo(),
        "SELECT * FROM tblcontent WHERE position LIKE '%mainmenu%'");
$setting=new setting($this->getPdo());
$this->Theme()->registerData("setting", $setting);

$this->Theme()->registerData("mainmenu",$all);
$this->Theme()->load("headmenu");


