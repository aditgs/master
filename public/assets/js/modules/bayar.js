$(document).ready(function() {
    $("#mhs,#invoice").select2({
        theme: "bootstrap input-md",
        dropdownParent: "#modal-form"
    });

    $('#mhs').change(function(e) {
        e.preventDefault();
        mhs=$(this).val();
        getinvoice(mhs);
    })

});

function getinvoice(mhs) {
    $("select#invoice option").remove();
    // $.getJSON(baseurl+"dropdown_satuan/"+id, function (data) {
    $.post(baseurl + "getdropinvoice/", { mhs: mhs }, function(dtx,status) {
        data = JSON.parse(dtx);
        $.each(data, function(index, item) {
            $("#invoice").append(
                $("<option></option>").val(index).html(item)
            );
        });
    });
    console.clear();
}