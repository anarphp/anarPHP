<?php

$data = array();
$data[1] = "first";
$data[2] = "two";
$data[3] = "three";

//$this=new mod_main();
$this->setTitle("- Say Hello");
$this->Theme()->registerData("dt", $data);
$this->Theme()->Load("first", $this);
?>
