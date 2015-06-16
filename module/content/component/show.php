<?php
//$this=new mod_content();
$gId=$this->readIntGet("id");
$group = TblcontentgroupModel::findById($this->getPdo(), $gId);
$search="article";
if ($group!=NULL){
    $search=$group->getGroupname();
}
$all = TblcontentModel::findBySql($this->getPdo(),
        "SELECT * FROM tblcontent WHERE position LIKE '%$search%'");

$sql="select * from tblcontentgroup where visible=1";
$allGroup= TblcontentgroupModel::findBySql($this->getPdo(), $sql);
$this->Theme()->registerData("allGroup", $allGroup);
$this->addTitle($group->getTitle());
$this->Theme()->registerData("all", $all);

$this->Theme()->load("blog");
