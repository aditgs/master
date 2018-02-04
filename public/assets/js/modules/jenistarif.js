$(document).ready(function() {
    $("#modal-form").on("hidden.bs.modal", function() {
        // $('#modal-form .modal-body #addform #reset').trigger('click');
        $('.modal-body').find('input').val('');
    });
      $("body").on("click","#save_edit",function(e){
            e.preventDefault();
                var id=$('#modal-form .modal-body #id').val();
                alert(id);
                saveas(id);

        });   
    $("body #addjenis").on("submit", function(e) {
        e.preventDefault();
        saveas(0);
    }); 
    $("body").on("click", ".edit_jenis_tarif", function(e) {
        e.preventDefault();
        var id = $(this).attr("id");
        $(this).ready(function() {
            $.ajax({
                // url: baseurl + "get/" + id,
                url: baseurl + "get/",
                data:{id:id},
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
    
})
function handleSubmit(data) {
    dx = JSON.parse(data);
    if (dx.st == 1) {
        // alert("Sukses"+dx.msg);
        $('#modal-notif').modal('toggle');
        $('#modal-form').modal('toggle');
    } else { //status st=0
        $('#modal-alert').modal('toggle');
        $('#modal-alert .modal-body').html(dx.msg);
        $('#modal-form').modal('toggle');
        // alert(dx.msg);
    }
}
function saveas(id) {
    var data = $('body form#addjenis').serializeArray();
    alert(JSON.parse(data));
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