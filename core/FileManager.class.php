<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Object Oriented impliment of Files and Directorys command.
 * This is help to manage better the files and directory
 * @author Mohsen ahmadian
 * @version 1.0
 */
class FileManager {

    /**
     *
     * @var boolean  
     */
    protected $error;

    /**
     * if upload/save file have Error this is true
     * @return boolean
     */
    public function isError() {
        return $this->error;
    }

    /**
     * Check file type is image and filesize < 900000
     * @param array $FileInfo
     * @return boolean
     */
    private function IsImage($FileInfo) {
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $FileInfo["name"]);
        $extension = end($temp);
        if ((($FileInfo["type"] == "image/gif") || ($FileInfo["type"] == "image/jpeg") ||
                ($FileInfo["type"] == "image/jpg") || ($FileInfo["type"] == "image/pjpeg") ||
                ($FileInfo["type"] == "image/x-png") || ($FileInfo["type"] == "image/png")) &&
                ($FileInfo["size"] < 900000) && in_array($extension, $allowedExts)) {
            return true;
        }
        return false;
    }

    /**
     * Save File to target path
     * FileInfo must uploaded array
     * @param array $FileInfo
     * @param string $target
     * @param string $randomName add uniq ID to file name default is True
     * @return string realative path with filename
     * 
     */
    public function SaveImageUpload($FileInfo, $target, $randomName = TRUE) {
        $this->error = false;
        if (!$this->IsImage($FileInfo)) {
            $this->error = true;
            return "فایل عکس ارسال کنید و یا عکس را کم حجم کنید!";
        }
        if ($FileInfo["error"] > 0) {
            $this->error = true;
            return "کد خطا: " . $FileInfo["error"] . "<br>";
        } else {
            $uniqid = "";
            if ($randomName) {
                $uniqid = uniqid("img");
            }
            if (file_exists("$target/$uniqid{$FileInfo['name']}")) {
                $this->error = true;
                return $FileInfo["name"] . "از قبل وجود دارد. ";
            } else {
                move_uploaded_file($FileInfo["tmp_name"], "$target/$uniqid" . $FileInfo["name"]);
                return "$target/$uniqid{$FileInfo["name"]}";
            }
        }
    }

    /**
     * Delete file
     * @param string $filename File name has been deleted
     */
    public function DelFile($filename) {
        if (is_dir($filename)) {
            $this->error = !rmdir($filename);
        } else {
            $this->error = !unlink($filename);
        }
    }

    /**
     * 
     * @param array $FileInfo array of fileInfo
     * @param string $target pathe to Save file
     * @return string filename when success OR Error message 
     */
    public function SaveUpload($FileInfo, $target,$overWrite=FALSE,$randomName=FALSE) {
        $this->error = false;
        if ($FileInfo["error"] > 0) {
            $this->error = true;
            return "کد خطا: " . $FileInfo["error"] . "<br>";
        } else {
            $uniqid = "";
            if ($randomName) {
                $uniqid = uniqid("userFile");
            }
            if (file_exists("$target/$uniqid{$FileInfo['name']}") && !$overWrite) {
                $this->error = true;
                return $FileInfo["name"] . "از قبل وجود دارد. ";
            } else {
                move_uploaded_file($FileInfo["tmp_name"], "$target/$uniqid" . $FileInfo["name"]);
                return "$target/$uniqid{$FileInfo["name"]}";
            }
        }
    }
    
   
    /**
     * Rename File or Folder
     * @param string $oldName Old Name must have full path of file
     * @param string $newName  New Name of file or folder
     */
    public function RenFile($oldName, $newName) {
        $this->error = !rename($oldName, $newName);
    }

    /**
     * Make Directory
     * @param string $dname
     */
    public function MakeDir($dname) {
        $this->error = !mkdir($dname);
    }

    /**
     * Move file or Directory
     * @param string $oldName orgin path of file
     * @param string $newName new path of file has been moved
     */
    public function MoveFile($oldName, $newName) {
        $this->error = !rename($oldName, $newName);
    }

    /**
     * Detect File Type
     * @param string $fileName full path of file
     * @return string
     */
    public function DetectMIME($fileName) {
        $ext = strstr($fileName, ".");
        switch ($ext) {
            case ".gif":
            case ".png":
            case ".jpg":
            case ".jpeg":
            case ".bmp":
                return "IMAGE";
            case ".doc":
            case ".docx":
            case ".pdf":
                return "DOCUMENT";
            case ".flv":
            case ".mp4":
            case ".mpeg":
                return "VIDEO";
            case ".html":
            case ".htm":
                return "HTML";
            case ".txt":
                return "TEXT";
            default:
                return "UNKNOW";
        }
    }

    /**
     * List of all files and folder
     * @param string $dir
     * @return \FileInfo
     */
    public function ListAll($dir) {
        $handle = opendir($dir);
        $data = array();

        while ($stylesheet = readdir($handle)) {
            //echo $stylesheet."<br/>";
            if (is_dir($dir . '/' . $stylesheet)) {
                $fdata = new FileInfo($stylesheet);
                $fdata->setFile(0);
                $data[] = $fdata;
            } else {
                $fdata = new FileInfo($stylesheet);
                $fdata->setFile(1);
                $fdata->setMiMe($this->DetectMIME($stylesheet));
                $fdata->setFileSize(filesize($dir . '/' . $stylesheet));
                $data[] = $fdata;
            }
        }
        closedir($handle);
        return $data;
    }

    protected function SendHeadFile($filename, $filesize) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . $filesize);
    }

    /**
     * Send file to user to download
     * Header must not send this function send it.
     * @param string $filepath  path of file or URL of file
     * @param string $filename  name of file
     * @param string $algorithm  local/curl/remote
     * @param string $sendHead true if you want to send header automaticaly
     * @return binary get file content from remote if sendHead is false
     */
    public function DownloadFile($filepath, $filename, $algorithm = "local", $sendHead = true) {
        if ($algorithm == "local") {
            if (file_exists($filepath)) {
                $this->SendHeadFile($filename, filesize($filepath));
                readfile($filepath);
                exit;
            }
        } else if ($algorithm == "curl") {
            if ($sendHead) {
                $this->SendHeadFile($filename, $this->get_file_size($filepath));
            }
            $c = curl_init();
            curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($c, CURLOPT_URL, $filepath);
            $contents = curl_exec($c);
            curl_close($c);
            if ($sendHead) {
                echo $contents;
            } else {
                return $contents;
            }
        } else if ($algorithm == "remote") {
            if ($sendHead) {
                $this->SendHeadFile($filename, $this->get_file_size($filepath));
            }
            $content="";
            if (ini_get('open_basedir') || ini_get('safe_mode')) {
                $ch = curl_init($filepath);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $Rurl = $this->get_Real_url($ch);
                curl_close($ch);
                $content = file_get_contents($Rurl);
            } else {
                $content = file_get_contents($filepath);
            }
            if ($sendHead) {
                echo $content;
            } else {
                return $content;
            }
        }
    }

    protected function get_Real_url(/* resource */ &$ch, /* int */ $redirects = 20, /* bool */ $curlopt_header = false) {

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, false);

        do {
            $data = curl_exec($ch);
            if (curl_errno($ch)) {
                break;
            }
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($code != 301 && $code != 302) {
                break;
            }
            $header_start = strpos($data, "\r\n") + 2;
            $headers = substr($data, $header_start, strpos($data, "\r\n\r\n", $header_start) + 2 - $header_start);
            if (!preg_match("!\r\n(?:Location|URI): *(.*?) *\r\n!", $headers, $matches)) {
                break;
            }
            if ($this->fileName($matches[1])) {
                return $matches[1];
            }
            curl_setopt($ch, CURLOPT_URL, $matches[1]);
        } while (--$redirects);
        if (!$redirects)
            trigger_error('Too many redirects. When following redirects, libcurl hit the maximum amount.', E_USER_WARNING);
        if (!$curlopt_header)
            $data = substr($data, strpos($data, "\r\n\r\n") + 4);
        return $data;
    }

    protected function fileName($url) {
        $base = basename($url);
        $i = strripos($base, ".");
        $len = strlen($base);
        if ($len - $i == 4) {
            return true;
        }
        return false;
    }

    /**
     * Returns the size of a file without downloading it, or -1 if the file
     * size could not be determined.
     *
     * @param $url - The location of the remote file to download. Cannot
     * be null or empty.
     *
     * @return The size of the file referenced by $url, or -1 if the size
     * could not be determined.
     */
    function get_file_size($url) {
        // Assume failure.
        $result = -1;
        $Rurl = $url;
        if (ini_get('open_basedir') || ini_get('safe_mode')) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $Rurl = $this->get_Real_url($ch);
            curl_close($ch);            
        }
        $curl = curl_init($Rurl);

        // Issue a HEAD request and follow any redirects.
        curl_setopt($curl, CURLOPT_NOBODY, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if (ini_get('open_basedir') || ini_get('safe_mode')) {
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
        } else {
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        }
        $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
        curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);

        $data = curl_exec($curl);
        curl_close($curl);

        if ($data) {
            $content_length = "unknown";
            $status = "unknown";

            if (preg_match("/^HTTP\/1\.[01] (\d\d\d)/", $data, $matches)) {
                $status = (int) $matches[1];
            }

            if (preg_match("/Content-Length: (\d+)/", $data, $matches)) {
                $content_length = (int) $matches[1];
            }

            // http://en.wikipedia.org/wiki/List_of_HTTP_status_codes
            if ($status == 200 || ($status > 300 && $status <= 308)) {
                $result = $content_length;
            }
        }

        return $result;
    }

}
