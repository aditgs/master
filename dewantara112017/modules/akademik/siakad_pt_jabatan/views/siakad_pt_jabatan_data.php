<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-id'>siakad_pt_jabatan Baru</a>
        <a href="<?php echo base_url('siakad_pt_jabatan/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka siakad_pt_jabatan Baru </a>
        <a href="<?php echo base_url('siakad_pt_jabatan') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data siakad_pt_jabatan</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data siakad_pt_jabatan</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
        <thead class="">
            <tr>
                
                <th>id_siakad_pt_struk_jbt</th>
                
                <th>nip_pejabat</th>
                
                <th>periode_jbt_awal</th>
                
                <th>periode_jbt_akhir</th>
                
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