<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of temp
 *
 * @author Mohsen
 */
class emailTemplate {
    //put your code here
    protected $content;
    protected $altContent;
    protected $subject;
    
    function __construct($content, $altContent, $subject) {
        $this->content = $content;
        $this->altContent = $altContent;
        $this->subject = $subject;
    }
    public function getContent() {
        return $this->content;
    }

    public function getAltContent() {
        return $this->altContent;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setAltContent($altContent) {
        $this->altContent = $altContent;
    }

    public function setSubject($subject) {
        $this->subject = $subject;
    }



}
