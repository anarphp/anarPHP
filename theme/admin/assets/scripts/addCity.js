function changeProvince() {
    id = $("#cont option:selected").val();
    $('#pId option').each(function() {
        $(this).remove();
    });
    $.ajax({
        url: "service.php?mod=country&com=ajaxProvince&id=" + id,
        beforeSend: function() {
            $('#loader').show();
        },
        complete: function() {
            $('#loader').hide();
        },
        success: function(result) {
            $('#pId').html(result);
        }});
}
function InitialProvince(OldCity){
    if (OldCity<=0){
        return true;
    }
    id = $("#cont option:selected").val();
    $('#pId option').each(function() {
        $(this).remove();
    });
    $.ajax({
        url: "service.php?mod=country&com=ajaxProvince&sid="+OldCity+"&id=" + id,
        beforeSend: function() {
            $('#loader').show();
        },
        complete: function() {
            $('#loader').hide();
            MySelect2();
        },
        success: function(result) {
            $('#pId').html(result);
        }});
}

jQuery(document).ready(function() {    
    $('#loader').hide();     
    InitialProvince(OldCountry);   
});

