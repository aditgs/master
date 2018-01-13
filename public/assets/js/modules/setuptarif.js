$(document).ready(function() {
    $("body #addform").on("submit", function(e) {
        e.preventDefault();
        save(0);
    });
     $('select#tahun').change(function() {
        gen();
    });
     $('select#angkatan').change(function() {
        gen();
    });
    $('select#smster').change(function() {
        gen();
    });
    $('select#kelompok').change(function() {
        gen();
    });
    $('select#prodi').change(function() {
        gen();
    });
    $('select#jenis').change(function() {
        gen();
    });
});
function gen(){
	data = $('body form#addform').serializeArray();
	$.post(baseurl+"genkode",{data:data},function(dx,status){
		if(status=="success"){
			alert(dx);
		}
	});
	// dx = JSON.stringify(data);
	// alert(dx);
}
function handleSubmit(data) {
    dx = JSON.parse(data);
    if (dx.st == 1) {
        // alert("Sukses"+dx.msg);
        $('#modal-notif').modal('toggle');
        // $('#modal-form').modal('toggle');

    } else {
        $('#modal-alert').show();
        $('#modal-alert .modal-body').html(dx.msg);
        // $('#modal-form').modal('toggle');
        // alert(dx.msg);

    }
}
function save(id) {
    var data = $('body form#formtarif').serializeArray();
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