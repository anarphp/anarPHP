<h1>لیست گالری</h1>
<?php
 //$this=new themeManager;
$this->Tools()->addCss("assets/plugins/data-tables/DT_bootstrap_rtl.css");        
 $this->Tools()->addJs("assets/plugins/data-tables/jquery.dataTables.js");  
 $this->Tools()->addJs("assets/plugins/data-tables/DT_bootstrap.js"); 
 $this->Tools()->addJs("assets/scripts/mydata.js");  

 $allGallery= $this->loadData("allGallery");

 $dt=new DataTable();
 $dt->setData($allGallery);
 $head=array('#','نام فارسی','فرامین');
 $func=array('Id','FaName');
 $pages=array(
     "Edit" => "admin.php?mod=gallery&com=add",
     "Del" => "admin.php?mod=gallery&com=del",
     "listPic" => "admin.php?mod=gallery&com=listPic"
 );
 $btTitle=array(
    "listPic" => "لیست تصاویر" 
 );
 $dt->setOpenNewWindow(TRUE);
 $dt->AddNewCommand("listPic");
 $dt->setCommandsTitle($btTitle);
 $dt->setCommandPage($pages);
 $dt->setHead($head);
 $dt->setFunctions($func);
 $dt->AddDel();
 $dt->AddEdit();
 
 $dt->printDataTable(); //:)