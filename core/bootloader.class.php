<?php
class bootloader {

    protected $GET;
    protected $defaultModule;
    protected $defaultComponent;
    
    /**
     * get list of modules
     * @return string
     */
    public function GetModules() {
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
    
    function __construct() {
        $this->GET=filter_input_array(INPUT_GET);
    }
    
    /**
     * load module and component from Get string 
     * example: index.php?mod=moduleName&com=ComponentName
     * if mod and get not seted defaultmodule and default component loaded.
     * @return moduleBase
     */
    public function bootLoad() {
        $mod = isset($this->GET['mod']) ? htmlspecialchars($this->GET['mod']) : $this->defaultModule; //index.php
        $component = htmlspecialchars(isset($this->GET['com']) ? $this->GET['com'] : $this->defaultComponent); 

        $mod = "mod_" . $mod;
        $module = new $mod; 
        $module->setComponent($component);
        $module->setActive(TRUE); //active to find him
        return $module;
    }

    public function getGet() {
        return $this->GET;
    }

    public function setGet($Get) {
        $this->GET = $Get;
    }
    public function getDefaultModule() {
        return $this->defaultModule;
    }

    public function getDefaultComponent() {
        return $this->defaultComponent;
    }

    public function setDefaultModule($defaultModule) {
        $this->defaultModule = $defaultModule;
    }

    public function setDefaultComponent($defaultComponent) {
        $this->defaultComponent = $defaultComponent;
    }



}

?>
