<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-id'>Mahasiswa TA Baru</a>
        <a href="<?php echo base_url('mhs_ta/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Mahasiswa TA Baru </a>
        <a href="<?php echo base_url('mhs_ta') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Mahasiswa TA</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data Mahasiswa TA</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
        <thead class="">
            <tr>
                
                <th>NIM Mahasiswa</th>
                
                <th>Kode Akademik</th>
                
                <th>Judul TA</th>
                
                <th>Abstrak TA</th>
                
                <th>Kata Kunci TA</th>
                
                <th>Bulan Awal Bimbingan</th>
                
                <th>Tahun Awal Bimbingan</th>
                
                <th>Bulan Akhir Bimbingan</th>
                
                <th>Tahun Akhir Bimbingan</th>
                
                <th>NIP Dosen 1</th>
                
                <th>NIP Dosen 2</th>
                
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