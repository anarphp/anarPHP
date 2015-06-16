<?php

/**
 * Description of mod_content
 *
 * @author M&M
 */
class mod_content extends moduleBase {
    
    
    protected function loader($className) {
        parent::loader($className);
        // if you have private library for this module, load it directly
       // spl_autoload_register(array($this,'loader'));
    }
    
    public function __construct() {
        parent::__construct();
         $this->priority=1; 
         $this->setName("content");
         $this->setDir(__DIR__);
    }

        
    public function HeadPrint() {
        switch ($this->component){
             case "add":
                 include "headplugin/add.php";
                 break;   
             default :
                 $this->defaultHeadPlugin();
         }
    }

    public function beadcrumbs() {
        
    }

    public function footerPrint() {
        
    }

    public function modPrint() {
         /*switch ($this->component){
             case "add":
                 include "component/add.php";
                 break;
             case "list":
                 include 'component/list.php';
                 break;
             case "del":
                 include 'component/del.php';  
                 break;
             case "article":
                 include 'component/article.php';
                 break;
             case "news":
                 include 'component/news.php';
                 break;
             case "contact":
                 include 'component/contact.php';
                 break;
             default :
                 $this->defaultPrint();
         }*/
        $this->defaultPrint();
    }

    public function plugin() {
       
    }

    public function rightMenu() {
         //include 'component/rightmenu.php';
        $this->defaultRightMenu();
    }

    public function topMenu() {
        
    }
}
