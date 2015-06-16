<?php
$last = TblcontentModel::findBySql($this->getPdo(), "SELECT * FROM tblcontent WHERE position LIKE '%footer%'");
$sql="select * from tblgroup order by id desc limit 16";
$allGroup = TblgroupModel::findBySql($this->getPdo(), $sql);
$setting=new setting($this->getPdo());
$this->Theme()->registerData("setting", $setting);

$this->Theme()->registerData("allGroup", $allGroup);

$this->Theme()->registerData("footer", $last);
$this->Theme()->load("footer");

