<?php
$msg = $this->loadData("msg");
$id = $this->loadData("id");
$msgtype = $this->loadData("msgtype");
$content = $this->loadData("content");
$allGroup = $this->loadData("allGroup");
$allGallery = $this->loadData("allGallery");
$this->Tools()->addCss("assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css");
$this->Tools()->addJs("assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js");
$this->Tools()->addCss("assets/plugins/select2/select2_metro_rtl.css");
$this->Tools()->addJs("assets/plugins/select2/select2.min.js");
$this->Tools()->addJs("assets/scripts/select2.js");
?>
<h1> مطلب جدید</h1>

<?php if ($msg != "") { ?>
    <div class="notice <?php echo $msgtype; ?>">
        <?php echo $msg; ?>
    </div>
<?php } ?>
<form method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $content->getId(); ?>"/>
    <input type="hidden" name="send" value="1"/>  
    <div class="form-body">

        <div class="form-group">
            <label for="fatitle" class="control-label col-md-3"> عنوان  مطلب</label>
            <div class="col-md-8">
                <input type="text" id="fatitle" name="fatitle" class="form-control"  value="<?php echo ($content->getTitle()); ?>" />                
            </div>
        </div>

        <div class="form-group">
            <label for="fasmall" class="control-label col-md-3">توضیح مختصر </label>
            <div class="col-md-8">
                <textarea type="text" id="fasmall" name="fasmall" class="form-control"/><?php echo ($content->getSmallComment()); ?></textarea>              
            </div>
        </div>         
        <div class="form-group">
            <label for="fafull" class="control-label col-md-3">متن کامل </label>
            <div class="col-md-8">
                <textarea id="fafull" name="fafulltext" class="mceEditor" id="elm1" rows="15" cols="40"  style="width:300px">
                    <?php echo ($content->getContent()); ?>
                </textarea>             
            </div>
        </div>        
        <div class="form-group">
            <input type="hidden" name="oldImg" value="<?php echo $content->getImg() ?>"/>
            <label class="control-label col-md-3">تصویر </label>
            <div class="col-md-9">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 510px; height: 254px;">
                        <img src="<?php echo (($content->getImg() == "") ? "upload/image/projectnoimage.gif" : $content->getImg()); ?>" alt="" />
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
        <div class="form-group">
            <label for="loaction" class="control-label col-md-3"> موقعیت لینک دسترسی</label>
            <div class="col-md-8">
                <select id="location" name="location[]" data-placeholder="انتخاب محل نمایش متن" class="form-control select2" multiple>                
                    <?php
                    foreach ($allGroup as $gr) {
                        //$gr=new TblcontentgroupModel();
                        echo "<option value='{$gr->getGroupname()}'";
                        if (strpos($content->getPosition(), $gr->getGroupname())) {
                            echo "selected='selected'";
                        }
                        echo ">{$gr->getTitle()}</option>";
                    }
                    ?>                           
                </select>            
            </div>
        </div>
        <div class="form-group">
            <label for="ensmall" class="control-label col-md-3">گالری</label>
            <div class="col-md-8">
                <select name="gid" class="form-control">
                    <option value="0">بدون گالری </option>
                    <?php
                    foreach ($allGallery as $g) {
                        if ($g->getId() == $content->getGallery()) {
                            echo "<option selected value='{$g->getId()}'>{$g->getFaName()}</option>";
                        } else {
                            echo "<option value='{$g->getId()}'>{$g->getFaName()}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group last">
            <label for="allow" class="control-label col-md-3"> اجازه کامنت گذاری </label>
            <div class="col-md-8">
                <input id="allow" type="checkbox" class="form-control" name="allowComment" value="yes"
                       <?php if ($content->getAllowComment()) { ?> checked="checked" <?php } ?>/>              
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

