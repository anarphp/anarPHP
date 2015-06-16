<?php

//$this=new mod_gallery();
$gId = $this->readIntPost("id");

if ($gId<=0){
    $this->MoveHere("admin", "gallery", "list"); //:)
    return;
}
$sql="select * from tblpicture where `galleryId`=$gId";
$allPic = TblpictureModel::findBySql($this->getPdo(), $sql);
$gallary = TblgalleryModel::findById($this->getPdo(), $gId);

$this->Theme()->registerData("gName", $gallary->getFaName());
$this->Theme()->registerData("allPic", $allPic);
$this->Theme()->Load("listPic");