<h1>لیست  کاربران</h1>
<?php
 //$this=new themeManager;
$this->Tools()->addCss("assets/plugins/data-tables/DT_bootstrap_rtl.css");        
 $this->Tools()->addJs("assets/plugins/data-tables/jquery.dataTables.js");  
 $this->Tools()->addJs("assets/plugins/data-tables/DT_bootstrap.js"); 
 $this->Tools()->addJs("assets/scripts/mydata.js");  

 $allUsers= $this->loadData("allUsers");

 $dt=new DataTable();
 $dt->setData($allUsers);
 $head=array('#','نام و نام خانوادگی','همراه','پست الکترونیک','فرامین');
 $func=array('Id','FullName','Mobile','Username');
 $pages=array(
     "Edit" => "admin.php?mod=users&com=profile",
     "Del" => "admin.php?mod=users&com=del"
 );
 $dt->setCommandPage($pages);
 $dt->setHead($head);
 $dt->setFunctions($func);
 $dt->AddDel();
 $dt->AddEdit();
 
 $dt->printDataTable(); //:)