<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="btn btn-primary btn-lg" data-toggle="tab" href='#outside'>Calon Mahasiswa Baru</a>
        <!-- <a href="<?php echo base_url('mhspmb/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Calon Mahasiswa Baru </a> -->
        <a href="<?php echo base_url('mhspmb') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Calon Mahasiswa</a>
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
                <td colspan="32" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
            </tr>
        </tbody>
    </table>
</div>