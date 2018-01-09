
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'mhs_ta/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id_siakad_mhs_ta" name="id_siakad_mhs_ta"> 
        
        <div class="form-group">
            <?php echo form_label('NIM Mahasiswa : ','nim_mhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nim_mhs',set_value('nim_mhs', isset($default['nim_mhs']) ? $default['nim_mhs'] : ''),'id="nim_mhs" class="form-control" placeholder="Masukkan nim mahasiswa"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Kode Akademik : ','kode_akademik',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode_akademik',set_value('kode_akademik', isset($default['kode_akademik']) ? $default['kode_akademik'] : ''),'id="kode_akademik" class="form-control" placeholder="Masukkan kode akademik"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Judul TA : ','judul_ta',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('judul_ta',set_value('judul_ta', isset($default['judul_ta']) ? $default['judul_ta'] : ''),'id="judul_ta" class="form-control" placeholder="Masukkan judul ta"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Abstrak TA : ','abstrak_ta',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('abstrak_ta',set_value('abstrak_ta', isset($default['abstrak_ta']) ? $default['abstrak_ta'] : ''),'id="abstrak_ta" class="form-control" placeholder="Masukkan abstrak ta"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Kata Kunci TA : ','kata_kunci_ta',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kata_kunci_ta',set_value('kata_kunci_ta', isset($default['kata_kunci_ta']) ? $default['kata_kunci_ta'] : ''),'id="kata_kunci_ta" class="form-control" placeholder="Masukkan kata kunci ta"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Bulan Awal Bimbingan : ','bln_awal_bimbingan',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('bln_awal_bimbingan',set_value('bln_awal_bimbingan', isset($default['bln_awal_bimbingan']) ? $default['bln_awal_bimbingan'] : ''),'id="bln_awal_bimbingan" class="form-control" placeholder="Masukkan bulan awal bimbingan"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Tahun Awal Bimbingan : ','thn_awal_bimbingan',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('thn_awal_bimbingan',set_value('thn_awal_bimbingan', isset($default['thn_awal_bimbingan']) ? $default['thn_awal_bimbingan'] : ''),'id="thn_awal_bimbingan" class="form-control" placeholder="Masukkan tahun awal bimbingan"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Bulan Akhir Bimbingan : ','bln_akhir_bimbingan',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('bln_akhir_bimbingan',set_value('bln_akhir_bimbingan', isset($default['bln_akhir_bimbingan']) ? $default['bln_akhir_bimbingan'] : ''),'id="bln_akhir_bimbingan" class="form-control" placeholder="Masukkan bulan akhir bimbingan"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Tahun Akhir Bimbingan : ','thn_akhir_bimbingan',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('thn_akhir_bimbingan',set_value('thn_akhir_bimbingan', isset($default['thn_akhir_bimbingan']) ? $default['thn_akhir_bimbingan'] : ''),'id="thn_akhir_bimbingan" class="form-control" placeholder="Masukkan tahun akhir bimbingan"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('NIP Dosen Pembimbing 1 : ','nip_dosen_1',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nip_dosen_1',set_value('nip_dosen_1', isset($default['nip_dosen_1']) ? $default['nip_dosen_1'] : ''),'id="nip_dosen_1" class="form-control" placeholder="Masukkan nip dosen  pembimbing 1"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('NIP Dosen Pembimbing 2 : ','nip_dosen_2',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nip_dosen_2',set_value('nip_dosen_2', isset($default['nip_dosen_2']) ? $default['nip_dosen_2'] : ''),'id="nip_dosen_2" class="form-control" placeholder="Masukkan nip dosen pembimbing 2"'); ?>
            </div>
        </div>
        
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button id="save" type="submit" class="btn btn-lg btn-success">
            <icon class="fa fa-floppy-o"></icon> Simpan</button>
        <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;">
            <icon class="fa fa-refresh"></icon> Perbaiki</button>
        <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
    </div>
    <?php echo form_close();?>
</div>
