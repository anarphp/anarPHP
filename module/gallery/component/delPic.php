<?php

$id=$this->readIntPost("id");
$pic = TblpictureModel::findById($this->getPdo(), $id);
$gId=$pic->getGalleryId();
$img = $pic->getImg();
$deleteFromDatabase = $pic->deleteFromDatabase($this->getPdo());
if ($deleteFromDatabase>0){
    $fmng=new FileManager();
    $fmng->DelFile($img);
}
$sql="select * from tblpicture where `galleryId`=$gId";
$allPic = TblpictureModel::findBySql($this->getPdo(), $sql);
$gallary = TblgalleryModel::findById($this->getPdo(), $gId);

$this->Theme()->registerData("gName", $gallary->getFaName());
$this->Theme()->registerData("allPic", $allPic);
$this->Theme()->Load("listPic");
        
