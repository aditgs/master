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
       /* kode=$(this).data('kodemhs');
        nim=$(this).data('mhs');
            $(".modaltarif").DataTable({
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
        });*/
    });
    $("#modal-form").on("shown.bs.modal", function() {
        loadtagihan();
        loadselect2();
    });
    $("#modal-form").on("hidden.bs.modal", function() {
        // tabeltarif.ajax.reload();
        $("#data").DataTable().destroy();
        
        

    });
    $("#modal-id").on("hidden.bs.modal", function() {
        $("#datatarif").DataTable().destroy();
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
    $("body").on("click",'#savepay', function(e) {
        e.preventDefault();
        // alert('halo');
        savepay();
    });  
    $("body ").on('click','#passform #saveval', function(e) {
        e.preventDefault();
        cekpass(0);
    }); 
    $("body ").on('click','.btncicil', function(e) {
        e.preventDefault();
        // toggleCicilan($(this).data('inv'),$(this).data('trf'),$(this).data('mhs'));
        var data={inv:$(this).data('inv'),trf:$(this).data('trf'),mhs:$(this).data('mhs')};
        toggleCicilan(data);
    }); 
    $("body ").on("click","#valform #saveval", function(e) {
        e.preventDefault();
        valid(0);
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
function handleCicilan(data){
    
 alert(data.inv + " " +data.trf);
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
function handleSubmitPay(data) {
    dx = JSON.parse(data);
    if (dx.st == 1) {
        // alert("Sukses"+dx.msg);
        $('#modal-notif').modal('toggle');
        $('#modal-id').modal('toggle');

    } else {
        $('#modal-alert').modal('toggle');
        $('#modal-alert .modal-body').html(dx.msg);
        $('#modal-id').modal('toggle');
        // alert(dx.msg);

    }

}
function toggleCicilan(data){
    // alert(inv);
    // alert(trf);
        $('#modal-validation').modal('toggle');
        $('#modal-bayar .modal-body #kodetagihan').prop("value",data.inv);
        $('#modal-bayar .modal-body #kodetarif').prop("value",data.trf);
        $('.cicilan input#bayar').trigger('focus');
        // $('#modal-bayar').modal('toggle');
    
}
function handleValidation(data){
    dx=JSON.parse(data);
    // alert(data);   
    // alert(dx);   
    if (dx.st == 1) {

        $('#modal-validation').modal('toggle');
        $('#modal-password').modal('toggle');
        $('#modal-password .modal-body').html(dx.view);
        // $('#modal-notif').modal('toggle');
        // $('#modal-notif .modal-body').html(dx.msg);
    } else {
        $('#modal-alert').modal('toggle');
        $('#modal-alert .modal-body').html(dx.msg);
        $('#modal-validation').modal('toggle');
    }
} 
function handleVerify(data){
    dx=JSON.parse(data);
    // alert(data);   
    // alert(dx);   
    if (dx.st == 1) {

        // $('#modal-validation').modal('toggle');
        $('#modal-password').modal('toggle');
        // $('#modal-password .modal-body').html(dx.view);
        $('#modal-notif').modal('toggle');
        $('#modal-notif .modal-body').html(dx.msg);
    } else {
        $('#modal-alert').modal('toggle');
        $('#modal-alert .modal-body').html(dx.msg);
        $('#modal-password').modal('toggle');
        // $('#modal-validation').modal('toggle');
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
                handleSubmitPay(data);
            }
        });
    });
}
function savepay() {
    var data = $('body form#valform').serializeArray();
    data.push({ name: 'ajax', value: 1 });

    $(this).ready(function() {
        $.ajax({
            url: baseurl + "submitpay",
            data: data,
            async: false,
            type: "POST",

            success: function(data, status) {
                handleSubmit(data);
            }
        });
    });
}
function valid(id) {
    var data = $('body form#valform').serializeArray();
    data.push({ name: 'ajax', value: 1 });

    $(this).ready(function() {
        $.ajax({
            url: baseurl + "cekval",
            data: data,
            async: false,
            type: "POST",

            success: function(data, status) {
                handleValidation(data);
                // alert(data);
            }
        });
    });
}
function cekpass() {
    var data = $('body form#passform').serializeArray();
    data.push({ name: 'ajax', value: 1 });

    $(this).ready(function() {
        $.ajax({
            url: baseurl + "verify",
            data: data,
            async: false,
            type: "POST",

            success: function(data, status) {
                handleVerify(data);
                // alert(data);
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
function loadselect2(){
    // alert('de');
  /*  $.getScript( assetsurl+"modules/enterevent.js" )
      .done(function( script, textStatus ) {
        console.log( textStatus );
      })
      .fail(function( jqxhr, settings, exception ) {
        // $( "div.log" ).text( "Triggered ajaxError handler." );
        alert('triiger');
    });*/
    $.ajax({
      url: assetsurl+'js/modules/loadselect2.js',
      dataType: "script",
      type:"post",
      success:function(success){
        // console.log('successs');
      }
    });
}
/*function getalltagihan(kode,nim) {
  
    // alert(kode);
    
}*/