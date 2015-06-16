<?php
 $this->Tools()->addCss("assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css");
$this->Tools()->addJs("assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js");
$pic=$this->loadData("pic");
$allGallery=$this->loadData("allGallery");
$gId=$this->loadData("gId");

?>
<h1> عکس</h1>
<form method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $pic->getId(); ?>"/>
    <input type="hidden" name="send" value="1"/>     
    <div class="form-body">
        <div class="form-group">
            <label for="fatitle" class="control-label col-md-3"> گالری </label>
            <div class="col-md-8">
                <select class='form-control' name='gId'>
                    <?php                      
                      foreach ($allGallery as $g) {
                          if($g->getId()==$gId){
                              echo "<option selected value='{$g->getId()}'>{$g->getFaName()}</option>";
                          }else{
                              echo "<option value='{$g->getId()}'>{$g->getFaName()}</option>";
                          }
                          
                      }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="fatitle" class="control-label col-md-3"> توضیح فارسی </label>
            <div class="col-md-8">
                <input type="text" id="fatitle" name="faDesc" class="form-control"  value="<?php echo $pic->getFaDesc(); ?>" />                
            </div>
        </div>
        <div class="form-group">
            <label for="Entitle" class="control-label col-md-3"> نام اسلاید </label>
            <div class="col-md-8">
                <input type="text" id="Entitle" name="EnDesc" class="form-control"  value="<?php echo $pic->getEnDesc(); ?>" />                
            </div>
        </div>
        <div class="form-group">
            <input type="hidden" name="oldImg" value="<?php echo $pic->getImg() ?>"/>
            <label class="control-label col-md-3">تصویر </label>
            <div class="col-md-9">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 510px; height: 254px;">
                        <img src="<?php  echo (($pic->getImg()=="")?"upload/image/projectnoimage.gif":$pic->getImg()); ?>" alt="" />
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 510px; max-height: 254px; line-height: 20px;"></div>
                    <div>
                        <span class="btn default btn-file">
                            <span class="fileupload-new"><i class="icon-paper-clip"></i> انتخاب تصویر</span>
                            <span class="fileupload-exists"><i class="icon-undo"></i> تغییر</span>
                            <input type="file" class="default" name="pimg" />
                        </span>
                        <a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> حذف</a>
                    </div>
                </div>
                <span class="label label-danger">نکته!</span>
                <span>
                    از آخرین نسخه مرورگر استفاده کنید
                </span>
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

