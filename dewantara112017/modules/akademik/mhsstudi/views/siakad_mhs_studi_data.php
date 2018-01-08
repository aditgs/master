<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-id'>siakad_mhs_studi Baru</a>
        <a href="<?php echo base_url('siakad_mhs_studi/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka siakad_mhs_studi Baru </a>
        <a href="<?php echo base_url('siakad_mhs_studi') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data siakad_mhs_studi</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data siakad_mhs_studi</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
        <thead class="">
            <tr>
                
                <th>nim_mhs</th>
                
                <th>id_siakad_jadwal</th>
                
                <th>kode_akademik</th>
                
                <th>kode_mk</th>
                
                <th>status_studi</th>
                
                <th>nil_tugas</th>
                
                <th>nil_uts</th>
                
                <th>nil_uas</th>
                
                <th>nil_akhir</th>
                
                <th>nilai_angka_studi</th>
                
                <th>nilai_huruf_studi</th>
                
                <th>status_nil_mk</th>
                
                <th>status_val_studi</th>
                
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