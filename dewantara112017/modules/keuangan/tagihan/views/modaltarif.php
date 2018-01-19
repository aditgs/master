<div class="table-responsive">
    
<table id="data" class="tabeltarif table table-bordered table-condensed table-striped" style="width:100%">
    <thead class="">
        <tr style="width:100%">
            <th style="width:20%" class="text-center">Kode</th>
            <th style="width:40%" class="text-center">Keterangan</th>
            <th  style="width:20%" class="text-center">Tarif</th>
            <th style="width:10%" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody class="table-bordered">
        <tr>
            <td colspan="6" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
        </tr>
    </tbody>
</table>
</div>
<input type="text" name="kodemhs" id="#kodemhstag" value="<?php echo $kodemhs ?>">
<input type="text" name="nim" id="#nim" value="<?php echo $nim ?>">
<script type="text/javascript">
    // $('document').ready(function(){

    // function getalltagihan(kode,nim) {
    kodemhs=$('input#kodemhstag').val();
    nim=$('input#nim').val();
    alert(nim);  
    alert(kodemhs);

    $(".tabeltarif").DataTable({
        "ajax": {
            "url": baseurl + "getalltagihan",
            "dataType": "json",
            "data": { kodemhs:kodemhs,nim:nim },
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
        "fixedHeader": true,
        "iDisplayLength": 10,
        "language": { "decimal": ",", "thousands": "." },
        "columnDefs": [{ "orderable": false, "targets": 0 }]
    });
    // });
// }
</script>