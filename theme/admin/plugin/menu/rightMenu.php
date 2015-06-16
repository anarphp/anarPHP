<?php
$boot = new moduleManager("admin");
        
?>
<div class="page-sidebar navbar-collapse collapse">     
    <ul class="page-sidebar-menu">
        <li>     
            <div class="sidebar-toggler hidden-phone"></div>
        </li>        
        <li class="start">
            <a href="admin.php">
                <i class="icon-home"></i> 
                <span class="title">داشبورد</span>
                <span class="selected"></span>
            </a>
        </li>
        <?php
        $modules = $boot->getModulesSorted();
        foreach ($modules as $modl) {
            if ($modl->getName() == $module->getName()) {
                $module->rightMenu();
            } else {
                $modl->rightMenu();
            }
        }
        ?>   
        <li class="last ">
            <a href="logout.php">
                <i class="icon-lock"></i> 
                <span class="title">خروج</span>
            </a>
        </li>
    </ul>
</div>