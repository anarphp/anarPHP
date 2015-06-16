<?php ?>
<div class="header-inner">
    <!-- BEGIN LOGO -->  
    <a class="navbar-brand" href="index.php">
        <img src="<?php echo $this->Tools()->ThemePath("assets/img/logo.png")?>" alt="logo" class="img-responsive" />
    </a>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER --> 
    <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <img src="<?php echo $this->Tools()->ThemePath("assets/img/menu-toggler.png")?> " alt="" />
    </a> 
    <!-- END RESPONSIVE MENU TOGGLER -->
    <!-- BEGIN TOP NAVIGATION MENU -->
    <ul class="nav navbar-nav pull-right">       
        <li class="dropdown user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <img alt="" src="<?php echo $this->Tools()->ThemePath("assets/img/avatar1_small.jpg")?> "/>
                <span class="username">مدیر</span>
                <i class="icon-angle-down"></i>
            </a>
            <ul class="dropdown-menu">
                <li><a href="admin.php?mod=users&com=adminProfile"><i class="icon-user"></i> پروفایل</a>
                </li>                                             
                <li><a href="admin.php?mod=users&com=setting"><i class="icon-cogs"></i>تنظیمات</a>
                </li>                                             
                <li class="divider"></li>
                <li><a href="javascript:;" id="trigger_fullscreen"><i class="icon-move"></i> تمام صفحه</a>
                </li>               
                <li><a href="logout.php"><i class="icon-key"></i> خروج</a>
                </li>
            </ul>
        </li>
        <!-- END USER LOGIN DROPDOWN -->
    </ul>
    <!-- END TOP NAVIGATION MENU -->
</div>

