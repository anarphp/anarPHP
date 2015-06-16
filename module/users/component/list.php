<?php
//$this=new mod_users();
$sql="select * from tbluser where `admin`=0;";
$allUsers=  TbluserModel::findBySql($this->getPdo(), $sql);
$this->Theme()->registerData("allUsers", $allUsers);
$this->Theme()->load("list");

