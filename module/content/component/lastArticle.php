<?php

//$this=new mod_content();
$last = TblcontentModel::findBySql($this->getPdo(), "SELECT * FROM tblcontent WHERE position LIKE '%article%' LIMIT 3");
$this->Theme()->registerData("last", $last);
$this->Theme()->load("lastArticle");


