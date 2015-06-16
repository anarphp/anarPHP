<?php
//$this=new mod_content();
//$this->setPost($_POST);
//$this->setGet($_GET);
$newslist = TblcontentModel::findBySql($this->getPdo(),
        "SELECT * FROM tblcontent WHERE position LIKE '%news%'");
$sql="select * from tblcontentgroup";
$allGroup= TblcontentgroupModel::findBySql($this->getPdo(), $sql);
$this->Theme()->registerData("allGroup", $allGroup);

$this->addTitle("اخبار");
$this->Theme()->registerData("all", $newslist);
$this->Theme()->load("blog");



