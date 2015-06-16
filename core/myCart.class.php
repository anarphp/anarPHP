<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of myCart
 *
 * @author mohsen
 */
class myCart implements Iterator, Countable {

    private $autoSave;
    private $autoLoad;

    /**
     *
     * @var items  
     */    
    protected $items = array();
	
	// For tracking iterations:
    protected $position = 0;

    // For storing the IDs, as a convenience:
    protected $ids = array();
    /**
     * Create a shopping Cart 
     * @param boolean $autoLoad
     * @param boolean $autoSave
     */
    function __construct($autoLoad=true,$autoSave=true) {
        //$this->items[]=new items;             
        $this->autoLoad = $autoLoad;
        $this->autoSave = $autoSave;
        if ($autoLoad){
            $this->LoadFromSession();
        }
    }
    public function __destruct() {
        if ($this->autoSave){
            $this->SaveInSession();
        }
    }

    function addItem($item){    
        //$index = array_search($item->getRid(), $this->ids);
        if (isset($this->items[$item->getRid()])) {
            return;
        }
        $this->ids[]=$item->getRid();
        $this->items[$item->getRid()]=$item;        
    }
    function DelItem($rid){
        $index = array_search($rid, $this->ids);
        //echo $index;
        if ($index===FALSE) {
            return;
        }
        //echo $this->ids[$index]."---".print_r($this->items[$rid]);
         unset($this->ids[$index]);
         unset($this->items[$rid]);
    }
    function SaveInSession(){
        $_SESSION["Cart"]=$this->items;
        $_SESSION["idCart"]=$this->ids;
    }
    function fixObject(&$object) {
        if (!is_object($object) && gettype($object) == 'object') {
            return ($object = unserialize(serialize($object)));
        }
        return $object;
    }
    function Debug(){
        print_r($this->items);
        echo "Id-->";
        print_r($this->ids);
    }
    function doEmptyCart() {       
        $_SESSION["Cart"] = "";
        $_SESSION["idCart"] = "";
        unset($_SESSION["Cart"]);
        unset($_SESSION["idCart"]);
    }

    function LoadFromSession(){
        if (isset($_SESSION["Cart"]) && is_array($_SESSION["Cart"])) {
            $array=$_SESSION["Cart"];
            foreach ($array as $v) {
                $it=$this->fixObject($v);
                $this->items[$it->getRid()]=$it;
            }
            //$this->items = $_SESSION["Cart"];
            $this->ids = $_SESSION["idCart"];
            return true;
        }
        return false;
    }
    /**
     * 
     * @return int
     */
    public function count() {
        return count($this->items);
    }

    /**
     * 
     * @return items
     */
    public function current() {
        $index=$this->ids[$this->position];
        return $this->items[$index];
    }

    public function key() {
        if ($this->valid()){
            return $this->ids[$this->position];
            //return $this->items[$this->position]->getRid();
        }
    }

    public function next() {
        $this->position++;
    }

    public function rewind() {
        if (is_array($this->ids) && count($this->ids) > 0) {
            $start = array_keys($this->ids); //find start array
            if (is_array($start)) {
                $this->position = $start[0];
            } else {
                $this->position = 0;
            }
        }else{
            $this->position = 0;
        }
    }

    public function valid() {
        return (isset($this->ids[$this->position]));
    }

}
