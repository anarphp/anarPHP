<?php

class mod_main extends moduleBase {
    
    
    function __construct() {
        parent::__construct();
        $this->setDir(__DIR__);
        $this->setName("main");
        $this->setPriority(1);        
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
        
    }

    public function topMenu() {
        
    }

}

