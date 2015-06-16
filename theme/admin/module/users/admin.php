<?php
$user = $this->loadData("user");
$msg = $this->loadData("msg");
?>
<h1> پروفایل</h1>
<div class="row">
<div class="col-sm-6">
    <ul class="list-group">       
        <?php echo $msg; ?>
    </ul>
</div>
</div>
<form method="post" class="form-horizontal form-bordered" >
    <input type="hidden" name="id" value="<?php echo $user->getId(); ?>"/>
    <input type="hidden" name="send" value="1"/>  
    <div class="form-body">
        <div class="form-group">
            <label for="username" class="control-label col-md-3"> نام کاربری </label>
            <div class="col-md-8">
                <input type="text" required id="username" name="username" class="form-control"  value="<?php echo $user->getUsername(); ?>" />                
            </div>
        </div>
        <div class="form-group">
            <label for="fullname" class="control-label col-md-3"> نام و نام خانوادگی </label>
            <div class="col-md-8">
                <input type="text" id="fullname" name="fullname" class="form-control"  value="<?php echo $user->getFullName(); ?>" />                
            </div>
        </div>        
        <div class="form-group">
            <label for="email" class="control-label col-md-3"> پست الکترونیک </label>
            <div class="col-md-8">
                <input type="text" required id="email" name="email" class="form-control"  value="<?php echo $user->getEmail(); ?>" />                
            </div>
        </div>
        <div class="form-group">
            <label for="mobile" class="control-label col-md-3"> تلفن همراه  </label>
            <div class="col-md-8">
                <input type="text" id="mobile" required name="mobile" class="form-control"  value="<?php echo $user->getMobile(); ?>" />                
            </div>
        </div>
        <div class="form-group">
            <label for="oldPass" class="control-label col-md-3"> رمز عبور قبلی  </label>
            <div class="col-md-8">
                <input type="password" required id="oldPass" name="oldPass" class="form-control"  value="" />                
            </div>
        </div>
        <div class="form-group">
            <label for="neuPass" class="control-label col-md-3"> رمز عبور جدید  </label>
            <div class="col-md-8">
                <input type="password" id="Entitle" name="neuPass" class="form-control"  value="" />                
            </div>
        </div>
        <div class="form-group">
            <label for="confirm" class="control-label col-md-3"> تکرار رمز عبور  </label>
            <div class="col-md-8">
                <input type="password" id="confirm" name="confirm" class="form-control"  value="" />                
            </div>
        </div>        
    </div>
    <div class="form-actions fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn green btn-lg"><i class="icon-save"></i> ثبت</button>                                                 
                </div>
            </div>
        </div>
    </div>
</form>
