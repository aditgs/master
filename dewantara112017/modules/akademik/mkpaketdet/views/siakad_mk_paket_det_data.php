<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-id'>siakad_mk_paket_det Baru</a>
        <a href="<?php echo base_url('siakad_mk_paket_det/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka siakad_mk_paket_det Baru </a>
        <a href="<?php echo base_url('siakad_mk_paket_det') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data siakad_mk_paket_det</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data siakad_mk_paket_det</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
        <thead class="">
            <tr>
                
                <th>kode_mk</th>
                
                <th>id_siakad_mk_paket</th>
                
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-bordered">
            <tr>
                <td colspan="3" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
            </tr>
        </tbody>
    </table>
</div>