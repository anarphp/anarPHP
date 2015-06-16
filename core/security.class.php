<?php

/**
 * Description of security
 *
 * @author Mohsen
 */
//error_reporting(E_ALL);
//ini_set('display_errors', true);
class security {

    private $start;
    private $MyKEY = "\xc8\xd9\xb9\x06\xd9\xe8\xc9\xd2";

    function encrypt($str, $key) {
        # Add PKCS7 padding.
        //$key=$this->MyKEY;
        $block = mcrypt_get_block_size('des', 'ecb');
        if (($pad = $block - (strlen($str) % $block)) < $block) {
            $str .= str_repeat(chr($pad), $pad);
        }
        
        return mcrypt_encrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);
    }

    function decrypt($str, $key) {
        //$key=$this->MyKEY;
        $str = mcrypt_decrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);

        # Strip padding out.
        $block = mcrypt_get_block_size('des', 'ecb');
        $pad = ord($str[($len = strlen($str)) - 1]);
        if ($pad && $pad < $block && preg_match(
                        '/' . chr($pad) . '{' . $pad . '}$/', $str
                )
        ) {
            return substr($str, 0, strlen($str) - $pad);
        }
        return $str;
    }

     function encrypt_url($string) {
        $key = "MAL_979805"; //key to encrypt and decrypts.
        $result = '';
        $test = "";
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));

            $test[$char] = ord($char) + ord($keychar);
            $result.=$char;
        }

        return urlencode(base64_encode($result));
    }

    function decrypt_url($string) {
        $key = "MAL_979805"; //key to encrypt and decrypts.
        $result = '';
        $string = base64_decode(urldecode($string));
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result.=$char;
        }
        return $result;
    }

    function generateRandomString($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
    
    function __construct() {
        // session_save_path("session");
        //if (session_status() == PHP_SESSION_ACTIVE) {
        if (session_id()!=""){
            return;
        }
        $this->start = session_start();
        if ($this->start) {

            //echo "No Start";
        } else {
            //echo "Save Path= ".session_save_path()."<br/>";
            //echo "result :".is_writable(session_save_path())."<br/>";
            //print_r($_SESSION);
            // echo "Started";
        }
    }

    public function login($user) {
//        if (!$this->start) {
//            setcookie("userId", md5($user));
//            setcookie('Login', md5('Yes'));
//        }
        $_SESSION["userId"] = $user;
        $_SESSION["Login"] = "Yes";
    }

    public function AdminLogin() {
        $_SESSION["admin"] = "Yes";
    }

    public function isAdmin() {
        if (!isset($_SESSION["admin"])) {
            return FALSE;
        }
        if ($_SESSION["admin"] == "Yes")
            return TRUE;
        else
            return FALSE;
    }

    public function isLogin() {
        //echo "Login :".$_SESSION['Login'];
        if (!isset($_SESSION["Login"])) {
            return FALSE;
        }
        if ($_SESSION["Login"] == "Yes")
            return TRUE;
        else
            return FALSE;
    }

    public function logOut() {
        $_SESSION["userId"] = 0;
        $_SESSION["Login"] = "No";
        $_SESSION["admin"] = "No";
        session_destroy();
        return true;
    }

    public function Error() {
        return "<h1>خطا</h1>" . "<p>ورود شما منقضی گشته است. جهت ادامه بر روی لینک زیر کلیک کنید.</p>"
                . "<p style='text-align:center'><a href='login.php'>صفحه ورود</a></p>";
    }
    public function HeadLogin(){
        header("location:login.php");
    }
    public function ScriptLogin(){
        $str="<script>window.location.assign('index.php?mod=users&com=login'); </script>";
    }

    public function getUserId() {
        if (!isset($_SESSION["Login"])) {
            return 0;
        }
        if ($_SESSION["Login"] == "Yes")
            return $_SESSION["userId"];
        else
            return 0;
    }

}

?>
