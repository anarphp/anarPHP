<?php    
  $control = $this->getControl();
?>
<li 
    <?php if ($control->getActive()) {
        echo " class='active' ";
    }
?>>
    <a href="javascript:;">
        <i class="icon-user"></i>
       <span class="title">مدیریت کاربران</span>
       <span class="arrow "></span>
    </a>    
    <ul class="sub-menu">
        <li<?php $control->IsActive("add", TRUE); ?>><a href="admin.php?mod=users&com=add">کاربر جدید </a></li>
        <li <?php $control->IsActive("list", TRUE); ?>><a href="admin.php?mod=users&com=list">لیست کاربران </a></li>  
        <!--<li><a href="https://avattravel.disqus.com/admin/moderate/#/approved" target="_blank">داشبورد نظر کاربران</a></li>-->
        
    </ul>
</li>



