<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-id'>siakad_mhs_ta Baru</a>
        <a href="<?php echo base_url('siakad_mhs_ta/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka siakad_mhs_ta Baru </a>
        <a href="<?php echo base_url('siakad_mhs_ta') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data siakad_mhs_ta</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data siakad_mhs_ta</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
        <thead class="">
            <tr>
                
                <th>nim_mhs</th>
                
                <th>kode_akademik</th>
                
                <th>judul_ta</th>
                
                <th>abstrak_ta</th>
                
                <th>kata_kunci_ta</th>
                
                <th>bln_awal_bimbingan</th>
                
                <th>thn_awal_bimbingan</th>
                
                <th>bln_akhir_bimbingan</th>
                
                <th>thn_akhir_bimbingan</th>
                
                <th>nip_dosen_1</th>
                
                <th>nip_dosen_2</th>
                
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