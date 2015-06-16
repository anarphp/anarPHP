<?php
//$this=new mod_content();
$captcha = new ResponsiveCaptcha();
$msg = "";
$msgtype="";
$setting=new setting($this->getPdo());
if ($this->getSend()) {
    try {
        
        $answer = $this->readPost("answer");
        if ($captcha->checkAnswer($answer)) {
            
            $mtools = new MailTools($this->getPdo());
            $name = $this->readPost("fullname");
            $mail = $this->readPost("email");
            $body = "درخواست کننده :$name<br/>پست الکترونیک : $mail <br/> متن پیام : <br/> " . $this->readPost("message");
            //"Seyed_majed@yahoo.com"
            $mtools->Send($setting->Read("contactus"), "از تماس با ما سایت ارسال می شود"."-".$this->readPost("subject"), $body, "");
            $msg = "با موفقیت ارسال شد";
            $msgtype = "alert-success";
        }
    } catch (Exception $exc) {
         $msg = "جواب سوال امنیتی را اشتباه وارد نموده اید";
            $msgtype = "alert-danger";
    }

}

$this->addTitle("تماس با ما");
$this->Theme()->registerData("msg",$msg);
$this->Theme()->registerData("setting",$setting);
$this->Theme()->registerData("msgType",$msgtype);
$this->Theme()->Load("contact");


