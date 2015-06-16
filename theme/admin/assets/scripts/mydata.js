function AddDataTable() {
    if (!jQuery().dataTable) {
        return;
    }
    $("#table1").dataTable({
        aLengthMenu: [[10, 15, 25, 50, 100, -1], [10, 15, 25, 50, 100, "All"]],
        order: [[ orderCol, orderSort ]],
        iDisplayLength: 10,
        "sPaginationType": "bootstrap",
        oLanguage: {
            sLengthMenu: " به ازای هر صفحه_MENU_",
            sInfo: "_START_ - _END_ از _TOTAL_", sSearch: "جستجو",
            sInfoEmpty: "0 - 0 of 0",
            oPaginate: {sPrevious: " قبلی ", sNext: " بعدی "}
        },
        aoColumnDefs: [
            {bSortable: false, aTargets: [0]}
        ]
    });
    jQuery('#table1_wrapper .dataTables_filter input').addClass("form-control input-medium"); // modify table search input
    jQuery('#table1_wrapper .dataTables_length select').addClass("form-control input-xsmall");
//--------------------------------------------------------------
    $('#sample1').dataTable({
        "aLengthMenu": [
            [5, 15, 20, -1],
            [5, 15, 20, "All"] // change per page values here
        ],
        // set the initial value
        "iDisplayLength": 5,
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "_MENU_ records",
            "oPaginate": {
                "sPrevious": "Prev",
                "sNext": "Next"
            }
        },
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [0]
            }
        ]
    });
    jQuery('#sample_3_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
    jQuery('#sample_3_wrapper .dataTables_length select').addClass("form-control input-xsmall");
}
jQuery(document).ready(function() {
    AddDataTable();
});