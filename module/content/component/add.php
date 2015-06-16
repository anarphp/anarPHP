<?php
//$this=new mod_content();
$this->CanDo("admin");
$msg = "";
$msgtype="";
$id = $this->readIntPost("id");
$content = new TblcontentModel();
if ($id>0){
    $content=  TblcontentModel::findById($this->getPdo(), $id);
}
if ($this->getSend()>0){
    $location = "";
    if ($this->isArrayPost('location')) {
        $location = " " . implode(",", $this->readArrayPost('location')); //add space to index>0
    } else {
        $location = " " . $this->readPost('location');
    }
    $content->setNScore(1);
    $content->setScore(0);
//    $content->setEnContent($this->readPost('enfulltext',TRUE));
//    $content->setEnTitle($this->readPost("entitle"));
//    $content->setEnSmallComment($this->readPost('ensmall'));
    
    $content->setTitle($this->readPost("fatitle"));
    $content->setContent($this->readPost('fafulltext',TRUE));
    $content->setSmallComment($this->readPost('fasmall'));
    $content->setGallery($this->readIntPost("gid"));
    $content->setPosition($location);    
    $img=$this->readPost("oldImg");
    $this->setFiles($_FILES);
    if ($this->isUploadFile("pimg")){
        $fmng=new FileManager();
        if ($img!=""){
            $fmng->DelFile($img);
        }
        $img = $fmng->SaveImageUpload($this->getFile("pimg"), "upload/cms");        
    }
    $content->setImg($img);
    $content->setAllowComment($this->readBoolPost("allowComment"));
    if ($id>0){
        $content->updateToDatabase($this->getPdo());
    }else{
        $content->insertIntoDatabase($this->getPdo());
    }
}


$allGallery = TblgalleryModel::findByExample($this->getPdo(), new TblgalleryModel());
$this->Theme()->registerData("allGallery",$allGallery);
$allGroup= TblcontentgroupModel::findByExample($this->getPdo(), new TblcontentgroupModel());
$this->Theme()->registerData("msg", $msg);
$this->Theme()->registerData("content", $content);
$this->Theme()->registerData("id", $id);
$this->Theme()->registerData("msgtype", $msgtype);
$this->Theme()->registerData("allGroup", $allGroup);
$this->Theme()->Load("add", $this);
