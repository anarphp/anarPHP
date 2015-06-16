<?php
//$this=new mod_gallery();
$id=$this->readIntPost("id");
$gallery=new TblgalleryModel();
if ($id>0){
    $gallery=  TblgalleryModel::findById($this->getPdo(), $id);
}
if ($this->getSend()>0){
    $gallery->setFaName($this->readPost("faName"));
//    $gallery->setEnName($this->readPost("EnName"));
    if ($id>0){
        $gallery->updateToDatabase($this->getPdo());
    }else{
        $gallery->insertIntoDatabase($this->getPdo());
    }
}
$this->Theme()->registerData("gallery", $gallery);
$this->Theme()->load("add");

