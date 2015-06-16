<?php

/**
 * Data Table Class
 * Print HTML DataTable
 *
 * History:
 *  Add Function
 *  Add Events
 *  Fix only print other commands
 *  add open in new window command
 *  add Order default
 * @author Mohsen
 * @version 1.0.5
 * @copyright (c) 2015/02/26, Mohsen Ahmadian
 *  
 */
class DataTable {
    
    protected $head;
    protected $functions;
    protected $data;
    protected $CommandPage;
    protected $addDel;
    protected $addEdit;  
    protected $commands;
    protected $commandsTitle;
    protected $newWindow;
    protected $orderCol;
    protected $orderSort;
    
    function __construct() {
        $this->orderCol=0;
        $this->orderSort="asc";       
    }
   
    /**
     * Print DataTable
     */
    public function printDataTable(){
        echo "<table class='table table-bordered table-advance' id='table1'>";
        $this->printHead(); 
        echo "<tbody>";
        foreach ($this->data as $dt) {
            echo "<tr>";
            foreach ($this->functions as $f) {
                $fun="get".$f;
                if (isset($this->events[$f])){ //Event On Cell
                    call_user_func($this->events[$f],"{$dt->$fun()}");
                }else{
                    echo "<td>{$dt->$fun()}</td>";
                }
                                
            }         
            if ($this->addDel || $this->addEdit || count($this->commands)>0 ){
               echo '<td>';
               $this->printDefaultCommand($dt);
               $this->PrintOtherCommands($dt);
               echo '</td>';
            }            
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>"; 
        $this->printForms();
        $this->printScript();
    }
    
    protected function printDefaultCommand($dt) {
        if ($this->addEdit) {
            echo "<a onclick='SendEdit({$dt->getId()})' class='btn btn-small btn-success' href='javascript:void(0)'>ویرایش</a>";
        }
        if ($this->addDel) {
            echo "<a onclick='SendDel({$dt->getId()})' class='btn btn-small btn-danger' href='javascript:void(0)'>حذف</a>";
        }
    }
    protected function PrintThisCommand($dt,$command){
        if (isset($this->events[$command])) {
                        //Event On Cell
                    $canPrint = call_user_func($this->events[$command], $dt);
                    if ($canPrint){
                        echo "&nbsp;<a onclick='Send{$command}({$dt->getId()})' class='btn btn-small btn-info' href='javascript:void(0)'>{$this->commandsTitle[$command]}</a>";
                    }
                } else {
                    echo "&nbsp;<a onclick='Send{$command}({$dt->getId()})' class='btn btn-small btn-info' href='javascript:void(0)'>{$this->commandsTitle[$command]}</a>";
                }
    }
    protected function PrintOtherCommands($dt){
        if (count($this->commands)>0){
            foreach ($this->commands as $c) {
                $this->PrintThisCommand($dt, $c);
            }           
        }
    }
    protected function PrintCommand($command,$title,$dt,$color){
        echo "<td><a onclick='Send{$command}({$dt->getId()})' class='btn btn-small btn-{$color}' href='javascript:void(0)'>{$title}</a>";
    }
    protected function printHead(){
        echo "<thead><tr>";
        foreach ($this->head as $h) {
            echo "<th>$h</th>";
        }
        echo "</tr></thead>";
    }
    /**
     * Print Script Order
     */    
    protected function OrderScript(){
        echo "var orderCol={$this->orderCol}; var orderSort='{$this->orderSort}';";        
    }
    protected function printScript(){
        echo" <script type='text/javascript'>";
        if ($this->addEdit) {
            $this->addCommand("Edit", TRUE);
        }
        if ($this->addDel) {
            $this->addCommand("Del", TRUE,TRUE);
        }
        if (count($this->commands)>0){
           foreach ($this->commands as $c) {
               $this->addCommand($c,TRUE);
           }
        }
        $this->OrderScript();
        echo "</script>";
    }
    protected function printForms(){
        if ($this->addEdit) {
             $this->addCommand("Edit");
        }
        if ($this->addDel) {
              $this->addCommand("Del",FALSE,FALSE,FALSE);
        }
        if (count($this->commands)>0){
           foreach ($this->commands as $c) {
               $this->addCommand($c);
           }
        }
    }
    

    protected function addCommand($commandName, $js=FALSE , $confirm = FALSE,$addtarget=TRUE) {
        $target="";
        if ($this->newWindow && $addtarget){
            $target="target='_blank'";
        }
        if ($js) {
            echo "function Send{$commandName}(id){";
            if ($confirm){
                echo "res=confirm('آیا اطمینان دارید'+'\\r\\nId:'+id);";
                echo "if (!res) {return;} ";
            }
        echo "$('#{$commandName}id').val(id);$('#fr{$commandName}').submit();}";
        } else {
            echo "<form id='fr{$commandName}' method='post' $target action='{$this->CommandPage[$commandName]}'>
                    <input type='hidden' id='{$commandName}id' name='id' value='0' >
                  </form>";
        }
    }
     
    /**
     * set Head of Html Table
     * @param array $head array of string
     */
    public function setHead($head) {
        $this->head = $head;
    }

    /**
     * Array of function name data object. without get, Only name of column in DataBase with Capital Start :)
     * @param array $functions
     */
    public function setFunctions($functions) {
        $this->functions = $functions;
    }

    /**
     * array of Data to show
     * @param array $data table data
     */
    public function setData($data) {
        $this->data = $data;
    }

    /**
     * address of Command Pages
     * this array with command names
     *      
     *  "Edit" => address of Edit Page
     *  "Del" => address of Delete Page
     *  "commandName" => address of command page
     * @param array $CommandPage
     */
    public function setCommandPage($CommandPage) {
        $this->CommandPage = $CommandPage;
    }
    /**
     * Title of command button
     * Default is
     *  "commandName" => Title of command button
     * @param array $cmTitleAarray
     */
    public function setCommandsTitle($cmTitleAarray){
        $this->commandsTitle = $cmTitleAarray;
    }

    /**
     * Inser Edit Command and Button per Row
     * @param boolean $addDel true if you need Edit button
     */
    public function AddDel($addDel=TRUE) {
        $this->addDel = $addDel;
    }

    /**
     * Insert Delete Command and button per Row
     * @param boolean $addEdit true if you need Delete button
     */
    public function AddEdit($addEdit=TRUE) {
        $this->addEdit = $addEdit;
    }
       

    /**
     * Add New Command to dataTable
     * @param string $commandName Command Name
     */
    public function AddNewCommand($commandName) {
        $this->commands[]=$commandName;
    }
    protected $events;
    /**
     * Call your function when DataTable want to print Table
     * function Get Data in one parameter
     * Example:
     * 
     *  function pDate($data){
     * 
     *    echo "&lt;td&gt; Hello from pDate= $data &lt;/td&gt;";
     * 
     *  }
     * 
     * $dt->AddEventOnCellPrint("StartDate", "pDate");
     * @param string $name Coloumn name to event printed
     * @param string $func function name that you need to call
     */
    public function AddEventOnCellPrint($name,$func){
        $this->events[$name]=$func;
    }
    /**
     * Add Event befor print function
     * if your function send false function not printing other wise print it
     * 
     * function Get Object in one parameter
     * Example:
     * 
     *  function showSum($data){    
     *    if ($data->getSum()>0){
     *      return TRUE;
     *    }
     *      return FALSE;     
     *  }
     * 
     * $dt->AddEventOnFunction("SUMFunc", "showSum");
     * @param string $name Coloumn name to event printed
     * @param string $func function name that you need to call
     */
    public function AddEventOnFunction($name,$func){
        $this->events[$name]=$func;
    }
    /**
     * set true if you want open command in new window
     * @param bool $newWindow
     */
    function setOpenNewWindow($newWindow) {
        $this->newWindow = $newWindow;
    }
    /**
     * Change default ordering of table
     * Default is 0,asc
     * @param int $orderCol  col number zero base
     * @param string $sort a string 'asc' OR 'desc'
     */
    function Order($orderCol,$sort){
        $this->orderCol=$orderCol;
        $this->orderSort=$sort;
    }

}
