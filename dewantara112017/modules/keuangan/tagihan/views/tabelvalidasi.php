<?php print_r($baseurl); ?>
<table id="data" class="tabelvalidasi table table-bordered table-condensed table-striped" style="width:100%">
    <thead class="">
        <tr>
            <th style="width:10%" class="text-center">
                <label>Valid</label>
                <input type="checkbox" name="all" id="all" class="all">
            </th>
            <th style="width:20%" class="text-center">Kode</th>
            <th style="width:40%" class="text-center">Keterangan</th>
            <th style="width:20%" class="text-center">Tarif</th>
            <th style="width:10%" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody class="table-bordered">
        <tr>
            <td colspan="6" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
        </tr>
    </tbody>
</table>
<input id="id" type="text" name="id" value="<?php echo isset($id)?$id:0 ?>">
<script type="text/javascript">
$(document).ready(function() {
    // var formurl='<?php echo $baseurl ?>/';
    // alert(formurl);
    reload();
    $("#all").change(function() {
        $("input:checkbox").prop('checked', $(this).prop("checked"));

    });
    $('body').on("click", ".validasi", function() {
        idx=$(this).val();
        validation(idx);
    });
});
function reload(){
    var id = <?php echo isset($id)?$id:0 ?>;
    if(typeof tabeltarif ==='undefined'|| tabeltarif === null){
     
        tabletarif = $(".tabelvalidasi").DataTable({
            "ajax": {
                "url": baseurl + "getvalidation",
                "dataType": "json",
                "data": { id: id },
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
    }else{
        // alert('defined');
        // $('.tabeltarif').dataTable().ajax.reload();tabeltarif.
        // $('#data').DataTable().ajax.reload();
        tabeltarif.ajax.reload();
        tabeltarif.clear(0).draw(); 


    }
}
function validation(idx){
    // alert(id);
    $.post(baseurl+'validation',{idval:idx},function(data,status){
        if(status=='success'){
            alert(data);
            reload();
        }
    });
}
</script>