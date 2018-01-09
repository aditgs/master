<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-id'>Prodi Jabatan Baru</a>
        <a href="<?php echo base_url('prodi_jabatan/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Prodi Jabatan Baru </a>
        <a href="<?php echo base_url('prodi_jabatan') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Prodi Jabatan</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data Prodi Jabatan</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
        <thead class="">
            <tr>
                
                <th>Kode Prodi</th>
                
                <th>ID Siakad Prodi Struktur Jabatan</th>
                
                <th>NIP Prodi</th>
                
                <th>Prodi Jabatan Awal</th>
                
                <th>Prodi Jabatan Akhir</th>
                
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-bordered">
            <tr>
                <td colspan="6" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
            </tr>
        </tbody>
    </table>
</div>