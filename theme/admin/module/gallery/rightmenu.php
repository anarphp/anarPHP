<?php     
  $control = $this->getControl();
?>
<li 
    <?php if ($control->getActive()) {
        echo " class='active' ";
    }
?>>
    <a href="javascript:;">
        <i class="icon-picture"></i>
       <span class="title">مدیریت گالری</span>
       <span class="arrow "></span>
    </a>    
    <ul class="sub-menu">
        <li<?php $control->IsActive("add", TRUE); ?>><a href="admin.php?mod=gallery&com=add">گالری جدید </a></li>
        <li <?php $control->IsActive("list", TRUE); ?>><a href="admin.php?mod=gallery&com=list">لیست گالری ها </a></li>
        <li <?php $control->IsActive("addPic", TRUE); ?>><a href="admin.php?mod=gallery&com=addPic">افزودن عکس </a></li>                                                
    </ul>
</li>



