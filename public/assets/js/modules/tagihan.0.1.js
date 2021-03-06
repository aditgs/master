$(document).ready(function() {
    id = $("#mhs").val();

    $("#mhs").select2({
        theme: "bootstrap input-md",
        dropdownParent: "#modal-form"
    });
    $("#mahasiswa").select2({
        theme: "bootstrap input-lg",
        
    });
    
    $(".modal").modal({ backdrop: 'static', keyboard: false, show: false });
    $('select#mhs').change(function() {
        $("#data").DataTable().destroy();

        loadtagihan();
    });
    $('select#tahun').change(function() {
        $("#data").DataTable().destroy();

        loadtagihan();
    });
    $('select#kdsmster').change(function() {
        $("#data").DataTable().destroy();
        loadtagihan();
    });
    $('select#kelompok').change(function() {
        $("#data").DataTable().destroy();
        loadtagihan();
    });
    $("#selectall").change(function() {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
        loadjumlah(cekbox());
    });
    $("body").on("click", "input[name='tarif[]']", function() {
        loadjumlah(cekbox());
    });
    $("body").on("click", "a.bymhs", function() {
        // loadjumlah(cekbox());
          // kodemhs=$(this).data('kodemhs');
        // nim=$(this).data('mhs');
        // getalltagihan(kodemhs,nim);
        // $("#modal-form").on("shown.bs.modal", function() {
            // if (!$('#modal-id').is(':visible')) {
            // if($('#modal-id').hasClass('in')){
                // alert(!$('#modal-id').hasClass('in'));
                // if modal is not shown/visible then do something
                // alert('hallo');
            // }
        // });
    });
    $("#modal-form").on("shown.bs.modal", function() {
        loadtagihan();
    });
    $("#modal-form").on("hidden.bs.modal", function() {
        // tabeltarif.ajax.reload();
        $("#data").DataTable().destroy();
        

    });
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
function dropDownFixPosition(button,dropdown){
      var dropDownTop = button.offset().top + button.outerHeight();
        dropdown.css('top', dropDownTop + "px");
        dropdown.css('left', button.offset().left + "px");
}
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

function cekbox() {
    var favorite = [];
    $.each($("input[name='tarif[]']:checked"), function() {
        favorite.push($(this).val());
    });
    data = JSON.stringify(favorite);
}

function loadjumlah() {

    $.post(baseurl + "getjumlah", { data: data }, function(data, status) {
        // alert(data);
        dt = JSON.parse(data);

        if(dt.jml>5 && dt.st==0){
            $('#modal-alert').modal('toggle');
             $('#modal-alert .modal-body').html(dt.msg);
            $( "#save" ).prop( "disabled", true );

        }else{
            $( "#save" ).prop( "disabled",false );

        }
        if (status == "success") {

            $("#modal-form .modal-body #total").val(dt.total);
        }
    });

}

function loadtagihan() {
    id = $("select#mhs").val();
    tahun = $('select#tahun').val();
    sms = $('select#kdsmster').val();
    kel = $('select#kelompok').val();
    tabletarif = $("#data").DataTable({
        "ajax": {
            "url": baseurl + "gettarif",
            "dataType": "json",
            "data": { id: id, tahun: tahun, kdsmster: sms, kelompok: kel },
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
/*function getalltagihan(kode,nim) {
  
    // alert(kode);
    $("#data").DataTable({
        "ajax": {
            "url": baseurl + "getalltagihan",
            "dataType": "json",
            "data": { kodemhs:kode,nim:nim },
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
}*/