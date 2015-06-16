<h1>لیست  گروه های مطلب</h1>
<?php
 //$this=new themeManager;
$this->Tools()->addCss("assets/plugins/data-tables/DT_bootstrap_rtl.css");        
 $this->Tools()->addJs("assets/plugins/data-tables/jquery.dataTables.js");  
 $this->Tools()->addJs("assets/plugins/data-tables/DT_bootstrap.js"); 
 $this->Tools()->addJs("assets/scripts/mydata.js");  

 $listGroup= $this->loadData("listGroup");

 $dt=new DataTable();
 $dt->setData($listGroup);
 $head=array('#','عنوان گروه فارسی','نام گروه','فرامین');
 $func=array('Id','Title','Groupname');
 $pages=array(
     "Edit" => "admin.php?mod=content&com=addGroup",
     "Del" => "admin.php?mod=content&com=delGroup"
 );
 $dt->setCommandPage($pages);
 $dt->setHead($head);
 $dt->setFunctions($func);
 $dt->AddDel();
 $dt->AddEdit();
 
 $dt->printDataTable(); //:)