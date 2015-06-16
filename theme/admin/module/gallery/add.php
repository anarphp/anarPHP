<?php
//$this = new themeManager;
$gallary=$this->loadData("gallery");//new TblgalleryModel();
?>
<h1> گالری</h1>
<form method="post" class="form-horizontal form-bordered" >
    <input type="hidden" name="id" value="<?php echo $gallary->getId(); ?>"/>
    <input type="hidden" name="send" value="1"/>  
    <div class="form-body">
        <div class="form-group">
            <label for="fatitle" class="control-label col-md-3"> نام فارسی </label>
            <div class="col-md-8">
                <input type="text" id="fatitle" name="faName" class="form-control"  value="<?php echo $gallary->getFaName(); ?>" />                
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
