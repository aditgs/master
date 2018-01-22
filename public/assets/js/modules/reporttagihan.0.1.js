$(document).ready(function() {

    $("body").on("click", "#ceklaporan", function(e) {
        e.preventDefault();
        var data = $("form#laporan_po").serializeArray();
        get_laporan(data);
        console.clear();
    });
});

function get_laporan(data) {
    // alert(data);
    $.post(baseurl + 'laporan/get_laporan', data, function(datax) {
        $(".laporan").html(datax);

    });
}