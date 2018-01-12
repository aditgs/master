
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'pt_jabatan/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id_siakad_pt_jabatan" name="id_siakad_pt_jabatan"> 
        
        <div class="form-group">
            <?php echo form_label('ID PT Struktur Jabatan : ','id_siakad_pt_struk_jbt',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('id_siakad_pt_struk_jbt',set_value('id_siakad_pt_struk_jbt', isset($default['id_siakad_pt_struk_jbt']) ? $default['id_siakad_pt_struk_jbt'] : ''),'id="id_siakad_pt_struk_jbt" class="form-control" placeholder="Masukkan id pt struktur jabatan"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('NIP Pejabat : ','nip_pejabat',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nip_pejabat',set_value('nip_pejabat', isset($default['nip_pejabat']) ? $default['nip_pejabat'] : ''),'id="nip_pejabat" class="form-control" placeholder="Masukkan nip pejabat"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Periode Jabatan Awal : ','periode_jbt_awal',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('periode_jbt_awal',set_value('periode_jbt_awal', isset($default['periode_jbt_awal']) ? $default['periode_jbt_awal'] : ''),'id="periode_jbt_awal" class="form-control" placeholder="Masukkan periode jabatan awal"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Periode Jabatan Akhir : ','periode_jbt_akhir',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('periode_jbt_akhir',set_value('periode_jbt_akhir', isset($default['periode_jbt_akhir']) ? $default['periode_jbt_akhir'] : ''),'id="periode_jbt_akhir" class="form-control" placeholder="Masukkan periode jabatan akhir"'); ?>
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
