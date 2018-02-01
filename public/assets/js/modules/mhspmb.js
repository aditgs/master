$(document).ready(function() {
    $("#modal-form").on("hide.bs.modal", function() {
        // $('#modal-form .modal-body #addform #reset').trigger('click');
        $('.modal-body').find('input').val('');
         // function resetall(){
            $.fn.clearForm = function() {
              return this.each(function() {
                var type = this.type, tag = this.tagName.toLowerCase();
                if (tag == 'form')
                  return $(':input',this).clearForm();
                if (type == 'text' || type=='hidden' || type == 'password' || tag == 'textarea')
                  this.value = '';
                else if (type == 'checkbox' || type == 'radio')
                  this.checked = false;
                else if (tag == 'select')
                  this.selectedIndex = -1;
              });
            };
        // }
    });
    $("body").on("click", ".edit_mhspmb", function(e) {
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
