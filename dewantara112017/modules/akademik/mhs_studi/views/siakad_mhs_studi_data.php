<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-id'>Mahasiswa Baru</a>
        <a href="<?php echo base_url('mhs_studi/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Mahasiswa Baru </a>
        <a href="<?php echo base_url('mhs_studi') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Mahasiswa</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data Mahasiswa</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
        <thead class="">
            <tr>
                
                <th>Nim Mahasiswa</th>
                
                <th>ID Jadwal</th>
                
                <th>Kode Akademik</th>
                
                <th>Kode MK</th>
                
                <th>Status Studi</th>
                
                <th>Nilai Tugas</th>
                
                <th>Nilai UTS</th>
                
                <th>Nilai UAS</th>
                
                <th>Nilai AKhir</th>
                
                <th>Nilai Angka</th>
                
                <th>Nilai Huruf</th>
                
                <th>Status Nilai MK</th>
                
                <th>Status Validasi</th>
                
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-bordered">
            <tr>
                <td colspan="14" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
            </tr>
        </tbody>
    </table>
</div>