<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="baru btn btn-primary btn-lg" data-toggle="tab" href='#outside'><i class="fa fa-plus"></i> Calon Mahasiswa Baru</a>
       
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data Calon Mahasiswa</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="width: 100%">
        <thead class="">
            <tr>
                
               <th>No Daftar PMB</th>

               <th>Tgl Daftar</th>
               <th>Nama Pendaftar</th>
               <th>Prodi</th>
                <th>Status PMB</th>

             
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