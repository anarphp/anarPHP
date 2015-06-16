<?php

$id=$this->readIntPost("id");
$gallery = TblgalleryModel::findById($this->getPdo(), $id);
$sql="select * from tblpicture where `galleryId`=$id";
$allPic = TblpictureModel::findBySql($this->getPdo(), $sql);
$fmng=new FileManager();
foreach ($allPic as $pic) {
    try {
        $img = $pic->getImg();
        $deleteFromDatabase = $pic->deleteFromDatabase($this->getPdo());
        if ($deleteFromDatabase > 0) {
            $fmng->DelFile($img);
        }
    } catch (Exception $exc) {
        //do nothing
    }

}
$gallery->deleteFromDatabase($this->getPdo());

$sql="select * from tblgallery";
$allGallery = TblgalleryModel::findBySql($this->getPdo(), $sql);
$this->Theme()->registerData("allGallery",$allGallery);
$this->Theme()->load("list");