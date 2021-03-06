$(document).ready(function() {
    $("body #addcmhs").on("submit", function(e) {
        e.preventDefault();
        saveas(0);
    });
    $("body").on("click", "#save_edit", function(e) {
        e.preventDefault();
        var id = $('#id').val();
        save(id);

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
    $("#modal-form").on("hide.bs.modal", function() {
        // $('#modal-form .modal-body #addform #reset').trigger('click');
        $('.modal-body').find('input').val('');
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
    $("body").on("click", ".edit_mhspmb", function(e) {
        e.preventDefault();
        var id = $(this).attr("id");
        $(this).ready(function() {
            $.ajax({
                // url: baseurl + "get/" + id,
                url: baseurl + "get/",
                data: { id: id },
                type: "post",
                dataType: "json",
                success: function(data) {

                    for (var i in data) {
                        // alert(data);
                        $('body #modal-form .modal-body input[name="' + i + '"]').val(data[i]);
                    }
                    $('#body').val(data.body);
                    $('body #modal-form .modal-body button#save').hide(200);
                    $('body #modal-form .modal-body button#save_edit').fadeIn(200);

                }
            });

        });

    });
    $("#modal-notif").modal({ backdrop: 'static', keyboard: false, show: false });
    $("#modal-notif").on("hidden.bs.modal", function() {
        $(this).data("modal", null);
        window.location = baseurl;
        // $('#datatables').DataTable().ajax.reload();
    });

})

function handleSubmit(data) {
    dx = JSON.parse(data);
    if (dx.st == 1) {
        // alert("Sukses"+dx.msg);
        $('#modal-notif').modal('toggle');
        // $('#modal-form').modal('toggle');//nonaktifkan ini jika tidak pake modal
        return true;
    } else {
        $('#modal-alert').modal('toggle');
        $('#modal-alert .modal-body').html(dx.msg);
        // $('#modal-form').modal('toggle');//nonaktifkan ini jika tidak pake modal
        // alert(dx.msg);
        return false;

    }

}

function switchtodata() {
    $('button#save').fadeIn(200);
    $('button#save_edit').hide(200);
    // $('.kelola').fadeOut(200);

    $('#inside').addClass('active in');
    $('li.daftar').addClass('active');
    $('li.baru').removeClass('active');
    $('#outside').removeClass('active');

    $('#datatables').DataTable().clear(0).draw();
}

function saveas(id) {
    var data = $('body form#addcmhs').serializeArray();
    data.push({ name: 'ajax', value: 1 });

    $(this).ready(function() {
        $.ajax({
            url: baseurl + "submit",
            data: data,
            async: false,
            type: "POST",

            success: function(data, status) {
                if (handleSubmit(data) === true) {
                    switchtodata();
                };
            }
        });
    });
}