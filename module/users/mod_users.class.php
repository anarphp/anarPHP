<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mod_users
 *
 * @author Mohsen
 */
class mod_users extends moduleBase {
    
    public function __construct() {
        parent::__construct();
        $this->setDir(__DIR__);
        $this->setName("users");
        $this->setPriority(8);
    }

    
    public function HeadPrint() {
        
    }

    public function beadcrumbs() {
        
    }

    public function footerPrint() {
        
    }

    public function modPrint() {
        $this->defaultPrint();
    }

    public function plugin() {
        
    }

    public function rightMenu() {
        $this->defaultRightMenu();
    }

    public function topMenu() {
        
    }

//put your code here
}
