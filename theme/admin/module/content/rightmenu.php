<?php    
  $control = $this->getControl();
?>
<li 
    <?php if ($control->getActive()) {
        echo " class='active' ";
    }
?>>
    <a href="javascript:;">
        <i class="icon-coffee"></i>
       <span class="title">مدیریت مطلب</span>
       <span class="arrow "></span>
    </a>    
    <ul class="sub-menu">
        <li<?php $control->IsActive("add", TRUE); ?>><a href="admin.php?mod=content&com=add">مطلب جدید </a></li>
        <li <?php $control->IsActive("list", TRUE); ?>><a href="admin.php?mod=content&com=list">لیست مطالب </a></li>
        <li <?php $control->IsActive("addGroup", TRUE); ?>><a href="admin.php?mod=content&com=addGroup">گروه  مطالب </a></li>
        <li <?php $control->IsActive("listGroup", TRUE); ?>><a href="admin.php?mod=content&com=listGroup">لیست گروه مطلب </a></li>                                          
    </ul>
</li>



