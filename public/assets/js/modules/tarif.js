$(document).ready(function() {
    $("#modal-form").on("hidden.bs.modal", function() {
        $('#modal-form .modal-body #addform #reset').trigger('click');
    });
    $("body").on("click", ".edite", function(e) {
        e.preventDefault();
        /* $('#outside').addClass('active in');
         $('li.baru').addClass('active');
         $('li.daftar').removeClass('active');
         $('#inside').removeClass('active');
         $('.kelola').show(200);
        */
        var id = $(this).attr("id");
        $(this).ready(function() {
            $.ajax({
                // url: baseurl + "get/" + id,
                url: baseurl + "get/",
                data:{id:id},
                type: "post",
                dataType: "json",
              	success: function(data) {
              		// console.log("oke");
              		// $('body #modal-form .modal-body').html("oke");
                    for (var i in data) {
                        // alert(data.id_penyakit);
                        $('body #modal-form .modal-body input[name="' + i + '"]').val(data[i]);

                        //gunakan ini untuk repopulate select option ke form dengan ajax
                        $("body #modal-form .modal-body select#" + i + "").find('option').selectit(i, data[i]);
                        $("body #modal-form .modal-body .checkbox").find('input[type="checkbox"]').checkit(i, data[i]);
                        $("body #modal-form .modal-body .radio").find('input[type="radio"]').checkit(i, data[i]);
                    }
                    $('#body').val(data.body);
                    $('body #modal-form .modal-body button#save').hide(200);
                    $('body #modal-form .modal-body button#save_edit').fadeIn(200);

                }
            });

        });

    });
})