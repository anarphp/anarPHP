<?php

/**
 * **read this Help to better usage**
 * <p>Base of any module in <b>Anar</b> framework. </p>
 * <p>to usage you must create __construct() and set below in this function </p>
 * <ul>
 * <li>dir: must use setDir to setting current directory</li>
 * <li>priority: must set to an Decimal to order in menu </li>
 * <li>Name: must setName to use in menu </li>
 * </ul>
 * <p>History</p>
 * <ul>
 *   <li>Add default printers(modprint,plugin,headplugin)</li>
 *   <li>Add security CanDo</li>
 *   <li>Add Theme manager</li>
 *   <li>Add Title array</li>
 *   <li>Asynchronous module</li>
 *   <li>Send Data to module</li>
 *   <li>Move Here</li>
 *   <li>LoadComponent</li>
 *   <li>Async_LoadComponent</li>
 *   <li>auto load lib correct</li>
 *   <li>fix Bug * readIntPost and readIntGet * convert to integer value automatic</li>
 *   <li>Hot fix: Prevent from SQL injection and script injection </li>
 *   <li>add move here without module and component</li>
 *   <li>add Role to default rightmenu,default is disable </li>
 *   <li>add Role to module</li>
 *   <li>get Theme name</li>
 *   <li>add other command to moveHere function</li>
 * </ul>
 * @author mohsen.Ahmadian :)
 * @version 1.1.13 2015/4/17
 */
abstract class moduleBase  implements Imodule {

    /**
     * array of Files
     * @var array 
     */
    protected $files;
    /**
     * name of module
     * @var String 
     */
    protected  $name;
    /**
     * array of post
     * @var array 
     */
    protected $Post;
    
    /**
     * array of Get
     * @var array 
     */
    protected $Get;

    /**
     * priority of module
     * @var integer
     */
    protected $priority;

    /**
     *
     * @var String
     * Component Name 
     */
    protected $component;

    /**
     *
     * @var integer
     *  readOnly 
     */
    protected $send;

    /**
     *
     * @var type boolean
     */
    protected $active;

    /**
     *
     * @var Security 
     */
    protected $security;

    /**
     * Directory 
     * @var string 
     */
    protected $dir;
    
    /**
     *
     * @var themeManager 
     */
    protected $themeManager;
    
    /**
     * Parent Theme Name
     * @var string 
     */
    protected $themeName;
    /**
     *
     * @var string 
     */
    protected $title;
    
    /**
     * Parrent of module
     * @var string 
     */
    protected $parrent;

    /**
     * Get Parrent of Module    
     * @return string name of parent
     */
    protected $data;
    
    /**
     * Role of user
     * @var string 
     */
    protected $role;
    
    public function getParrent() {
        return $this->parrent;
    }

    /**
     * <b> Can Do Security </b><br/>
     * check for parent of module if not True exit from module     
     * @param string $parent parrent Name example: admin
     */
    public function CanDo($parent) {
        // security :)
        if ($this->parrent != $parent . ".php") {
            flush();
            exit;
        }
    }
    /**
     * return Theme object
     * @return themeManager
     */
    public function Theme() {
        if ($this->themeManager==null){
            $this->themeManager=new themeManager($this->name,  $this->themeName); //Automated :)
        }
        return $this->themeManager;
    }
    
    /**
     * Set Parent Theme Name
     * @param string $themeName
     */
    public function setThemeName($themeName){
        $this->themeName=$themeName;
    }

    /**
     * get Parent Theme Name
     * @return string name of Theme
     */
    public function getThemeName(){
        return $this->themeName;
    }

    protected function loader($className) {
        require "{$this->dir}/lib/$className.class.php";
    }

