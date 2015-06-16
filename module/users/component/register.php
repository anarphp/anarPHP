<?php

//$this=new mod_users();
$this->addTitle("ثبت نام و یا ورود کاربر");
$captcha = new ResponsiveCaptcha();
$security = $this->getSecurity();
if ($this->getSend() > 0) {
    $status = $this->readPost("status");
    //echo $status;
    $username = $this->readPost("username");
    $password = $this->readPost("password");
    $answer = $this->readPost("captcha");
    $human = FALSE;
    if ($status == "ret" || $status == "new") {
        $human = $captcha->checkAnswer($answer);
    } else if ($status == "widget") {
        $human = TRUE;
    }
    if ($human) {
        if ($status == "widget" || $status == "ret") {
            $example = new TbluserModel();
            if (strpos($username, "@") > 0) {
                $example->setUsername($username);
            } else {
                $example->setMobile($username);
            }

            if ($password != "") {
                $example->setPassword($password);
            }
            $users = TbluserModel::findByExample($this->getPdo(), $example);
            if (!is_array($users) && count($users) > 0) {
                return;
            }

            $security->login($users[0]->getId());
        } else if ($status == "new") {
            $newuser = new TbluserModel();
            $newuser->setFullName($this->readPost("fullname"));
            if (strpos($username, "@") > 0) {
                $newuser->setUsername($username);
            } else {
                $newuser->setMobile($username);
            }
            $newuser->setAdmin(0);
            $newuser->setPassword($password);
            $in = $newuser->insertIntoDatabase($this->getPdo());
            $security->login($newuser->getId());
        }
    }
}

if ($security->isLogin()) {
    $this->Theme()->Load("welcome");
} else {
    $this->Theme()->registerData("captcha", $captcha);
    $this->Theme()->Load("register");
}

