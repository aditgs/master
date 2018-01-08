<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-id'>siakad_prodi_jabatan Baru</a>
        <a href="<?php echo base_url('siakad_prodi_jabatan/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka siakad_prodi_jabatan Baru </a>
        <a href="<?php echo base_url('siakad_prodi_jabatan') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data siakad_prodi_jabatan</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data siakad_prodi_jabatan</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
        <thead class="">
            <tr>
                
                <th>kode_prodi</th>
                
                <th>id_siakad_prodi_struk_jbt</th>
                
                <th>nip_prodi</th>
                
                <th>prodi_jbt_awal</th>
                
                <th>prodi_jbt_akhir</th>
                
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