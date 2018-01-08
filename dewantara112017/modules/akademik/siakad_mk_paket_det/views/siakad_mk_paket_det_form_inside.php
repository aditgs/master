
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'siakad_mk_paket_det/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id_siakad_mk_paket_det" name="id_siakad_mk_paket_det"> 
        
        <div class="form-group">
            <?php echo form_label('kode_mk : ','kode_mk',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode_mk',set_value('kode_mk', isset($default['kode_mk']) ? $default['kode_mk'] : ''),'id="kode_mk" class="form-control" placeholder="Masukkan kode_mk"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('id_siakad_mk_paket : ','id_siakad_mk_paket',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('id_siakad_mk_paket',set_value('id_siakad_mk_paket', isset($default['id_siakad_mk_paket']) ? $default['id_siakad_mk_paket'] : ''),'id="id_siakad_mk_paket" class="form-control" placeholder="Masukkan id_siakad_mk_paket"'); ?>
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
