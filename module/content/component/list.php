<?php

$this->CanDo("admin");
$allContent = TblcontentModel::findBySql($this->getPdo(), "SELECT * FROM tblcontent");
$this->Theme()->registerData("allContent", $allContent);
$this->Theme()->Load("list", $this);
