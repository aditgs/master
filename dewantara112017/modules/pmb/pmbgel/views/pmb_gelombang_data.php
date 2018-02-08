<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-form'>Gelombang PMB Baru</a>
       
        <a href="<?php echo base_url('pmbgel') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Gelombang PMB</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data Gelombang PMB</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="width: 100%">
        <thead class="">
            <tr>
                
              
                <th style="width:10%">Kode</th>
                <th style="width:10%">Tahun</th>
                <th style="width:30%">Nama Gelombang</th>
                <th style="width:30%">Tanggal</th>
                <th style="width:30%">Status</th>
             
                <th style="width:10%">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-bordered">
            <tr>
                <td colspan="6" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
            </tr>
        </tbody>
    </table>
</div>