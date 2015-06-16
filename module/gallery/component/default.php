<?php
$sql="select * from  tblgallery where `faName`='صفحه-اول'";
$gallery = TblgalleryModel::findBySql($this->getPdo(), $sql);
if ( count($gallery)<=0){
    return;
}
$sql2="select * from tblpicture where `galleryId`={$gallery[0]->getId()}";
$allPic = TblpictureModel::findBySql($this->getPdo(), $sql2);
$this->Theme()->registerData("allPic",$allPic);
$this->Theme()->load("default");