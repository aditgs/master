$("body").on("click", "#cek_laporan_po", function(e) {
    e.preventDefault();
    var v = $("#idsp").val();
    var data = $("form#laporan_po").serializeArray();
    // get_var_laporan();
    get_laporan_po(data);
    console.clear();
});

function get_var_laporan() {
    $("#startx").val($("#start").val());
    $("#endx").val($("#end").val());
    $("#laporanx").val($("#opt_laporan").val());
    $("#id_customerx").val($("#idcs").val());
}

function get_laporan_po(data) {
    $.post(baseurl + 'laporan/get_laporan', data, function(datax) {
        $(".laporan").html(datax);

    });
}
