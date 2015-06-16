<?php
//$this=new mod_gallery();
$id=$this->readIntPost("id");
$gId=$this->readIntPost("gId");
$pic=new TblpictureModel();
if ($id>0){
    $pic =  TblpictureModel::findById($this->getPdo(), $id);
    $gId = $pic->getGalleryId();
}
if ($this->getSend()>0){
    $pic->setFaDesc($this->readPost("faDesc"));
    $pic->setEnDesc($this->readPost("EnDesc"));
    $img=$this->readPost("oldImg");
    $this->setFiles($_FILES);    
    if ($this->isUploadFile("pimg")){
        $fmng=new FileManager();
        if ($img!=""){
            $fmng->DelFile($img);
        }        
        $img = $fmng->SaveImageUpload($this->getFile("pimg"), "upload/gallery");
    }
    $pic->setImg($img);
    $pic->setGalleryId($gId);
    if ($id>0){
        $pic->updateToDatabase($this->getPdo());
    }else{
        $pic->insertIntoDatabase($this->getPdo());
    }
}
$sql="select * from tblgallery";
$allGallery = TblgalleryModel::findBySql($this->getPdo(), $sql);
$this->Theme()->registerData("allGallery",$allGallery);
$this->Theme()->registerData("pic", $pic);
$this->Theme()->registerData("gId", $gId);
$this->Theme()->load("addPic");

