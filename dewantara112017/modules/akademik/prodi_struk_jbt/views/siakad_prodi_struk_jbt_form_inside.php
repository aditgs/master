
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'prodi_struk_jbt/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id_siakad_prodi_struk_jbt" name="id_siakad_prodi_struk_jbt"> 
        
        <div class="form-group">
            <?php echo form_label('Kodep Prodi : ','kode_prodi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode_prodi',set_value('kode_prodi', isset($default['kode_prodi']) ? $default['kode_prodi'] : ''),'id="kode_prodi" class="form-control" placeholder="Masukkan kode prodi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Nama Prodi Jabatan : ','nm_prodi_jabatan',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nm_prodi_jabatan',set_value('nm_prodi_jabatan', isset($default['nm_prodi_jabatan']) ? $default['nm_prodi_jabatan'] : ''),'id="nm_prodi_jabatan" class="form-control" placeholder="Masukkan nama prodi jabatan"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Def Pos Surat : ','def_pos_surat',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('def_pos_surat',set_value('def_pos_surat', isset($default['def_pos_surat']) ? $default['def_pos_surat'] : ''),'id="def_pos_surat" class="form-control" placeholder="Masukkan def pos surat"'); ?>
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
