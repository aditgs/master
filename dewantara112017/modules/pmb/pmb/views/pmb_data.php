<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="modal" href='#modal-form'>PMB Baru</a>
      
        <a href="<?php echo base_url('pmb') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data PMB</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data PMB</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="width: 100%">
        <thead class="">
            <tr>
                
                <th>kodepmb</th>
                
                <th>keterangan</th>
                
                <th>th_akad</th>
           
             
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-bordered">
            <tr>
                <td colspan="4" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
            </tr>
        </tbody>
    </table>
</div>