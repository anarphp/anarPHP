<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FileInfo
 *
 * @author Mohsen
 */
class FileInfo {
    protected $fileName;
    protected $fileSize;
    protected $file;
    protected $MiMe;
    function __construct($fileName) {
        $this->fileName = $fileName;        
    }
    public function getFileName() {
        return $this->fileName;
    }

    public function getFileSize() {
        return $this->fileSize;
    }

    public function isFile() {
        return $this->file;
    }

    public function getMiMe() {
        return $this->MiMe;
    }

    public function setFileName($fileName) {
        $this->fileName = $fileName;
    }

    public function setFileSize($fileSize) {
        $this->fileSize = $fileSize;
    }

    public function setFile($file) {
        $this->file = $file;
    }

    public function setMiMe($MiMe) {
        $this->MiMe = $MiMe;
    }


}
