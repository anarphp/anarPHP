<?php
//$this=new mod_users();
$security=$this->getSecurity();
$security->logOut();
$this->Theme()->Load("logout");

