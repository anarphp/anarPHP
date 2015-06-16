<?php
//$this=new mod_users();

if ($this->getSecurity()->isLogin()){
    $this->addTitle("داشبورد کاربر");
    $this->Theme()->Load("welcome");
}else{
    $this->addTitle("ورود");
    $this->Theme()->Load("register");
}
?>
