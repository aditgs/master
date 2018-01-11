
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'jadwal_ampu/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id_siakad_jadwal_ampu" name="id_siakad_jadwal_ampu"> 
        
        <div class="form-group">
            <?php echo form_label('ID Jadwal : ','id_siakad_jadwal',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('id_siakad_jadwal',set_value('id_siakad_jadwal', isset($default['id_siakad_jadwal']) ? $default['id_siakad_jadwal'] : ''),'id="id_siakad_jadwal" class="form-control" placeholder="Masukkan ID Jadwal"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('NIP Dosen : ','nip_dosen',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nip_dosen',set_value('nip_dosen', isset($default['nip_dosen']) ? $default['nip_dosen'] : ''),'id="nip_dosen" class="form-control" placeholder="Masukkan NIP Dosen"'); ?>
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
