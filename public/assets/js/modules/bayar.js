$(document).ready(function() {
	
    $("#mhs,#invoice").select2({
        theme: "bootstrap input-md",
        dropdownParent: "#modal-form"
    });
    $("#modal-form").on("shown.bs.modal", function() {
        loadtagihan();
    }); 
    $("#modal-form").on("hidden.bs.modal", function() {
        $("#data").DataTable().destroy();
        
    });
    $('#mhs').change(function(e) {
        e.preventDefault();
        mhs=$(this).val();
        getinvoice(mhs);
        $("#data").DataTable().destroy();

        loadtagihan();
    })
    $("#selectall").change(function() {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
        // loadjumlah(cekbox());
    });
    $('select#invoice').change(function(){
    	$("#data").DataTable().destroy();
    	loadtagihan();
    })
});
function loadtagihan() {
    id = $("select#invoice").val();
    mhs = $("select#mhs").val();
   
    tabletarif = $("#data").DataTable({
        "ajax": {
            "url": baseurl + "gettagihdetail",
            "dataType": "json",
            "data": { id: id,mhs:mhs },
        },

        "sServerMethod": "POST",
        "bServerSide": true,
        "bAutoWidth": true,
        "bDeferRender": true,
        "bSortClasses": false,
        "bscrollCollapse": true,
        "bStateSave": true,
        "responsive": true,
        "scrollX": true,
        "sScrollX": true,
        "fixedHeader": true,
        "iDisplayLength": 10,
        "language": { "decimal": ",", "thousands": "." },
        "columnDefs": [{ "orderable": false, "targets": 0 }]
    });
}
function getinvoice(mhs) {
    $("select#invoice option").remove();
    // $.getJSON(baseurl+"dropdown_satuan/"+id, function (data) {
    $.post(baseurl + "getdropinvoice/", { mhs: mhs }, function(dtx,status) {
        data = JSON.parse(dtx);
        $.each(data, function(index, item) {
            $("#invoice").append(
                $("<option></option>").val(index).html(item)
            );
        });
    });
    console.clear();
}