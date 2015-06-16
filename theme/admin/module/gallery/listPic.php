<h1>لیست تصاویر گالری <?php echo $this->loadData("gName"); ?></h1>
<?php
 //$this=new themeManager;
$this->Tools()->addCss("assets/plugins/data-tables/DT_bootstrap_rtl.css");        
 $this->Tools()->addJs("assets/plugins/data-tables/jquery.dataTables.js");  
 $this->Tools()->addJs("assets/plugins/data-tables/DT_bootstrap.js"); 
 $this->Tools()->addJs("assets/scripts/mydata.js");  

 $allPic= $this->loadData("allPic");

 $dt=new DataTable();
 $dt->setData($allPic);
 $head=array('#','توضیح فارسی','نام اسلاید','فرامین');
 $func=array('Id','FaDesc','EnDesc');
 $pages=array(
     "Edit" => "admin.php?mod=gallery&com=addPic",
     "Del" => "admin.php?mod=gallery&com=delPic"
 );
 $dt->setOpenNewWindow(TRUE);
 $dt->setCommandPage($pages);
 $dt->setHead($head);
 $dt->setFunctions($func);
 $dt->AddDel();
 $dt->AddEdit();
 
 $dt->printDataTable(); //:)