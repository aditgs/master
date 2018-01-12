
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'mk_syarat/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id_siakad_mk_syarat" name="id_siakad_mk_syarat"> 
        
        <div class="form-group">
            <?php echo form_label('Kode Prodi : ','kode_prodi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode_prodi',set_value('kode_prodi', isset($default['kode_prodi']) ? $default['kode_prodi'] : ''),'id="kode_prodi" class="form-control" placeholder="Masukkan kode prodi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Kode MK Main : ','kode_mk_main',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode_mk_main',set_value('kode_mk_main', isset($default['kode_mk_main']) ? $default['kode_mk_main'] : ''),'id="kode_mk_main" class="form-control" placeholder="Masukkan kode mk main"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Kode MK Syarat : ','kode_mk_syarat',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode_mk_syarat',set_value('kode_mk_syarat', isset($default['kode_mk_syarat']) ? $default['kode_mk_syarat'] : ''),'id="kode_mk_syarat" class="form-control" placeholder="Masukkan kode mk syarat"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Nilai MK Syarat : ','nil_mk_syarat',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nil_mk_syarat',set_value('nil_mk_syarat', isset($default['nil_mk_syarat']) ? $default['nil_mk_syarat'] : ''),'id="nil_mk_syarat" class="form-control" placeholder="Masukkan nil mk syarat"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Nilai Angka MK Syarat : ','nil_angka_mk_syarat',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nil_angka_mk_syarat',set_value('nil_angka_mk_syarat', isset($default['nil_angka_mk_syarat']) ? $default['nil_angka_mk_syarat'] : ''),'id="nil_angka_mk_syarat" class="form-control" placeholder="Masukkan nil angka mk syarat"'); ?>
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
