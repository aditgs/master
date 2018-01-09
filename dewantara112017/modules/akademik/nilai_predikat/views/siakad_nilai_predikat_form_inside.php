
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'nilai_predikat/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id_siakad_nilai_predikat" name="id_siakad_nilai_predikat"> 
        
        <div class="form-group">
            <?php echo form_label('Kode Akademik : ','kode_akademik',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode_akademik',set_value('kode_akademik', isset($default['kode_akademik']) ? $default['kode_akademik'] : ''),'id="kode_akademik" class="form-control" placeholder="Masukkan kode akademik"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Kode Prodi : ','kode_prodi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode_prodi',set_value('kode_prodi', isset($default['kode_prodi']) ? $default['kode_prodi'] : ''),'id="kode_prodi" class="form-control" placeholder="Masukkan kode prodi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Nama Predikat : ','nm_predikat',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nm_predikat',set_value('nm_predikat', isset($default['nm_predikat']) ? $default['nm_predikat'] : ''),'id="nm_predikat" class="form-control" placeholder="Masukkan nama predikat"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Batas Bobot Awal : ','bts_bobot_awal',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('bts_bobot_awal',set_value('bts_bobot_awal', isset($default['bts_bobot_awal']) ? $default['bts_bobot_awal'] : ''),'id="bts_bobot_awal" class="form-control" placeholder="Masukkan batas bobot awal"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Batas Bobot Akhir : ','bts_bobot_akhir',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('bts_bobot_akhir',set_value('bts_bobot_akhir', isset($default['bts_bobot_akhir']) ? $default['bts_bobot_akhir'] : ''),'id="bts_bobot_akhir" class="form-control" placeholder="Masukkan batas bobot akhir"'); ?>
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
