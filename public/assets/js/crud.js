/*
    AJAX CRUD JS BETA
    ===================
    Digunakan untuk crud standar berbasis codeigniter
    Dibuat: 2013
    Dikompilasikan: 01/09/2014 - Updated: 29/12/2014
    Pengembang: Syahroni Wahyu Iriananada - roniwahyu@gmail.com 
    Update: 
    29 Desember 2014 - Memperbaiki Form Reset 
    27 November 2015 - Dibuat untuk menyesuaikan dengan proyek MURIA PS
    25 Novermber 2017 - Memperbaiki body click #save menjadi on submit guna menghindari duplikat post parameter
*/

$(document).ready(function() {
    $("form").submit(function() {
        $(this).submit(function() {
            return false;
        });
        return true;
    });

    // $("body").on("click","#save",function(e){
    $("body #addform").on("submit", function(e) {
        e.preventDefault();
        save(0);
    });
    $("body").on("click", "#saverealisasi", function(e) {
        e.preventDefault();
        // saveto   (0,'#realisasi',baseurl);
    });
    $("body").on("click", "#savedetail", function(e) {
        e.preventDefault();
        // saveto(0,'#detail_realisasi',detailurl);
    });
    $("body").on("click", "#savedok", function(e) {
        e.preventDefault();
        // saveto(0,'#dok_realisasi',dokurl);
    });
    $("body").on("click", "#submitall", function(e) {
        e.preventDefault();

        saveto(0, '#realisasi', baseurl);
        // alert($('#cookie #idnya').attr('value'));
        alert('Data Realisasi Disimpan..');

        var pk = $('#cookie #idnya').val();

        // var pk=$.session.get('id_realisasi');
        // alert(pk);
        saveto(pk, '#detail_realisasi', detailurl);
        $('#dok_realisasi .idreal_upload').val(pk);
        saveto(pk, '#dok_realisasi', dokurl);



        // $('#dokupload').);

    });



    $("body").on("click", "#save_edit", function(e) {
        e.preventDefault();
        var id = $('#id').val();
        // var id=$(this).attr("id");
        // alert ($(this).attr("id"));
        save(id);

    });

    $("body").on("click", '.baru', function(e) {
        e.preventDefault();
        // save(0);
        // $('.form').trigger("reset");
        $('button#save_edit').hide(200);
        $('button#save').fadeIn(200);
        $('form').clearForm();
        var id = 0;

        //tampilkan div class kelola dan form didalamnya                       
        $('.kelola').show(200);
        // alert(id);
    });


    $("body").on("click", '.reset', function(e) {
        e.preventDefault();
        // $(".reset").click(function() {
        // $(this).closest('form').find("input[type=text],input[type=hidden], textarea").val("");
        // $(this).closest('form').find("input[type=text],input[type=hidden], textarea").reset();
        $('button#save_edit').hide(200);
        $('button#save').fadeIn(200);
        $('form').clearForm();

        var id = null;
    });

    $('#modal-id').on('close.bs.modal', function() {
        // do something…
        alert('ok');
        $('.modal-body form').clearForm();
    })
    $("body").on("click", '.batal', function(e) {
        e.preventDefault();
        // save(0);
        // $('.form').trigger("reset");
        $('form').clearForm();
        //sembunyikan div class kelola dan form didalamnya      
        $('.kelola').fadeOut(100);
        $('button#save').fadeIn(200);
        $('button#save_edit').hide(200);
        // $('.kelola').fadeOut(200);

        $('#datatables').DataTable().clear(0).draw();


        $('#inside').addClass('active in');
        $('li.daftar').addClass('active');
        $('li.baru').removeClass('active');
        $('#outside').removeClass('active');

    });

    $("body").on("click", ".edit", function(e) {
        e.preventDefault();
        $('#outside').addClass('active in');
        $('li.baru').addClass('active');
        $('li.daftar').removeClass('active');
        $('#inside').removeClass('active');
        $('.kelola').show(200);

        var id = $(this).attr("id");
        $(this).ready(function() {
            $.ajax({
                url: baseurl + "get/" + id,
                type: "get",
                dataType: "json",
                success: function(data) {

                    for (var i in data) {
                        // alert(data.id_penyakit);
                        $('input[name="' + i + '"]').val(data[i]);

                        //gunakan ini untuk repopulate select option ke form dengan ajax
                        $("select#" + i + "").find('option').selectit(i, data[i]);
                        $(".checkbox").find('input[type="checkbox"]').checkit(i, data[i]);
                        $(".radio").find('input[type="radio"]').checkit(i, data[i]);
                    }
                    $('#body').val(data.body);
                    $('button#save').hide(200);
                    $('button#save_edit').fadeIn(200);

                }
            });

        });

    });

    $("body").on("click", ".alat", function(e) {
        e.preventDefault();
        var id = $(this).attr("id");
        var id2 = id.substr(id.length - 1);
        var alat = "alat" + id2;
        if ($(this).is(":checked")) {
            $("#" + alat).css("display", "block");
        } else {
            $("#" + alat).css("display", "none");
        }
    });


    $("body").on("click", ".detail", function(e) {
        e.preventDefault();
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

    function save(id) {
        // $('body button#save').attr("disabled","disabled");
        // $('body button#save').val("Submitting...");
        var data = $('body form#addform').serializeArray();
        data.push({ name: 'ajax', value: 1 });
        // alert();
        // $.post(baseurl+"submit", data);
        // console.log(data);
        $(this).ready(function() {
            $.ajax({
                url: baseurl + "submit",
                data: data,
                async: false,
                type: "POST",
                beforeSend: function() {

                },
                success: function() {
                    $('button#save').fadeIn(200);
                    $('button#save_edit').hide(200);
                    // $('.kelola').fadeOut(200);

                    $('#inside').addClass('active in');
                    $('li.daftar').addClass('active');
                    $('li.baru').removeClass('active');
                    $('#outside').removeClass('active');

                    $('#datatables').DataTable().clear(0).draw();

                    // $('button[type=submit], input[type=submit]').prop('disabled',true);
                    // va/r id=0;
                    //$('.id').trigger("reset");
                    // alert(data);
                }
            });
        });
    }

    function saveto(id, form, formurl) {
        // var idnya='';
        var datax = $(form).serializeArray();
        datax.push({ name: 'ajax', value: 1 });
        // if(id){
        datax.push({ name: 'id_realisasi', value: id });
        // }
        // $.post(baseurl+"submit", data);
        // var hasil=id;
        $(this).ready(function() {
            $.ajax({
                url: formurl + "submit",
                data: datax,
                type: "POST",
                success: function(data) {
                    $('button#save').fadeIn(200);
                    $('button#save_edit').hide(200);
                    $("#cookie").html("<input type='text' id='idnya' name='idnya' value='" + data + "'>");
                    // idnya=data;
                    // alert(data);
                    // $.session.set('id_realisasi', data);
                    if (form == '#dok_realisasi') {
                        $("<input type='text' id='id_realisasi' name='id_realisasi' value='" + data + "'>").appendTo($("#dok_realisasi"));
                        $('#dokupload').click();
                        alert('File Terupload');
                    };
                }
            });
        });
        // return hasil;
        // console.log(idnya);
        // return callback(data);
    }


});

// function resetall(){
$.fn.clearForm = function() {
    return this.each(function() {
        var type = this.type,
            tag = this.tagName.toLowerCase();
        if (tag == 'form')
            return $(':input', this).clearForm();
        if (type == 'text' || type == 'hidden' || type == 'password' || tag == 'textarea')
            this.value = '';
        else if (type == 'checkbox' || type == 'radio')
            this.checked = false;
        else if (tag == 'select')
            this.selectedIndex = -1;
    });
};
// }
/*$.fn.updateform=function(id,v){
    return this.each(function(){
        var type = this.type;
        if(type=='select')
    });
}*/
//kendalikan select box/repopulate selection option with ajax
$.fn.selectit = function(id, v) {
    return this.each(function() {
        if ($(this).val() == v) {
            $(this).attr('selected', 'selected');
        }
    });
}
$.fn.checkit = function(id, v) {
    // alert(id+" - "+v);
    // alert($(this).val());
    return this.each(function() {
        if ($(this).val() == v) {
            // if($(id).val()==v){
            // $(this).attr('checked','checked');
            $(this).prop('checked', true);
            // $(id).attr('checked','checked');
        } else {
            // $(this).attr('checked','');
            $(this).prop('checked', false);
        }
    });
}
//kendalikan select box/repopulate selection option with ajax
//ini dapat berlaku sukses apabila nama element radio atau checkbox tidak sama dengan id nya
/*$.fn.checkit=function(id){
     return this.each(function(){
        if($(this).val()==($('#'+id+'').val())){
             $(this).attr('checked','checked');
             // alert(id);
        }
    });
}*/
/*$.fn.checkit=function(){
     return this.each(function(){
        if($('#id_gejala').attr('data-id')==(data[i].kode)){
                                 // $('#id_gejala').attr('checked','checked');
                                $('input[data-id='+data[i].kode+']').attr('checked','checked');
                            }
    });
}
*/