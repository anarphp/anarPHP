<?php
//$this=new mod_users();
$id=$this->readIntPost("id");
if ($id>0){
    $user=  TbluserModel::findById($this->getPdo(), $id);
    if ($user!=NULL){
        $user->deleteFromDatabase($this->getPdo());
    }
}
$sql="select * from tbluser where `admin`=0;";
$allUsers=  TbluserModel::findBySql($this->getPdo(), $sql);
$this->Theme()->registerData("allUsers", $allUsers);
$this->Theme()->load("list");
