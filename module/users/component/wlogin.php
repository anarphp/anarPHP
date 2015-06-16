<?php
//echo "here2";
//$this=new mod_users();
if (!$this->getSecurity()->isLogin()) {
    $this->Theme()->Load("wlogin");
}//widget login
