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