<?php
$group=$this->loadData("cgroup");
?>
<h1>گروه مطلب</h1>
<form method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $group->getId(); ?>"/>
    <input type="hidden" name="send" value="1"/>  
    <div class="form-body">
        <div class="form-group">
            <label for="fatitle" class="control-label col-md-3"> عنوان فارسی گروه</label>
            <div class="col-md-8">
                <input type="text" id="fatitle" name="fatitle" class="form-control"  value="<?php echo ($group->getTitle());?>" />                
            </div>
        </div>         
         <div class="form-group">
            <label for="gname" class="control-label col-md-3">نام گروه (لزوما انگلیس و یکتا )</label>
            <div class="col-md-8">
                <input type="text" id="gname" name="gname" style='direction: ltr' class="form-control"  value="<?php echo ($group->getGroupname());?>" />                
            </div>
        </div>
       <div class="form-group">
            <label for="mvisible" class="control-label col-md-3">قابل نمایش</label>
            <div class="col-md-8">
                <input id="mvisible" type="checkbox" class="form-control" name="gvisible" value="yes"
                       <?php if ($group->getVisible()) { ?> checked="checked" <?php } ?>/>              
            </div>
        </div>   
        <div class="form-group last">
            <label for="topmenu" class="control-label col-md-3">منو اصلی </label>
            <div class="col-md-8">
                <input id="topmenu" type="checkbox" class="form-control" name="topmenu" value="yes"
                       <?php if ($group->getTopmenu()) { ?> checked="checked" <?php } ?>/>              
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