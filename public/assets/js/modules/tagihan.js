$(document).ready(function() {
    id=$("#mhs").val();
    // if(id!==''||id!=='undefined'){
        loadtagihan();
    // }
    $("#mhs").select2({
        theme: "bootstrap input-md",
        dropdownParent: "#modal-form"
    });

    $("body .dropdown-toggle").dropdown();

    $("body").on("click", ".bukaform ", function(e) {
        e.preventDefault();
        $.post(baseurl + "forms", function(data, status) {
            if (status == "success") {
                $("body #modal-form modal-body").html(data);
            }
        })
    });
    $('select#mhs').change(function(){
        $("#data").DataTable().destroy();
        
        loadtagihan();
    });
    $('select#tahun').change(function(){
        $("#data").DataTable().destroy();
       
        loadtagihan();
    });
    $('select#kdsmster').change( function() {
        $("#data").DataTable().destroy();
        // sms=$(this).val();
       // alert("test  "+ this.checked);   
       loadtagihan();
    });
    $('select#kelompok').change( function() {
        $("#data").DataTable().destroy();
        // sms=$(this).val();
       // alert("test  "+ this.checked);   
       loadtagihan();
    });
    $("#selectall").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
        cekbox();
    });
   
   /* // alert($("#tahun").val());
    $('body tabel.tabeltarif #selectall').click (function () {
         var checkedStatus = this.checked;
        $('body tabel.tabeltarif tbody tr').find('td:first :checkbox,td > input.checkbox,td.checkbox :checkbox').each(function () {
            $(this).prop('checked', checkedStatus);
         });
    });*/

});
function cekbox(){
     // $("#selectall").click(function(){

            var favorite = [];

            $.each($("input[name='tarif[]']:checked"), function(){            

                favorite.push($(this).val());

            });
            alert(JSON.stringify(favorite));
            // alert("My favourite sports are: " + favorite.join(", "));

        // });
}

function loadtagihan() {
    id=$("select#mhs").val();
    tahun=$('select#tahun').val();
    sms=$('select#kdsmster').val();
    kel=$('select#kelompok').val();
    // tahun=$('#tahun').val();
    // if(typeof tabeltarif ==='undefined'|| tabeltarif === null){
        // alert('undefine');
        tabletarif=$("#data").DataTable({
            "ajax": {
                "url": baseurl + "gettarif",
                "dataType": "json",
                "data": { id: id,tahun:tahun,kdsmster:sms,kelompok:kel},
            },

            "sServerMethod": "POST",
            "bServerSide": true,
            "bAutoWidth": true,
            "bDeferRender": true,
            "bSortClasses": false,
            "bscrollCollapse": true,
            "bStateSave": true,
            "responsive": true,
            "scrollX": true,
            "sScrollX": true,
            "scrollY": 800,
            "fixedHeader": true,
            "iDisplayLength": 10,
            "language": { "decimal": ",", "thousands": "." },
            "columnDefs": [{ "orderable": false, "targets": 0 } ]
        });
    /*}else{
        // alert('defined');
        // $('.tabeltarif').dataTable().ajax.reload();tabeltarif.
        // $('#data').DataTable().ajax.reload();
        tabeltarif.ajax.reload();
        tabeltarif.clear(0).draw(); 


    }*/
}