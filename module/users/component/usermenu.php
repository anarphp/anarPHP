<?php

//$this=new mod_users();
$logedin = $this->getSecurity()->isLogin();
$this->Theme()->registerData("logedin", $logedin);
$this->Theme()->Load("menu");
