<?php
//$this=new mod_content();
$this->CanDo("admin");
$sql="select * from tblcontentgroup;";
$listGroup = TblcontentgroupModel::findBySql($this->getPdo(), $sql);
$this->Theme()->registerData("listGroup", $listGroup);
$this->Theme()->Load("listGroup");