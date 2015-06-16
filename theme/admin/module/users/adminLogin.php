<?php 
  //$this=new themeManager;
  $canlogin=$this->loadData("canlogin");
?>
<!-- BEGIN LOGIN FORM -->
<?php if ($canlogin){?>
<script>
    window.location.href="admin.php";
</script>
<?php }?>
<form class="login-form"  method="post">
    <input type="hidden" name="send" value="1"/>
    <h3 class="form-title">ورود به حساب کاربری شما</h3>
    <div class="alert alert-error hide">
        <button class="close" data-dismiss="alert"></button>
        <span>نام کاربری خود را وارد کنید</span>
    </div>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">نام کاربری</label>
        <div class="input-icon">
            <i class="icon-user"></i>
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="نام کاربری" name="username"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">رمز عبور</label>
        <div class="input-icon">
            <i class="icon-lock"></i>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="رمز عبور" name="password"/>
        </div>
    </div>
    <div class="form-actions">
        <label class="checkbox">
            <input type="checkbox" name="remember" value="1"/> مرا بخاطر بسپار
        </label>
        <button type="submit" class="btn blue pull-right">
            ورود <i class="m-icon-swapright m-icon-white"></i>
        </button>            
    </div>
    <div class="forget-password">
        <h4>رمز عبور خود را فراموش کرده اید</h4>
        <p>
            رمز عبور خود را 
            <a href="javascript:;"  id="forget-password">اینجا</a>
            ریست کنید
        </p>
    </div>        
</form>
<!-- END LOGIN FORM -->        
<!-- BEGIN FORGOT PASSWORD FORM -->
<form class="forget-form" method="post">
    <input type="hidden" name="send" value="2"/>
    <h3 >رمز عبور خود را فراموش کرده اید</h3>
    <p>نام کاربری خود را وارد کنید</p>
    <div class="form-group">
        <div class="input-icon">
            <i class="icon-envelope"></i>
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="کد مشتری" name="email" />
        </div>
    </div>
    <div class="form-actions">
        <button type="button" id="back-btn" class="btn">
            <i class="m-icon-swapleft"></i> بازگشت
        </button>
        <button type="submit" class="btn blue pull-right">
            ارسال <i class="m-icon-swapright m-icon-white"></i>
        </button>            
    </div>
</form>
<!-- END FORGOT PASSWORD FORM -->
