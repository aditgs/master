$(document).ready(function() {
	
    $("#mhs,#invoice").select2({
        theme: "bootstrap input-md",
        dropdownParent: "#modal-form"
    });
    $("#modal-form").on("shown.bs.modal", function() {
        loadtagihan();
    });
    $('#mhs').change(function(e) {
        e.preventDefault();
        mhs=$(this).val();
        getinvoice(mhs);
        $("#data").DataTable().destroy();

        loadtagihan();
    })
    $('select#invoice').change(function(){
    	$("#data").DataTable().destroy();
    	loadtagihan();
    })
    $("#modal-notif").modal({ backdrop: 'static', keyboard: false, show: false });
    $("#modal-notif").on("hidden.bs.modal", function() {
        $(this).data("modal", null);
        window.location = baseurl;
        // $('#datatables').DataTable().ajax.reload();
    });
    $("body #addform").on("submit", function(e) {
        e.preventDefault();
        save(0);
    });
    $("body").on("click", ".delete", function(e) {
        e.preventDefault();
        var del_data = {
            id: $(this).attr("id"),
            ajax: 1
        }
        if (confirm('Anda Yakin Ingin Menghapus?')) {
            $(this).ready(function() {

                $.ajax({
                    url: baseurl + "delete/",
                    type: 'POST',
                    data: del_data,
                    success: function(msg) {
                        $('#datatables').DataTable().clear(0).draw();
                    }
                });
            });
        }
    });
});
function handleSubmit(data) {
    dx = JSON.parse(data);
    if (dx.st == 1) {
        // alert("Sukses"+dx.msg);
        $('#modal-notif').modal('toggle');
        $('#modal-form').modal('toggle');

    } else {
        $('#modal-alert').modal('toggle');
        $('#modal-alert .modal-body').html(dx.msg);
        $('#modal-form').modal('toggle');
        // alert(dx.msg);

    }
}

function save(id) {
    var data = $('body form#addform').serializeArray();
    data.push({ name: 'ajax', value: 1 });

    $(this).ready(function() {
        $.ajax({
            url: baseurl + "submit",
            data: data,
            async: false,
            type: "POST",

            success: function(data, status) {
                handleSubmit(data);
            }
        });
    });
}
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