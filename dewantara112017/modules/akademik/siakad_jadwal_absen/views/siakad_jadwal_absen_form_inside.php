
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'siakad_jadwal_absen/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id_siakad_jadwal_ujian" name="id_siakad_jadwal_ujian"> 
        
        <div class="form-group">
            <?php echo form_label('id_siakad_jadwal : ','id_siakad_jadwal',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('id_siakad_jadwal',set_value('id_siakad_jadwal', isset($default['id_siakad_jadwal']) ? $default['id_siakad_jadwal'] : ''),'id="id_siakad_jadwal" class="form-control" placeholder="Masukkan id_siakad_jadwal"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('nim_mhs : ','nim_mhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nim_mhs',set_value('nim_mhs', isset($default['nim_mhs']) ? $default['nim_mhs'] : ''),'id="nim_mhs" class="form-control" placeholder="Masukkan nim_mhs"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('pertemuan_mk : ','pertemuan_mk',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('pertemuan_mk',set_value('pertemuan_mk', isset($default['pertemuan_mk']) ? $default['pertemuan_mk'] : ''),'id="pertemuan_mk" class="form-control" placeholder="Masukkan pertemuan_mk"'); ?>
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
