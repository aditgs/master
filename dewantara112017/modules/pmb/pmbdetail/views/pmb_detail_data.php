<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-id'>pmb_detail Baru</a>
        <a href="<?php echo base_url('pmb_detail/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka pmb_detail Baru </a>
        <a href="<?php echo base_url('pmb_detail') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data pmb_detail</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data pmb_detail</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
        <thead class="">
            <tr>
                
                <th>kodepmb</th>
                
                <th>keterangan</th>
                
                <th>gel_id</th>
                
                <th>jalur_id</th>
                
                <th>date_start</th>
                
                <th>date_end</th>
                
                <th>date_seleksi_start</th>
                
                <th>date_seleksi_end</th>
                
                <th>time_start</th>
                
                <th>time_end</th>
                
                <th>pengawas</th>
                
                <th>ruang_test</th>
                
                <th>kodetarifdaftar</th>
                
                <th>userid</th>
                
                <th>datetime</th>
                
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-bordered">
            <tr>
                <td colspan="16" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
            </tr>
        </tbody>
    </table>
</div>