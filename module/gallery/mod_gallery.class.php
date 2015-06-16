<?php

class mod_gallery extends moduleBase {
    
    
    function __construct() {
        parent::__construct();
        $this->setDir(__DIR__);
        $this->setName("gallery");
        $this->setPriority(4);        
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

}

