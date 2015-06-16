<?php
//$this= new mod_users();
$this->CanDo("admin");
$setting=new setting($this->getPdo());
if ($this->getSend()>0){  
   $setting->Save("contactus", $this->readPost("contactus"));   
   $setting->Save("slogan", $this->readPost("slogan"));   
   $setting->Save("aboutus", $this->readPost("aboutus"));   
   $setting->Save("address", $this->readPost("address"));   
   $setting->Save("tel", $this->readPost("tel"));   
   $setting->Save("email", $this->readPost("email"));   
   $setting->Save("slogans", $this->readPost("slogans"));   
   $setting->Save("limitTransfer", $this->readPost("limitTransfer"));   
}
$this->Theme()->registerData("setting",$setting);
$this->Theme()->load("setting");
