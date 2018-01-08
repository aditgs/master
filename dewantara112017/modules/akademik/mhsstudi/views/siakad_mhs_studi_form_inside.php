
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'siakad_mhs_studi/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id_siakad_mhs_studi" name="id_siakad_mhs_studi"> 
        
        <div class="form-group">
            <?php echo form_label('nim_mhs : ','nim_mhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nim_mhs',set_value('nim_mhs', isset($default['nim_mhs']) ? $default['nim_mhs'] : ''),'id="nim_mhs" class="form-control" placeholder="Masukkan nim_mhs"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('id_siakad_jadwal : ','id_siakad_jadwal',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('id_siakad_jadwal',set_value('id_siakad_jadwal', isset($default['id_siakad_jadwal']) ? $default['id_siakad_jadwal'] : ''),'id="id_siakad_jadwal" class="form-control" placeholder="Masukkan id_siakad_jadwal"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('kode_akademik : ','kode_akademik',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode_akademik',set_value('kode_akademik', isset($default['kode_akademik']) ? $default['kode_akademik'] : ''),'id="kode_akademik" class="form-control" placeholder="Masukkan kode_akademik"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('kode_mk : ','kode_mk',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode_mk',set_value('kode_mk', isset($default['kode_mk']) ? $default['kode_mk'] : ''),'id="kode_mk" class="form-control" placeholder="Masukkan kode_mk"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('status_studi : ','status_studi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('status_studi',set_value('status_studi', isset($default['status_studi']) ? $default['status_studi'] : ''),'id="status_studi" class="form-control" placeholder="Masukkan status_studi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('nil_tugas : ','nil_tugas',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nil_tugas',set_value('nil_tugas', isset($default['nil_tugas']) ? $default['nil_tugas'] : ''),'id="nil_tugas" class="form-control" placeholder="Masukkan nil_tugas"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('nil_uts : ','nil_uts',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nil_uts',set_value('nil_uts', isset($default['nil_uts']) ? $default['nil_uts'] : ''),'id="nil_uts" class="form-control" placeholder="Masukkan nil_uts"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('nil_uas : ','nil_uas',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nil_uas',set_value('nil_uas', isset($default['nil_uas']) ? $default['nil_uas'] : ''),'id="nil_uas" class="form-control" placeholder="Masukkan nil_uas"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('nil_akhir : ','nil_akhir',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nil_akhir',set_value('nil_akhir', isset($default['nil_akhir']) ? $default['nil_akhir'] : ''),'id="nil_akhir" class="form-control" placeholder="Masukkan nil_akhir"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('nilai_angka_studi : ','nilai_angka_studi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nilai_angka_studi',set_value('nilai_angka_studi', isset($default['nilai_angka_studi']) ? $default['nilai_angka_studi'] : ''),'id="nilai_angka_studi" class="form-control" placeholder="Masukkan nilai_angka_studi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('nilai_huruf_studi : ','nilai_huruf_studi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nilai_huruf_studi',set_value('nilai_huruf_studi', isset($default['nilai_huruf_studi']) ? $default['nilai_huruf_studi'] : ''),'id="nilai_huruf_studi" class="form-control" placeholder="Masukkan nilai_huruf_studi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('status_nil_mk : ','status_nil_mk',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('status_nil_mk',set_value('status_nil_mk', isset($default['status_nil_mk']) ? $default['status_nil_mk'] : ''),'id="status_nil_mk" class="form-control" placeholder="Masukkan status_nil_mk"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('status_val_studi : ','status_val_studi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('status_val_studi',set_value('status_val_studi', isset($default['status_val_studi']) ? $default['status_val_studi'] : ''),'id="status_val_studi" class="form-control" placeholder="Masukkan status_val_studi"'); ?>
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
