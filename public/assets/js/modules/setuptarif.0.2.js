$(document).ready(function() {
    $("body #addform").on("submit", function(e) {
        e.preventDefault();
        save(0);
    });
    $('select#tahun').change(function() {
        gen();
    });
    $('select#angkatan').change(function() {
        getformgen();
        gen();
    });
    $('select#smster').change(function() {
        gen();
    });
    $('select#kelompok').change(function() {
        gen();
    });
    $('select#prodi').change(function() {
        getformgen();
        gen();
    });
    $('select#jenis').change(function() {
        gen();
    });
    $('input[name="semester"]').change(function() {
        gen();
    });
    $('.kodetarif').change(function() {
        var x = $(this).val();
        // console.log(x);
        var y = $(this).data("tarif");
        // console.log(y);
        // alert(y);
        var l = x.substr(0, 4);
        // console.log(l);
        var r = x.substr(6, 6);
        // console.log(r);
        var z = x + y;
        // console.log(z);
        $(this).val(l + y + r);
    })
    $(".modal").modal({ backdrop: 'static', keyboard: false, show: false });
    $("body .dropdown-toggle").dropdown();

    $("#modal-notif").modal({ backdrop: 'static', keyboard: false, show: false });
    $("#modal-notif").on("hidden.bs.modal", function() {
        $(this).data("modal", null);
        window.location = baseurl;
        // $('#datatables').DataTable().ajax.reload();
    });
    /*$('.inputs').keydown(function (e) {
            alert('keydown');
         if (e.which === 13) {
             var index = $('.inputs').index(this) + 1;
             $('.inputs').eq(index).focus();
         }
     });
    $('#addform').on('keyup keypress', function(e) {
          var keyCode = e.keyCode || e.which;
          if (keyCode === 13) { 
            e.preventDefault();
            return false;
        }
    });*/
});

function gen() {
    // data = $('body form#addform').serializeArray();
    data = $('select').serializeArray();
    detail = $('body form input').serializeArray();
    data.push({ name: 'id', value: $('#id').val() }, { name: 'smster', value: $('input[name="semester"]:checked').val() });
    // $.post(baseurl+"genkode",{data:JSON.stringify(data)},function(dx,status){
    $.post(baseurl + "genkode", { detail: detail, data: data }, function(dx, status) {
        // dd=JSON.parse(dx);
        // alert($('.kodetarif').val());
        if (status == "success") {
            if(dx.st==1){

                // $('.kodetarif').val(dx.kode).trigger('change');
                $('.kodetarif').val(dx.kode).change();
                $( "#save" ).prop( "disabled",false );
            }else{
                $('#modal-alert').modal('toggle');
                $('#modal-alert .modal-body').html(dx.msg);
                $( "#save" ).prop( "disabled", true );

            }
        }
    }, 'json');
    // dx = JSON.stringify(data);
    // alert(dx);
}
function genkodetarif(){

        // alert('change');
        var x = $(this).val();
        // console.log(x);
        var y = $(this).data("tarif");
        // console.log(y);
        // alert(y);
        var l = x.substr(0, 4);
        // console.log(l);
        var r = x.substr(6, 6);
        // console.log(r);
        var z = x + y;
        // console.log(z);
        return $(this).val(l + y + r);
    
}
function getformgen(){
    id=$('select#prodi').val();
    $.post(baseurl+'getformkodejenis',{id:id},function(data,status){
        if(status=='success'){
            $('.genkodejenis').html(data);

            enterev();
            $('.kodetarif').trigger('change');

        }
    });
    
}
function enterev(){
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
      url: assetsurl+'modules/enterevent.js',
      dataType: "script",
      type:"post",
      success:function(success){
        // console.log('successs');
      }
    });
}

function handleSubmit(data) {
    // alert(data);
    dx = JSON.parse(data);
    if (dx.st == 1) {
        // alert("Sukses"+dx.msg);
        $('#modal-notif').modal('toggle');
        $('#modal-notif .modal-body').html(dx.msg);
        // $('#modal-form').modal('toggle');
    } else {
        $('#modal-alert').modal('toggle');
        $('#modal-alert .modal-body').html(dx.msg);
        // $('#modal-form').modal('toggle');
        // alert(dx.msg);
    }
}

function save(id) {

    var data = {};
    data.id = $('#id').val();
    data.angkatan = $('#angkatan').val();
    data.prodi = $('#prodi').val();
    data.jenis = $('#jenis').val();
    data.kelompok = $('#kelompok').val();
    data.tahun = $('#tahun').val();
    data.semester = $('input[name="semester"]').val();
    data.ajax = 1;
    // var detail={};
    var kdtarif = $('body form .kodetarif').serializeArray();
    var tarif = $('body form .nilaitarif').serializeArray();
    data.kode = kdtarif;
    data.tarif = tarif;

    $(this).ready(function() {
        $.ajax({
            url: baseurl + "submit",
            data: data,
            async: false,
            type: "POST",
            success: function(dx, status) {
                // alert(dx);
                handleSubmit(dx);
            }
        });
    });
}


/*function save(id){
    var data={};
    var data=$('body form#addform').serializeArray();
    data.ajax=1;
    $.post(baseurl+'submit',{data:data},function(dx,status){
        if(status=='success'){
            alert(dx);
            
        }
    },'json');
}*/
/*function save(id) {
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
}*/

/*
$("button").click(function(){
    var x = $("form").serializeArray();
    $.each(x, function(i, field){
        $("#results").append(field.name + ":" + field.value + " ");
    });
});
*/