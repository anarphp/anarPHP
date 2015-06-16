<?php
//$this=new mod_content();
$this->CanDo("admin");
$cgroup=new TblcontentgroupModel();
$id= $this->readPost("id");
if ($id>0){
    $cgroup=  TblcontentgroupModel::findById($this->getPdo(), $id);
}
if ($this->getSend()>0){
    $cgroup->setGroupname($this->readPost("gname"));
    $cgroup->setTopmenu($this->readBoolPost("topmenu"));
    $cgroup->setVisible($this->readBoolPost("gvisible"));
    $cgroup->setTitle($this->readPost("fatitle"));
    if ($id>0){
        $cgroup->updateToDatabase($this->getPdo());
    }else{
        $cgroup->insertIntoDatabase($this->getPdo());
    }
    
}
$this->Theme()->registerData("cgroup", $cgroup);
$this->Theme()->Load("addGroup");