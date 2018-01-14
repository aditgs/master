<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a href="<?php echo base_url('tarif/setup') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Setup Tarif Baru </a>
        <a href="<?php echo base_url('set_tarif') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Setup Tarif</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data Setup Tarif</h2>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="width:100%">
        <thead class="">
            <tr>
                
                <th>Kode Skema</th>
                <th>Angkatan</th>
                <th>Program Studi</th>
                <th>Kelompok</th>
                <th>Tahun Akademik</th>
                <th>Semester</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-bordered">
            <tr>
                <td colspan="6" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
            </tr>
        </tbody>
    </table>
</div>