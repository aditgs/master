<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-form' data-load-remote="<?php echo base_url('bayar/forms') ?>" data-remote-target="#modal-form .modal-body.panel-body">bayar Baru</a>
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-form'>bayar Baru</a>
        <a href="<?php echo base_url('bayar/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka bayar Baru </a>
        <a href="<?php echo base_url('bayar') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data bayar</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data bayar</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
        <thead class="">
            <tr>
                
                <th>kode</th>
                
                <th>invoice</th>
                
                <th>itembayar</th>
                
                <th>tanggal</th>
                
                <th>bank</th>
                
                <th>refbank</th>
                
                <th>tglbank</th>
                
                <th>totalbayar</th>
                
                <th>sisabayar</th>
                
                <th>totaltagihan</th>
                
                <th>sisatagihan</th>
                
                <th>isvalidasi</th>
                
                <th>tglvalidasi</th>
                
                <th>isactive</th>
                
                <th>islocked</th>
                
                <th>isdeleted</th>
                
                <th>datedeleted</th>
                
                <th>userid</th>
                
                <th>datetime</th>
                
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-bordered">
            <tr>
                <td colspan="20" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
            </tr>
        </tbody>
    </table>
</div>