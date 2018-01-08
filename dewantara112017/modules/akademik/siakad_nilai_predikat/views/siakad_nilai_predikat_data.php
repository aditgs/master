<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-id'>siakad_nilai_predikat Baru</a>
        <a href="<?php echo base_url('siakad_nilai_predikat/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka siakad_nilai_predikat Baru </a>
        <a href="<?php echo base_url('siakad_nilai_predikat') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data siakad_nilai_predikat</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data siakad_nilai_predikat</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
        <thead class="">
            <tr>
                
                <th>kode_akademik</th>
                
                <th>kode_prodi</th>
                
                <th>nm_predikat</th>
                
                <th>bts_bobot_awal</th>
                
                <th>bts_bobot_akhir</th>
                
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