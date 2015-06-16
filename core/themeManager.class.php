<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of themeManager
 *
 * @author Mohsen
 */
class themeManager {
    
    protected $module;
    protected $component;
    protected $theme;
    protected $control;
    protected $data;
    protected $dir;
    /**
     *
     * @var themeTools 
     */
    protected $themeTools;
    /**
     * 
     * @param string $module Module name
     * @param tring $theme Theme name
     */
    function __construct($module, $theme="default") {
        $this->module = $module;
        $this->theme = $theme;
        $this->data =  array();
        $this->themeTools =new themeTools($theme);
    }
    /**
     * 
     * @param string $component component name
     * @param moduleBase $control module Controller
     */
    public function Load($component,$control=null){
        if ($control!=null){
            $this->control=$control;
        }
        include "./theme/{$this->theme}/module/{$this->module}/$component.php";
    }
    /**
     * Only render component and return rendered to display
     * @param string $component component name
     * @param moduleBase $control module Sended to theme
     * @return string Renderd Component
     */
    public function Render($component,$control=null){
        if ($control!=null){
            $this->control=$control;
        }
        ob_start();
        include "./theme/{$this->theme}/module/{$this->module}/$component.php";
        $result= ob_get_clean();
        return $result;
    }
    
    /**
     * load main file of skin
     * @param string $layoutName default is index.php
     */
    public function loadLayout($layoutName="index.php"){
        if ($this->dir != "") {
            include $this->dir . "/theme/{$this->theme}/$layoutName";
        } else {
            include "./theme/{$this->theme}/$layoutName";
        }
    }
    /**
     * set theme dir
     * @param type $dir
     */
    public function setDir($dir) {
        $this->dir = $dir;
        $this->themeTools->setDir($dir);
    }
    /**
     * to Send data to theme mus be register in theme
     * @param string $name name of registered variable
     * @param object $data any type of data
     */
    public function registerData($name,$data){
        $this->data[$name]=$data;
    }
    /**
     * load registered Data from theme
     * @param string $name name of variable
     * @return object any type of data
     */
    public function loadData($name){
        return $this->data[$name];
    }
    /**
     * Theme tools
     * @return themeTools
     */
    public function Tools(){
        return $this->themeTools;
    }
    /**
     * get Control Of View
     * @return moduleBase Control of View
     */
    public function getControl(){
        return $this->control;
    }
}
