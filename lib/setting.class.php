<?php

/**
 * Load and manage Setting
 *
 * @author mohsen
 */
class setting implements Countable{
    
    private $allSetting;
    private $Pdo;    
    function __construct($pdo) {
        $this->allSetting=array();
        $this->Pdo=$pdo;
        $this->Load();       
    }
    private function Load() {
        $sql="select * from tblsetting";
        $all = TblsettingModel::findBySql($this->Pdo, $sql);         
        foreach ($all as $s) {
            $this->allSetting[$s->getKey()] = $s->getValue();
        }       
    }

    public function count() {
        return count($this->allSetting);
    }
    public function Save($key,$value){
        $tmp=new TblsettingModel();
        $tmp->setKey($key);
        $find = TblsettingModel::findByExample($this->Pdo, $tmp);
        
        if (is_array($find) && count($find)>0){
            //Update
            $find[0]->setValue($value);
            $this->allSetting[$key]=$value;
            return $find[0]->updateToDatabase($this->Pdo);            
        }else{
            //Add
            $tmp->setValue($value);
            $this->allSetting[$key]=$value;
            return $tmp->insertIntoDatabase($this->Pdo);
        }
    }
    public function Read($key){
        if (isset($this->allSetting[$key])){            
            return $this->allSetting[$key];
        }else{
            return "";
        }
    }
    
//put your code here
}
