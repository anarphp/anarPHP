<?php
//$this=new mod_content();

$all = TblcontentModel::findBySql($this->getPdo(),
        "SELECT * FROM tblcontent WHERE position LIKE '%article%'");

$sql="select * from tblcontentgroup where visible=1";
$allGroup= TblcontentgroupModel::findBySql($this->getPdo(), $sql);
$this->Theme()->registerData("allGroup", $allGroup);
$this->addTitle("وبلاگ ");
$this->Theme()->registerData("all", $all);

$this->Theme()->load("blog");


