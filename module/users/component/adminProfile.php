<?php

//$this=new mod_users();
$this->CanDo("admin");
$userId = $this->getSecurity()->getUserId();
$user = TbluserModel::findById($this->getPdo(), $userId);
$msg = "";
if ($this->getSend() > 0) {
    $oldpass = $this->readPost("oldPass");
    if ($oldpass == $user->getPassword()) {
        $neuPass = trim($this->readPost("neuPass"));
        $confirm = trim($this->readPost("confirm"));
        if ($neuPass != "" && $confirm == $neuPass) {
            $user->setPassword($neuPass);
            $msg = "<li class='list-group-item list-group-item-warning'>رمز عبور تغییر کرد</li>";
        } else {
            $msg = "<li class='list-group-item list-group-item-warning'>رمز عبور تغییر نکرد</li>";
        }
        $user->setEmail($this->readPost("email"));
        $user->setFullName($this->readPost("fullname"));
        $user->setMobile($this->readPost("mobile"));
        $user->setUsername($this->readPost("username"));
        $updateToDatabase = $user->updateToDatabase($this->getPdo());
        if ($updateToDatabase > 0) {
            $msg = $msg."<li class='list-group-item list-group-item-success'>با موفقیت بروز شد</li>";
        }
    } else {
        $msg = "<li class='list-group-item list-group-item-danger'>رمز عبور قبلی صحیح نمی باشد</li>";
    }
}
$this->Theme()->registerData("user", $user);
$this->Theme()->registerData("msg", $msg);
$this->Theme()->Load("admin");


