function switchtoggle(id) {

    $('#datatoggle .input-toggle').unbind().bind('change', function(e) {
        e.preventDefault();

        if ($(this).is(':checked') === true) {
            updstatus(id, 'open');
        } else {
            updstatus(id, 'close');
        }
    });
}

function updstatus(id, stat) {
    $.post(baseurl + 'updstatus', { id: id, stat: stat }, function(data, status) {
        // if (status == 'success') {
        //     alert('sukses');
        // }
    });
    // $('#datatables').DataTable().clear(0).draw();
    console.clear();
}