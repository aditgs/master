<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-id'>pmb_jalur Baru</a>
        <a href="<?php echo base_url('pmb_jalur/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka pmb_jalur Baru </a>
        <a href="<?php echo base_url('pmb_jalur') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data pmb_jalur</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data pmb_jalur</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
        <thead class="">
            <tr>
                
                <th>kodejalur</th>
                
                <th>keterangan</th>
                
                <th>kodetarifdaftar</th>
                
                <th>syaratketentuan</th>
                
                <th>file</th>
                
                <th>userid</th>
                
                <th>datetime</th>
                
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-bordered">
            <tr>
                <td colspan="8" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
            </tr>
        </tbody>
    </table>
</div>