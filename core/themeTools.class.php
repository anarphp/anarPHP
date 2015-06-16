<?php

/**
 *  <h1>themeTools</h1>
 *  Tools for working by Theme
 * <p>History</p>
 * <ul>
 *   <li> Detect http(s) in printCss and printJS </li>
 *   <li> Document Complete</li>
 *   <li> add Plugin to theme tools </li>
 *   <li> add media to css  </li>
 *   <li> default media css set to all device  </li>
 * </ul>
 * @author mohsen.Ahmadian :)
 * @version 1.1.3 2015/02/26
 */
class themeTools {
    //put your code here
    protected $theme;
    protected $dir;
    protected $css;
    protected $js;
    protected $plugin;    
    /**
     * Create instance of themeTools
     * @param themeManager $theme them to tools
     * @param string $dir Theme Path
     */
    function __construct($theme,$dir="") {
        $this->theme = $theme;
        $this->dir = $dir;
        $this->css = array();
        $this->js = array ();
        $this->plugin= array();
    }

    /**
     * add virtual Css path to correct with Theme Path     
     * @param string $cssfile virtual css path
     * @param string $media set media type of css, default is all device
     */
    public function addCss($cssfile,$media="any"){
        $this->css[] = $cssfile."|".$media;
    }
    
     /**
     *  add virtual javascript file path to correct
     * @param string $Jsfile virtual javscript file path
     */
    public function addJs($Jsfile){
        $this->js[] = $Jsfile;
    }
    /**
     * Plugin is php file to add css, js or both.
     *  exactly plugin can process any data 
     * @param string $plugin plugin path
     */
    public function addPlugin($plugin){
        $this->plugin[] = $plugin;
    }
    
    /**
     * Print all Css with true path
     * Detect http(s)://  and only print href (don't change)
     */
    public function printCss(){
        foreach ($this->css as $css) {
            $cssArray=  explode("|", $css);
            $cssPath=$cssArray[0];
            $media="";
            if ($cssArray[1]!="any"){                            
              $media="media='{$cssArray[1]}'";
            }
            if (strpos($cssPath, "http://")===0 || strpos($cssPath, "https://")===0){
                 echo "<link rel='stylesheet' type='text/css' href='$cssPath' $media /> "; 
            }else{
                 echo "<link rel='stylesheet' type='text/css' href='theme/{$this->theme}/$cssPath' $media /> "; 
            }
          
        }     
    }
    /**
     * execute plugin and Print result
     * all plugin in queue
     */
    public function printPlugin(){
        foreach ($this->plugin as $plugin) {
            ob_start();
            include $plugin;  //execute plugin
            $result = ob_get_clean();
            echo $result; 
        }
    }

    /**
     * Correct virtual file path with true path
     * @param string $filepath virtual file path
     * @return string true path of file 
     */
    public function ThemePath($filepath){
        return "theme/{$this->theme}/$filepath";
    }
    /**
     * Print correct file path of virtual Path
     * @param string $filepath virtual file path
     */
    public function PrintThemePath($filepath){
        echo "theme/{$this->theme}/$filepath";
    }
    
    /**
     * Print all javascript with true path
     * Detect http(s)://  and only print href (don't change)
     */
    public function printJs(){
        foreach ($this->js as $js) {
            if (strpos($js, "http://")===0 || strpos($js, "https://")===0){
                echo "<script type='text/javascript' src='$js'></script>";
            }else{
                echo "<script type='text/javascript' src='theme/{$this->theme}/$js'></script>";
            }
            
        }        
    }
    /**
     * get Theme manager
     * @return themeManager
     */
    public function getTheme() {
        return $this->theme;
    }

    /**
     * set thememanager
     * @param themeManager $theme
     */
    public function setTheme($theme) {
        $this->theme = $theme;
    }
    /**
     * Set  path of Theme
     * @param string $dir
     */
    public function setDir($dir) {
        $this->dir = $dir;
    }


}
