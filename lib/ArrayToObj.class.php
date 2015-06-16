<?php

/**
 * Convert Array[Key,Value] to Standard Object
 * you cant get/set Value in Object mode 
 * @author Mohsen.Ahmadian
 */
class ArrayToObj {
    const LOW=1;
    const UPPER=2;
    const MIX=3;
    const CAMEL=4;
    
    private $arr;    
    private $status;   
    /**
     * 
     * @param type $arr
     * @param int $type  const of object array type
     */    
    function __construct($arr,$type) {
        $this->arr = $arr;
        $this->status=$type;
    }
    
    function __call($name, $arguments) {
        //echo $name;
        $substr = substr($name, 3);
        if (strpos($name, "get")!==FALSE){
            switch ($this->status) {
                case 1:
                   return $this->arr[strtolower($substr)];
                case 2:
                    return $this->arr[strtoupper($substr)];
                case 3:
                    return $this->arr[$substr];
                case 4:
                    return $this->arr[ucfirst($substr)];
            }
        }else{
            //print_r($arguments);
            switch ($this->status) {
                case 1:
                    $this->arr[strtolower($substr)]=$arguments[0];
                case 2:
                    $this->arr[strtoupper($substr)]=$arguments[0];
                case 3:
                    $this->arr[$substr] = $arguments[0];
                case 4:
                    $this->arr[ucfirst($substr)] = $arguments[0];
            }           
        }        
    }
   
}