    /**
     * Get PDO
     * @return PDO
     */
    public function getPdo() {
        $pdo = new PDO(
                'mysql:host=' . HOST . ';dbname=' . DB, user, password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));//;SET time_zone = '+03:30'
        return $pdo;
    }

    public function __construct() {
        $this->Post = filter_input_array(INPUT_POST);
        $this->Get =  filter_input_array(INPUT_GET);
        $this->title=array();
        $this->parrent = basename($_SERVER['PHP_SELF']);
        spl_autoload_register(array($this,'loader')); 
    }

    /**
     *  Read String Post
     * @param string $inputName
     * @param boolean $magicHack if you must get compelet string
     * @param boolean $dbSecurity Database security enabled
     * @return string
     */
    public function readPost($inputName , $magicHack=FALSE){//,$dbSecurity=TRUE) {
        if (isset($this->Post[$inputName])) {
            if ($magicHack){
                return $this->Post[$inputName]; // Hack self :D
            }            
            return htmlspecialchars($this->Post[$inputName],ENT_QUOTES,'UTF-8');//Security :)
        } else {
            return '';
        }
    }
    
    /**
     *  Read String Get
     * @param string $inputName
     * @return string
     */
    public function readGet($inputName) {
        if (isset($this->Get[$inputName])) {
            return htmlspecialchars($this->Get[$inputName]); //Security :)
        } else {
            return '';
        }
    }
    /**
     * Check for array receved
     * @param string $inputName
     * @return boolean
     */
    public function isArrayPost($inputName){
        if (is_array($this->Post[$inputName])){
            return true;
        }else{
            return false;
        }
    }
    /**
     * Read array type post
     * @param string $inputName
     * @return array
     */
    public function readArrayPost($inputName){
         if (isset($this->Post[$inputName])) {
            return $this->Post[$inputName]; 
        } else {
            return "";
        }
    }

    /**
     * 
     * @param String $inputName
     * @return boolean
     */
    public function isSetPost($inputName){
        if (isset($this->Post[$inputName])) {
            return TRUE;
        }else{
            return false;
        }
    }
    /**
     * 
     * @param String $inputName     
     * @return integer
     */
    public function readIntPost($inputName) {
        if (isset($this->Post[$inputName])) {
             return (int) htmlspecialchars($this->Post[$inputName]); //Security :)
        } else {
            return 0;
        }
    }

    /**
     * read int in Get 
     * @param String $inputName     
     * @return integer
     */
    public function readIntGet($inputName) {
        if (isset($this->Get[$inputName])) {
             return (int) htmlspecialchars($this->Get[$inputName]); //Security :)
        } else {
            return 0;
        }
    }
    protected function readSend() {
        $this->send = (isset($this->Post['send']) ? $this->Post['send'] : 0);
    }
    /**
     * Read checkBox with <b>yes</b> value
     * @param string $inputName input name
     * @return int
     */
    public function readBoolPost($inputName){
        if (isset($this->Post[$inputName])) {
            if (htmlspecialchars($this->Post[$inputName])=="yes"){
                //Security :)
                return 1;
            }            
        } 
            return 0;        
    }

    /**
     * Detect Active Component
     * @param String $cmpName 
     * @param boolean $echoActive 
     * @return boolean
     */
    public function IsActive($cmpName,$echoActive=FALSE){
        if ($cmpName==$this->component){
            if ($echoActive) {
                echo " class='active' ";
            }
            return true;
        }
        return false;
    }

    /**
     * check for uploaded file
     * @param string $inputName
     * @return boolean
     */
    public function isUploadFile($inputName){
        if (isset($this->files[$inputName])) {
            if ($this->files[$inputName]["error"] > 0) {
                return false;
            } else {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }
    /**
     * Get Fileinfo uploaded in array
     * @param string $inputName
     * @return array
     */
    public function getFile($inputName){
        if ($this->isUploadFile($inputName)){
            return $this->files[$inputName];
        }
    }
    /**
     * Get hidden value of send
     * @return integer
     * send=0 means form not sended
     * other wise return send value
     */
    public function getSend() {
        $this->readSend();
        return $this->send;
    }

    public function getComponent() {
        return $this->component;
    }

    public function setComponent($component) {
        $this->component = $component;
    }

    public function getPriority() {
        return $this->priority;
    }

    public function setPriority($priority) {
        $this->priority = $priority;
    }

    public function getPost() {
        return $this->Post;
    }

    public function setPost($Post) {
        $this->Post = $Post;
    }

    public function getSecurity() {
        $this->security=new security();
        return $this->security;
    }
    

    public function getActive() {
        return $this->active;
    }

    public function setActive($active) {
        $this->active = $active;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getFiles() {
        return $this->files;
    }

    public function setFiles($files) {
        $this->files = $files;
    }

    public function getGet() {
        return $this->Get;
    }

    public function setGet($Get) {
        $this->Get = $Get;
    }

    /**
     * return Directory of module
     * @return string
     */
    public function getDir() {
        return $this->dir;
    }

    /**
     * get role 
     * @return string role name
     */
    function getRole() {
        return $this->role;
    }

    /**
     * set role name
     * @param string $role role name
     */
    function setRole($role) {
        $this->role = $role;
    }
        
    /**
     * Setting current directory of module
     * @param string $dir
     */
    public function setDir($dir) {
        $this->dir = $dir;
    }
   
    /**
     * return Title of module
     * @return string
     */
    public function getTitle($n=-1) {
        if ($n<0){
           return implode("-", $this->title);  
        }
        return $this->title[$n];
    }

    /**
     * Set title of page
     * @param string $title
     */
    public function addTitle($title) {
        $this->title[] = $title;
    }
    /**
     * get Title array
     * @return array
     */
    public function getTitle_array(){
        return $this->title;
    }

    /**
     * set Title array
     * @param array $title
     */
    public function setTitle_array($title){
        $this->title=$title;
    }

    /**
     * merge two array of title 
     * @param array $title
     */
    public function append_title($title){
       $this->title = array_merge($this->title, $title);
    }

    /**
     * check component directory to test regular is component file <br>
     * security issue :)
     * @return boolean
     */
    public function isComponent(){
        $path = $this->getDir() . '/component/'.$this->getComponent().".php";
        if (is_file($path)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    /**
     *<p> Default module print <br/>
     *  in this method we call all components in <b>component</b> directory</p>
     *  <p style='color:red'>you must set dir before use it.</p>
     */
    protected function defaultPrint(){
        switch ($this->getComponent()) {            
            case "rightmenu":
                //do nothing  security :D
                break;
            default:
                if ($this->isComponent()) {
                    include $this->getDir() . '/component/' . $this->getComponent() . ".php"; //smart ;)
                }
                break;
        }
    }
    private function isFile($dir,$file){
       // echo $this->getDir() . "/$dir/$file.php";
        return is_file($this->getDir() . "/$dir/$file.php");
    }

    protected function defaultPlugin(){ 
        switch ($this->getComponent()) {            
            case "rightmenu":
                //do nothing  security :D
                break;
            default:
                if ($this->isFile("plugin", $this->getComponent())) {
                    include $this->getDir() . '/plugin/' . $this->getComponent() . ".php"; //smart ;)
                }
                break;
        }
    }
    
    /**
     * call plugins in head tag, componetnt need automaticaly
     * <p style='color:red'>you must set dir before use it.</p>
     */
    protected function defaultHeadPlugin() {
        switch ($this->getComponent()) {
            case "rightmenu":
                //do nothing  security :D
                break;
            default:
                if ($this->isFile("headplugin", $this->getComponent())) {
                    include $this->getDir() . '/headplugin/' . $this->getComponent() . ".php"; //smart ;)
                }
                break;
        }
    }
    
    public function PrintTitle($dele){
        $title="";        
        foreach ($this->title as $t) {
            $title.=$t."$dele";
        }
        echo "<script>document.title='$title'</script>";
    }
    
    public function defaultRightMenu($role=''){
        if ($role!=''){
           $this->Theme()->Load($role."."."rightmenu", $this);
        }else{
           $this->Theme()->Load("rightmenu", $this);
        }
    }    
    /**
     * Asynchronous module Print.execute modPrint and Return Compiled module to show.
     * @return string
     */
    public function Async_modPrint(){
        ob_start();
        $this->modPrint();
        $result= ob_get_clean();
        return $result;
    }
    /**
     * Asynchronous Head Print.execute HeadPrint and Return Compiled HeadPrint to show.
     * @return string
     */    
    public function Async_HeadPrint(){
        ob_start();
        $this->HeadPrint();
        $result= ob_get_clean();
        return $result;
    }
    /**
     * Asynchronous plugin.execute plugin and Return Compiled plugin to show.
     * @return string
     */    
    public function Async_plugin(){
        ob_start();
        $this->plugin();
        $result= ob_get_clean();
        return $result;
    }
    /**
     * Send Data to module
     * @param string $dataname
     * @param type $data
     */
    public function SendData($dataname,$data){
        if (!is_array($this->data)){
            $this->data=array();
            $this->data[$dataname]=$data;
        }else{
            $this->data[$dataname]=$data;
        }
    }
    /**
     * Read Data from Module that sended by SendData
     * if dataname not found return FALSE
     * @param string $dataname
     * @return boolean/type
     */
    public function readData($dataname){      
        try {
            return $this->data[$dataname];
        } catch (Exception $exc) {
            return FALSE;
        }
          
    }
    /**
     *  Load ( Call ) Other Component By Name
     * you can use this to call other component
     * @param string $comName Component Name
     */
    public function LoadComponet($comName){
         switch ($comName) {            
            case "rightmenu":
                //do nothing  security :D
                break;
            default:
                if ($this->isComponent()) {
                    include $this->getDir() . '/component/' . $comName . ".php"; //smart ;)
                }
                break;
        }
    }
    /**
     * Load Component Asynchronous
     * you can use this to call other component and get result
     * @param string $comName Component Name
     * @return string
     */
    public function Async_LoadComponent($comName){
        ob_start();
        $this->LoadComponet($comName);
        $result = ob_get_clean();
        return $result;
    }

    /**
     * move to other module
     * if $modulename=="" move to page without any module and component
     * @param string $index name of executer
     * @param string $moduleName name of module
     * @param string $comName name of component
     * @param string $Other other command to insert get query
     */
    public function MoveHere($index,$moduleName="",$comName="",$Other=""){
        if ($moduleName==""){
            echo "<script> window.location='$index.php'</script>";      
            return;
        }        
        echo "<script> window.location='$index.php?mod=$moduleName&com=$comName"."$Other'</script>";        
    }
}
