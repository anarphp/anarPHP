<?php
require './config.php';
$security=new security();
$security->logOut();
header("location:admin.php");