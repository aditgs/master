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
    $('input[name="semester"]').change(function() {
        gen();
    }); 
    $('.kodetarif').change(function() {
    	var x=$(this).val();
    	var y=$(this).data("tarif");
    	var l=x.substr(0,4);
    	var r=x.substr(6,6);
    	var z=x+y;
        $(this).val(l+y+r);
    });
});

function gen(){
	// data = $('body form#addform').serializeArray();
	data=$('select').serializeArray();
	detail = $('body form input').serializeArray();
	data.push(
		{name:'id',value:$('#id').val()},
		{name:'smster',value:$('input[name="semester"]:checked').val()});
	// $.post(baseurl+"genkode",{data:JSON.stringify(data)},function(dx,status){
	$.post(baseurl+"genkode",{detail:detail,data:data},function(dx,status){
		if(status=="success"){
			$('.kodetarif').val(dx).trigger('change');

		}
	},'json');
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
        $('#modal-alert').modal('toggle');
        $('#modal-alert .modal-body').html(dx.msg);
        // $('#modal-form').modal('toggle');
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

/*
$("button").click(function(){
    var x = $("form").serializeArray();
    $.each(x, function(i, field){
        $("#results").append(field.name + ":" + field.value + " ");
    });
});
*/