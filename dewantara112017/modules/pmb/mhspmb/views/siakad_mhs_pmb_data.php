<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-form'>Calon Mahasiswa Baru</a>
        <a href="<?php echo base_url('mhspmb/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Calon Mahasiswa Baru </a>
        <a href="<?php echo base_url('mhspmb') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Calon Mahasiswa</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data Calon Mahasiswa</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
        <thead class="">
            <tr>
                
                <th>noreg_pmb</th>
                
                <th>nm_cmhs</th>
                
                <th>nik_cmhs</th>

                <th>kelamin_cmhs</th>
                
                <th>tmp_cmhs</th>
                
                <th>tgl_cmhs</th>
                
                <th>agama_cmhs</th>
                
                <th>almt_cmhs</th>

                <th>nm_ibu_cmhs</th>
                
                <th>kota_cmhs</th>
                
                <th>kodepos_cmhs</th>
                
                <th>email_cmhs</th>
                
                <th>hp_cmhs</th>
                
                <th>telp_cmhs</th>
                
                <th>asal_pend</th>
                
                <th>jurusan_pend</th>
                
                <th>no_ijazah_pend</th>
                
                <th>tgl_ijazah_pend</th>
                
                <th>nil_ijazah_pend</th>
            
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-bordered">
            <tr>
                <td colspan="32" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
            </tr>
        </tbody>
    </table>
</div>