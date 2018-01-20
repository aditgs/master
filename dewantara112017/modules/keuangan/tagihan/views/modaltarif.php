<h3 class="tagihan text-center">Data Tagihan Mahasiswa (Belum Tertagih)</h3>
<select name="filter" id="filter" class="form-controls input-lg">
    <option value="0">Belum Tertagih</option>
    <option value="1" data-url="">Tertagih</option>
    <option value="2" data-url="">Tervalidasi</option>
</select>
<div class="table-responsive">
<table id="datatarif" class="tabeltarif table table-bordered table-condensed table-striped" style="width:100%">
    <thead class="">
        <tr style="width:100%">
            <th style="width:20%" class="text-center">Kode</th>
            <th style="width:40%" class="text-center">Keterangan</th>
            <th  style="width:20%" class="text-center">Tarif</th>
            <!-- <th style="width:10%" class="text-center">Aksi</th> -->
        </tr>
    </thead>
    <tbody class="table-bordered">
        <tr>
            <td colspan="6" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
        </tr>
    </tbody>
</table>
</div>
<input type="hidden" name="kodemhs" id="kodemhstag" value="<?php echo $kodemhs ?>">
<input type="hidden" name="nim" id="nim" value="<?php echo $nim ?>">
<script type="text/javascript">
    $('document').ready(function(){
        reloadtagihan()
        $('body').on('change','#filter',function(){
            $("#datatarif").DataTable().destroy();
            reloadtagihan();
        });
        

    
    });
    function reloadtagihan(){
           // function getalltagihan(kode,nim) {

        var kodemhs=$('input#kodemhstag').val();
        var nim=$('input#nim').val();
        var istagih=$('#filter').val();
        // alert(nim);  
        // alert(kodemhs);
        if($('#filter').val()==1){
            $('h3.tagihan').text('Data Tagihan Mahasiswa (Tertagih)');
        }else if($('#filter').val()==2){
            $('h3.tagihan').text('Data Tagihan Mahasiswa (Valid)');
        }else{
            $('h3.tagihan').text('Data Tagihan Mahasiswa (Belum Tertagih)');
        }

        $("#datatarif").DataTable({
            "ajax": {
                "url": baseurl + "getalltagihan",
                "dataType": "json",
                "data": { kodemhs:kodemhs,nim:nim,istagih:istagih},
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
    }
// }
</script>