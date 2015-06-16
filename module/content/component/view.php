<?php
$cid=$this->readIntGet('id');//$_GET['cid'];
$content = TblcontentModel::findById($this->getPdo(), $cid);
if ($content==NULL){
    return;
}
$sql="select * from tblcontentgroup where visible=1";
$allGroup= TblcontentgroupModel::findBySql($this->getPdo(), $sql);
$this->Theme()->registerData("allGroup", $allGroup);

$this->addTitle($content->getTitle());
$this->Theme()->registerData("article", $content);
if ($content->getGallery()>0){
    //$gallery = TblgalleryModel::findById($this->getPdo(), $content->getGallery());
    $example=new TblpictureModel();
    $example->setGalleryId($content->getGallery());
    $allPicture = TblpictureModel::findByExample($this->getPdo(), $example);
    $this->Theme()->registerData("allPicture", $allPicture);
    $this->Theme()->Load("view");
}else{
    $this->Theme()->Load("view");
}
