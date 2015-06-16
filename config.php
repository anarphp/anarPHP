<?php
//-------------- DB config -----------
define("HOST", "localhost");
define("user", "root");
define("password", "");
define("DB", "databasename");
define("port", "3306");
//-----------------------------------------------
//------EMAIL - Config -------
/**
 * Address of email example : no-replay@myhost.ir
 */
define("EMAILADDRESS", "no-replay@domain.ir");
/**
 * in Some host this is equal email address
 */
define("EMAILUSERNAME", "no-replay@domain.ir");
/**
 * password of email address
 */
define("EMAILPASS", "emailpass");
/**
 *  Name of your account. this is show in <from column> inbox of user 
 */
define("EMAILNAME", "domain.ir");
/**
 * Host address of your email address example: mail.myhost.com
 */
define("EMAILHOST", "mail.domain.ir");

/**
  * Anar framework loader
  * @param string $name className
  */
function my_autoload($name) {
    //Core load
    if (is_file("core/$name.class.php")){
        require "core/$name.class.php";
    }
    //lib load
    else  if (is_file("lib/$name.class.php")){
        require "lib/$name.class.php";
    }
    //module load
    else if (strstr($name, "mod")){
        $strpos = strpos($name, "_");
        if ($strpos>0){
            $modname = substr($name, $strpos+1);
            require_once "module/$modname/$name.class.php";
        }
    }
}
spl_autoload_register("my_autoload");
/*
 * Excel Reader Plugin
 */
if (!defined('PHPEXCEL_ROOT')) {
	/**
	 * @ignore
	 */
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/lib/');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}