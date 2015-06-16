<?php
//$this=new themeManager;

$user=$this->loadData("user");
?>
<h1>پروفایل کاربر</h1>
<table class="table table-bordered">
    <tr>
        <td>نام و نام خانوادگی</td>
        <td>
            <?php echo $user->getFullName(); ?>
        </td>
    </tr>
    <tr>
        <td>تلفن همراه</td>
        <td>
            <?php echo $user->getMobile(); ?>
        </td>
    </tr>
    <tr>
        <td>پست الکترونیک</td>
        <td>
            <?php echo $user->getUsername(); ?>
        </td>
    </tr>
    <tr>
        <td>آدرس</td>
        <td>
            <?php echo $user->getAddress(); ?>
        </td>
    </tr>    
</table>
