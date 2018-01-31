<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-id'>pmb Baru</a>
        <a href="<?php echo base_url('pmb/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka pmb Baru </a>
        <a href="<?php echo base_url('pmb') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data pmb</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data pmb</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
        <thead class="">
            <tr>
                
                <th>kodepmb</th>
                
                <th>keterangan</th>
                
                <th>th_akad</th>
                
                <th>date_start</th>
                
                <th>date_end</th>
                
                <th>kuota</th>
                
                <th>kodetarifdaftar</th>
                
                <th>date_seleksi_start</th>
                
                <th>date_seleksi_end</th>
                
                <th>userid</th>
                
                <th>datetime</th>
                
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-bordered">
            <tr>
                <td colspan="12" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
            </tr>
        </tbody>
    </table>
</div>