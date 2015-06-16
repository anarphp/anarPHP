<?php
//$this=new mod_users();
$id=$this->getSecurity()->getUserId();
$this->addTitle("پروفایل کاربر");
if ($id>0){
    $user=  TbluserModel::findById($this->getPdo(), $id);
    $this->Theme()->registerData("user", $user);
    $this->Theme()->Load("profile");
}

