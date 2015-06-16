<?php
$this->CanDo("admin");
$id=$this->readIntPost("id");
if($id>0){
    $cont = TblgrouptourModel::findById($this->getPdo(), $id);
    $cont->deleteFromDatabase($this->getPdo());
}
$sql="select * from tblcontentgroup;";
$listGroup = TblcontentgroupModel::findBySql($this->getPdo(), $sql);
$this->Theme()->registerData("listGroup", $listGroup);
$this->Theme()->Load("listGroup");