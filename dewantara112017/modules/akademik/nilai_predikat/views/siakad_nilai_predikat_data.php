<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-id'>Nilai Predikat Baru</a>
        <a href="<?php echo base_url('nilai_predikat/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Nilai Predikat Baru </a>
        <a href="<?php echo base_url('nilai_predikat') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Nilai Predikat</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data Nilai Predikat</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
        <thead class="">
            <tr>
                
                <th>Kode Akademik</th>
                
                <th>Kodep Prodi</th>
                
                <th>Nama Predikat</th>
                
                <th>Bata Bobot Awal</th>
                
                <th>Batas Bobot Akhir</th>
                
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