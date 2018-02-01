<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-form'>Gelombang PMB Baru</a>
       
        <a href="<?php echo base_url('pmbgel') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Gelombang PMB</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data Gelombang PMB</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="width: 100%">
        <thead class="">
            <tr>
                
                <th>pmbid</th>
                
                <th>th_akad</th>
                
                <th>kodegel</th>
                
                <th>keterangan</th>
                
                <th>date_start</th>
                
                <th>date_end</th>
                
                <th>kodetarifdaftar</th>
                
                <th>date_seleksi_start</th>
                
                <th>date_seleksi_end</th>
                
                <th>date_her_start</th>
                
                <th>date_her_end</th>
                
                <th>date_pengumuman</th>
             
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-bordered">
            <tr>
                <td colspan="13" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
            </tr>
        </tbody>
    </table>
</div>