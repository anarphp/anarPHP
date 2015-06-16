function changeCity() {
    id = $("#cont option:selected").val();
    $('#city option').each(function() {
        $(this).remove();
    });
    $.ajax({
        url: "service.php?mod=country&com=ajax&id=" + id,
        beforeSend: function() {
            $('#loader').show();
        },
        complete: function() {
            $('#loader').hide();
        },
        success: function(result) {
            $('#city').html(result);
        }});
}
function InitialCity(OldCity){
    if (OldCity<=0){
        return true;
    }
    id = $("#cont option:selected").val();
    $('#city option').each(function() {
        $(this).remove();
    });
    $.ajax({
        url: "service.php?mod=country&com=ajax&sid="+OldCity+"&id=" + id,
        beforeSend: function() {
            $('#loader').show();
        },
        complete: function() {
            $('#loader').hide();
            MySelect2();
        },
        success: function(result) {
            $('#city').html(result);
        }});
}
function MySelect2() {
    $('#city').select2({
        allowClear: true
    });
}
function MySelector(){
     $('.MySelector').select2({
        allowClear: true
    });
}
jQuery(document).ready(function() {
    
    $('#loader').hide();     
    if (InitialCity(OldCity)){
        MySelect2();
    }    
    MySelector();
});

