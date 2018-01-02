$(document).ready(function() {
    id=$("#mhs").val();
    // if(id!==''||id!=='undefined'){
        loadtagihan();
    // }
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
        
        loadtagihan();
    });
    $('select#tahun').change(function(){
        $("#data").DataTable().destroy();
       
        loadtagihan();
    });
    $('input[type=radio]').change( function() {
        $("#data").DataTable().destroy();
        // sms=$(this).val();
       // alert("test  "+ this.checked);   
       loadtagihan();
    });
    // alert($("#tahun").val());

});

function loadtagihan() {
    id=$("select#mhs").val();
    tahun=$('select#tahun').val();
    sms=$('input[type=radio]').val();
    // tahun=$('#tahun').val();
    // if(typeof(tabeltarif)=='undefined'){
    var tabeltarif=$(".tabeltarif").DataTable({
        "ajax": {
            "url": baseurl + "gettarif",
            "dataType": "json",
            "data": { id: id,tahun:tahun,kodesmster:sms},
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
    // }else{
        // tabeltarif.
    // }
}