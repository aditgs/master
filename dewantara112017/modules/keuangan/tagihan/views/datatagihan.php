<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="bukaform btn btn-primary btn-lg" data-toggle="modal" href='#modal-form'>Buka Tagihan</a>
       
           <a href="<?php echo base_url('tagihan') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Tagihan Mahasiswa</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data Tagihan Mahasiswa</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="width:100%">
        <thead class="">
            <tr>
                <th style="width:10%" class="">Kode</th>
                <th style="width:10%" class="">Tanggal</th>
                <th style="width:50%" class="">Mahasiswa/NIM</th>
                <th style="width:10%" class="">Terbayar</th>
                <th style="width:15%" class="">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-bordered">
            <tr>
                <td colspan="5" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
            </tr>
        </tbody>
    </table>
</div>