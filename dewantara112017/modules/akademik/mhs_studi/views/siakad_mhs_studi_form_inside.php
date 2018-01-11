
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'mhs_studi/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id_siakad_mhs_studi" name="id_siakad_mhs_studi"> 
        
        <div class="form-group">
            <?php echo form_label('NIM Mahasiswa : ','nim_mhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nim_mhs',set_value('nim_mhs', isset($default['nim_mhs']) ? $default['nim_mhs'] : ''),'id="nim_mhs" class="form-control" placeholder="Masukkan nim mahasiswa"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('ID Jadwal : ','id_siakad_jadwal',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('id_siakad_jadwal',set_value('id_siakad_jadwal', isset($default['id_siakad_jadwal']) ? $default['id_siakad_jadwal'] : ''),'id="id_siakad_jadwal" class="form-control" placeholder="Masukkan id jadwal"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Kode Akademik : ','kode_akademik',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode_akademik',set_value('kode_akademik', isset($default['kode_akademik']) ? $default['kode_akademik'] : ''),'id="kode_akademik" class="form-control" placeholder="Masukkan kode akademik"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Kode MK : ','kode_mk',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode_mk',set_value('kode_mk', isset($default['kode_mk']) ? $default['kode_mk'] : ''),'id="kode_mk" class="form-control" placeholder="Masukkan kode mk"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Status Studi : ','status_studi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('status_studi',set_value('status_studi', isset($default['status_studi']) ? $default['status_studi'] : ''),'id="status_studi" class="form-control" placeholder="Masukkan status studi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Nilai Tugas : ','nil_tugas',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nil_tugas',set_value('nil_tugas', isset($default['nil_tugas']) ? $default['nil_tugas'] : ''),'id="nil_tugas" class="form-control" placeholder="Masukkan nilai tugas"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Nilai UTS : ','nil_uts',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nil_uts',set_value('nil_uts', isset($default['nil_uts']) ? $default['nil_uts'] : ''),'id="nil_uts" class="form-control" placeholder="Masukkan nilai uts"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Nilai UAS : ','nil_uas',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nil_uas',set_value('nil_uas', isset($default['nil_uas']) ? $default['nil_uas'] : ''),'id="nil_uas" class="form-control" placeholder="Masukkan nilai uas"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Nilai Akhir : ','nil_akhir',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nil_akhir',set_value('nil_akhir', isset($default['nil_akhir']) ? $default['nil_akhir'] : ''),'id="nil_akhir" class="form-control" placeholder="Masukkan nilai akhir"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Nilai Angka : ','nilai_angka_studi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nilai_angka_studi',set_value('nilai_angka_studi', isset($default['nilai_angka_studi']) ? $default['nilai_angka_studi'] : ''),'id="nilai_angka_studi" class="form-control" placeholder="Masukkan nilai angka"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Nilai Huruf : ','nilai_huruf_studi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nilai_huruf_studi',set_value('nilai_huruf_studi', isset($default['nilai_huruf_studi']) ? $default['nilai_huruf_studi'] : ''),'id="nilai_huruf_studi" class="form-control" placeholder="Masukkan nilai huruf"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Status Nilai MK : ','status_nil_mk',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('status_nil_mk',set_value('status_nil_mk', isset($default['status_nil_mk']) ? $default['status_nil_mk'] : ''),'id="status_nil_mk" class="form-control" placeholder="Masukkan status nilai mk"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Status Validasi : ','status_val_studi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('status_val_studi',set_value('status_val_studi', isset($default['status_val_studi']) ? $default['status_val_studi'] : ''),'id="status_val_studi" class="form-control" placeholder="Masukkan status validasi"'); ?>
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
