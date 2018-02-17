<div class="datatable-ajax-source">
    <div class="btn-group" style="margin:20px 0px 30px">
        <a class="bukaform btn btn-primary btn-lg" data-toggle="modal" href='#modal-form'>Buka Tagihan</a>
       
           <a href="<?php echo base_url('tagihan') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Tagihan Mahasiswa</a>
           <a href="<?php echo base_url('tagihan/laporan') ?>" class="btn btn-lg btn-success"><i class="fa fa-file-text"></i> Laporan Tagihan</a>
    </div>
    <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data Tagihan Mahasiswa</h2>
    <div class="form-group">
            <label class="control-label">
                Nama Mahasiswa
            </label>
            <div class="controls input-group">
                <?php $mhs = isset($default['mhs'])? $default['mhs'] : '0';  ?>
                <?php echo form_dropdown('mhs',$opt_mhs,$mhs,'id="mahasiswa" class="rekening input-lg form-control select2 input-md" style="width:100%" placeholder="Mahasiswa"'); ?>
              
            </div>
        </div>
    <table id="datatables" class="table table-bordered table-condensed table-striped" style="width:100%">
        <thead class="">
            <tr>
                <th style="width:10%" class="">Kode</th>
                <th style="width:10%" class="">Tanggal</th>
                <th style="width:50%" class="">Mahasiswa/NIM</th>
                
                <th style="width:15%" class="">Validasi</th>
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