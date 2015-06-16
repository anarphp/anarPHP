<?php

$sql="select * from tblgallery";
$allGallery = TblgalleryModel::findBySql($this->getPdo(), $sql);
$this->Theme()->registerData("allGallery",$allGallery);
$this->Theme()->load("list");