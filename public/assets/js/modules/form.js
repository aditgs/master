$("body").on("click", ".genfaktur", function(e) {
    e.preventDefault();
    new_faktur();
});

function new_faktur() {
    $.post(baseurl + "getnewfaktur", function(data, status) {
        // data=base64(0,dt);
        dtx = JSON.parse(data);
        if (status === 'success') {
            // alert(data);
            $("#id").prop('value', dtx.idx);
            $("#kode").prop("value", dtx.kode);
            $(".genfaktur").addClass('disabled');
            showform();
        }
    })

    function showform() {
        $(".btnsubmit").removeClass('hidden');
        $(".genfaktur").addClass('disabled');
    }

}