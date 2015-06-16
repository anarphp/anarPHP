<?php
//show first image of gallery
//This is a serivice
//$this=new mod_gallery();
$id = $this->readData("id");
//$gallery = TblgalleryModel::findById($this->getPdo(), $id);
$sql="select * from tblpicture where `galleryId`=$id";
$allPic = TblpictureModel::findBySql($this->getPdo(), $sql);
if (count($allPic)>0){
    echo $allPic[0]->getImg();
    return;
}
echo "";