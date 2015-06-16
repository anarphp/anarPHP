<?php
  $setting=$this->loadData("setting");
?>
<h1> گالری</h1>
<form method="post" class="form-horizontal form-bordered" >   
    <input type="hidden" name="send" value="1"/>  
    <div class="form-body">
        <div class="form-group">
            <label for="contactus" class="control-label col-md-3">آدرس ایمیل دریافت تماس با ما</label>
            <div class="col-md-8">
                <input type="text" id="contactus" class="form-control"  name="contactus" value="<?php echo $setting->Read("contactus"); ?>" />                
            </div>
        </div>               
        <div class="form-group">
            <label for="slogan" class="control-label col-md-3">شعار سایت</label>
            <div class="col-md-8">
                <input type="text" id="contactus" class="form-control"  name="slogan" value="<?php echo $setting->Read("slogan"); ?>" />                
            </div>
        </div>               
        <div class="form-group">
            <label for="aboutus" class="control-label col-md-3">درباره ما پایین صفحه</label>
            <div class="col-md-8">
                <textarea cols="8" rows="6" id="aboutus" class="form-control"  name="aboutus"><?php echo $setting->Read("aboutus"); ?>
                </textarea>        
            </div>
        </div>               
        <div class="form-group">
            <label for="address" class="control-label col-md-3">آدرس</label>
            <div class="col-md-8">
                <textarea cols="8" rows="6" id="address" class="form-control"  name="address"><?php echo $setting->Read("address"); ?>
                </textarea>              
            </div>
        </div>               
        <div class="form-group">
            <label for="tel" class="control-label col-md-3">شماره تلفن</label>
            <div class="col-md-8">
                <input type="text" id="tel" class="form-control"  name="tel" value="<?php echo $setting->Read("tel"); ?>" />                
            </div>
        </div>               
        <div class="form-group">
            <label for="email" class="control-label col-md-3">ایمیل</label>
            <div class="col-md-8">
                <input type="text" id="contactus" class="form-control"  name="email" value="<?php echo $setting->Read("email"); ?>" />                
            </div>
        </div>               
        <div class="form-group">
            <label for="slogans" class="control-label col-md-3">شعار های اول صفحه</label>
            <div class="col-md-8">
                <textarea cols="8" rows="6" id="slogans" class="form-control"  name="slogans"><?php echo $setting->Read("slogans"); ?>
                </textarea>
            </div>
        </div> 
        <div class="form-group last">
            <label for="limitTransfer" class="control-label col-md-3">حداقل خرید برای حمل رایگان</label>
            <div class="col-md-8">
                <input type="text" id="limitTransfer" class="form-control"  name="limitTransfer" value="<?php echo $setting->Read("limitTransfer"); ?>" />                
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
