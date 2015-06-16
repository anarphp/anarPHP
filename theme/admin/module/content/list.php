<h1>لیست مطالب</h1>
<?php
 //$this=new themeManager;
$this->Tools()->addCss("assets/plugins/data-tables/DT_bootstrap_rtl.css");        
 $this->Tools()->addJs("assets/plugins/data-tables/jquery.dataTables.js");  
 $this->Tools()->addJs("assets/plugins/data-tables/DT_bootstrap.js"); 
 $this->Tools()->addJs("assets/scripts/mydata.js");  

 $allContent= $this->loadData("allContent");

 $dt=new DataTable();
 $dt->setData($allContent);
 $head=array('#','عنوان مطلب','موقعیت لینک','فرامین');
 $func=array('Id','Title','Position');
 $pages=array(
     "Edit" => "admin.php?mod=content&com=add",
     "Del" => "admin.php?mod=content&com=del"
 );
 $dt->setCommandPage($pages);
 $dt->setHead($head);
 $dt->setFunctions($func);
 $dt->AddDel();
 $dt->AddEdit();
 
 $dt->printDataTable(); //:)