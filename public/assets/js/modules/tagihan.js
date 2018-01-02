$(document).ready(function() {
    id=$("#mhs").val();
    if(id!==''||id!=='undefined'){
        loadtagihan(id);
    }
   /* $("#mhs,#multi").select2({
        theme: "bootstrap input-md",
        dropdownParent: "#modal-form"
    });*/

    $("body .dropdown-toggle").dropdown();

    $("body").on("click", ".bukaform ", function(e) {
        e.preventDefault();
        $.post(baseurl + "forms", function(data, status) {
            if (status == "success") {
                $("body #modal-form modal-body").html(data);
            }
        })
    });
    $('select#mhs').change(function(){
        $("#data").DataTable().destroy();
        id=$("#mhs").val();
        loadtagihan(id);
    })
    // alert($("#mhs").val());

});

function loadtagihan(id) {
    $(".tabeltarif").DataTable({
        "ajax": {
            "url": baseurl + "gettarif",
            "dataType": "json",
            "data": { id: id},
        },
        "sServerMethod": "POST",
        "bServerSide": true,
        "bAutoWidth": true,
        // "bDeferRender": true,
        "bSortClasses": false,
        "bscrollCollapse": true,
        // "bStateSave": true,
        "responsive": true,
        "scrollX": true,
        "sScrollX": true,
        "fixedHeader": true,
        "iDisplayLength": 25,
        "language": { "decimal": ",", "thousands": "." },
        "columnDefs": [{ "type": "html", "targets": 0 }],
    });
}