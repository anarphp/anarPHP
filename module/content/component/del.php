<?php
$this->CanDo("admin");
$id=$this->readIntPost("id");
if($id>0){
    $cont = TblcontentModel::findById($this->getPdo(), $id);
    $cont->deleteFromDatabase($this->getPdo());
}
$allContent = TblcontentModel::findBySql($this->getPdo(), "SELECT * FROM tblcontent");
$this->Theme()->registerData("allContent", $allContent);
$this->Theme()->Load("list", $this);