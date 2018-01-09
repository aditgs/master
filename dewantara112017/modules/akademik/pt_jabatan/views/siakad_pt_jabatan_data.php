<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-id'>PT Jabatan Baru</a>
        <a href="<?php echo base_url('pt_jabatan/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka PT Jabatan Baru </a>
        <a href="<?php echo base_url('pt_jabatan') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data PT Jabatan</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data PT Jabatan</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
        <thead class="">
            <tr>
                
                <th>ID PT Struktur Jabatan</th>
                
                <th>NIP Pejabat</th>
                
                <th>Periode Jabatan Awal</th>
                
                <th>Periode Jabatan Akhir</th>
                
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-bordered">
            <tr>
                <td colspan="5" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
            </tr>
        </tbody>
    </table>
</div>