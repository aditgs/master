
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'nilai_rentang/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id_siakad_nilai_rentang" name="id_siakad_nilai_rentang"> 
        
        <div class="form-group">
            <?php echo form_label('Kode Prodi : ','kode_prodi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode_prodi',set_value('kode_prodi', isset($default['kode_prodi']) ? $default['kode_prodi'] : ''),'id="kode_prodi" class="form-control" placeholder="Masukkan kode prodi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Maksimum SKS : ','maks_sks',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('maks_sks',set_value('maks_sks', isset($default['maks_sks']) ? $default['maks_sks'] : ''),'id="maks_sks" class="form-control" placeholder="Masukkan maksimum sks"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('IP Bobot Awal : ','ip_bobot_awal',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('ip_bobot_awal',set_value('ip_bobot_awal', isset($default['ip_bobot_awal']) ? $default['ip_bobot_awal'] : ''),'id="ip_bobot_awal" class="form-control" placeholder="Masukkan ip bobot awal"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('IP Bobot Akhir : ','ip_bobot_akhir',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('ip_bobot_akhir',set_value('ip_bobot_akhir', isset($default['ip_bobot_akhir']) ? $default['ip_bobot_akhir'] : ''),'id="ip_bobot_akhir" class="form-control" placeholder="Masukkan ip bobot akhir"'); ?>
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
