<?php


/**
 * Description of moduleManager
 *
 * @author mohsen
 */
class moduleManager {
   /**
    * array of moduleBase
    * @var array of moduleBase
    */
    private $moduleArray;
    
    public function GetModulesNames() {
        $temp = array();
        $dirh = opendir("./module");
        if ($dirh) {
            $i = 0;
            while (($dirElement = readdir($dirh)) !== false) {
                if ($dirElement != '.' && $dirElement != '..') {
                    $temp[$i] = "mod_".$dirElement;
                    $i++;
                }
            }
            closedir($dirh);
        }
        return $temp;
    }
    
    private function  ReadModules(){
        $modules = $this->GetModulesNames();
        $this->moduleArray=array();
        $i=0;
        foreach ($modules as $modl) {
            $tmp=new $modl;
            $tmp->setThemeName("admin");
            $this->moduleArray[$i]=$tmp;     
            $i++;
        }
    }
    public static function Comp($a , $b){                
        if ($a->getPriority() == $b->getPriority()) {
            return 0;
        } else if (($a->getPriority() < $b->getPriority())) {
            return -1;
        } else {
            return 1;
        }
    }
    public function SortbyPriority(){
        usort($this->moduleArray, array("moduleManager","Comp"));
    }
    /**
     * get array of moduleBase Sorted by Pirority
     * @return array
     */
    public function getModulesSorted(){
        $this->ReadModules();
        $this->SortbyPriority();
        return $this->moduleArray;
    }
    /**
     * array of moduleBase
     * @return array
     */
    public function getModules(){
        $this->ReadModules();       
        return $this->moduleArray;
    }
    
}
