function Tag() {
    if (!jQuery().tagsInput) {
        return;
    }
    $('#tags_1').tagsInput({
        width: 'auto',
        defaultText:'تگ کالا',
        'onAddTag': function () {
            //alert(1);
        }
    });
}
function checkName(){
    var name=$("#pname").val();
    
    if ($.trim(name)==""){
        $("#msgname").html("امکان پذیر نیست !!");
        $("#btnsend").fadeOut();
        return;
    }
    $.get("service.php?mod=product&com=ajaxNameCheck&name="+name, function (data, status) {
        if (status == "success") {
            if (data=="YES"){
                $("#msgname").html("امکان پذیر است");
                $("#btnsend").fadeIn();
            }else{
                $("#msgname").html("تکراری است");
                $("#btnsend").fadeOut();
            }
        }        
    });
}
jQuery(document).ready(function () {
    Tag();
});