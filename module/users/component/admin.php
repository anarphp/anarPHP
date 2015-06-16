<?php
//$this=new mod_users();
$security = $this->getSecurity();
$canlogin = false;
if ($this->getSend() == 1) {    
    $username = $this->readPost("username"); 
    $pass = $this->readPost("password"); 
    $user = new TbluserModel();
    $user->setUsername($username);
    $findByExample = TbluserModel::findByExample($this->getPdo(), $user);
    if ($findByExample != NULL && count($findByExample) > 0) {
        $user = $findByExample[0];
        if ($pass == $user->getPassword()) {           
            $security->login($user->getId());
            if ($user->getAdmin()) {
                $security->AdminLogin();
                 $canlogin = true;
            }
        }
    }
}

$this->Theme()->registerData("canlogin", $canlogin);
$this->Theme()->Load("adminLogin", $this);
