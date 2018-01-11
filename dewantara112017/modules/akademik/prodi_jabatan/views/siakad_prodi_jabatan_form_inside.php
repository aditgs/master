
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'prodi_jabatan/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id_siakad_prodi_jabatan" name="id_siakad_prodi_jabatan"> 
        
        <div class="form-group">
            <?php echo form_label('Kode Prodi : ','kode_prodi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode_prodi',set_value('kode_prodi', isset($default['kode_prodi']) ? $default['kode_prodi'] : ''),'id="kode_prodi" class="form-control" placeholder="Masukkan kode prodi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('ID Prodi Strukur Jabatan : ','id_siakad_prodi_struk_jbt',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('id_siakad_prodi_struk_jbt',set_value('id_siakad_prodi_struk_jbt', isset($default['id_siakad_prodi_struk_jbt']) ? $default['id_siakad_prodi_struk_jbt'] : ''),'id="id_siakad_prodi_struk_jbt" class="form-control" placeholder="Masukkan id siakad prodi struktur jabatan"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('NIP Prodi : ','nip_prodi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nip_prodi',set_value('nip_prodi', isset($default['nip_prodi']) ? $default['nip_prodi'] : ''),'id="nip_prodi" class="form-control" placeholder="Masukkan nip prodi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Prodi Jabatan Awal : ','prodi_jbt_awal',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('prodi_jbt_awal',set_value('prodi_jbt_awal', isset($default['prodi_jbt_awal']) ? $default['prodi_jbt_awal'] : ''),'id="prodi_jbt_awal" class="form-control" placeholder="Masukkan prodi jabatan awal"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Prodi Jabatan Akhir : ','prodi_jbt_akhir',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('prodi_jbt_akhir',set_value('prodi_jbt_akhir', isset($default['prodi_jbt_akhir']) ? $default['prodi_jbt_akhir'] : ''),'id="prodi_jbt_akhir" class="form-control" placeholder="Masukkan prodi jabatan akhir"'); ?>
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
