<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-id'>siakad_nilai_rentang Baru</a>
        <a href="<?php echo base_url('siakad_nilai_rentang/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka siakad_nilai_rentang Baru </a>
        <a href="<?php echo base_url('siakad_nilai_rentang') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data siakad_nilai_rentang</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data siakad_nilai_rentang</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
        <thead class="">
            <tr>
                
                <th>kode_prodi</th>
                
                <th>maks_sks</th>
                
                <th>ip_bobot_awal</th>
                
                <th>ip_bobot_akhir</th>
                
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