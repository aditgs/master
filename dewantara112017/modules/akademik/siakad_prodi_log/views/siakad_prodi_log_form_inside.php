
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'siakad_prodi_log/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id_siakad_prodi_log" name="id_siakad_prodi_log"> 
        
        <div class="form-group">
            <?php echo form_label('kode_prodi : ','kode_prodi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode_prodi',set_value('kode_prodi', isset($default['kode_prodi']) ? $default['kode_prodi'] : ''),'id="kode_prodi" class="form-control" placeholder="Masukkan kode_prodi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('user_prodi : ','user_prodi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('user_prodi',set_value('user_prodi', isset($default['user_prodi']) ? $default['user_prodi'] : ''),'id="user_prodi" class="form-control" placeholder="Masukkan user_prodi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('pass_prodi : ','pass_prodi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('pass_prodi',set_value('pass_prodi', isset($default['pass_prodi']) ? $default['pass_prodi'] : ''),'id="pass_prodi" class="form-control" placeholder="Masukkan pass_prodi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('email_prodi : ','email_prodi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('email_prodi',set_value('email_prodi', isset($default['email_prodi']) ? $default['email_prodi'] : ''),'id="email_prodi" class="form-control" placeholder="Masukkan email_prodi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('style_prodi : ','style_prodi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('style_prodi',set_value('style_prodi', isset($default['style_prodi']) ? $default['style_prodi'] : ''),'id="style_prodi" class="form-control" placeholder="Masukkan style_prodi"'); ?>
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
