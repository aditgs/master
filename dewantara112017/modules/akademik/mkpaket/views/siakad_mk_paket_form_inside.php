
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'siakad_mk_paket/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id_siakad_mk_paket" name="id_siakad_mk_paket"> 
        
        <div class="form-group">
            <?php echo form_label('kode_prodi : ','kode_prodi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode_prodi',set_value('kode_prodi', isset($default['kode_prodi']) ? $default['kode_prodi'] : ''),'id="kode_prodi" class="form-control" placeholder="Masukkan kode_prodi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('id_siakad_kurikulum : ','id_siakad_kurikulum',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('id_siakad_kurikulum',set_value('id_siakad_kurikulum', isset($default['id_siakad_kurikulum']) ? $default['id_siakad_kurikulum'] : ''),'id="id_siakad_kurikulum" class="form-control" placeholder="Masukkan id_siakad_kurikulum"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('nm_paket_mk : ','nm_paket_mk',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nm_paket_mk',set_value('nm_paket_mk', isset($default['nm_paket_mk']) ? $default['nm_paket_mk'] : ''),'id="nm_paket_mk" class="form-control" placeholder="Masukkan nm_paket_mk"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('status_paket_mk : ','status_paket_mk',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('status_paket_mk',set_value('status_paket_mk', isset($default['status_paket_mk']) ? $default['status_paket_mk'] : ''),'id="status_paket_mk" class="form-control" placeholder="Masukkan status_paket_mk"'); ?>
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
