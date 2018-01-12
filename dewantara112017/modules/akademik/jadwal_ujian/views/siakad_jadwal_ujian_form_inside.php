
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'jadwal_ujian/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id_siakad_jadwal_ujian" name="id_siakad_jadwal_ujian"> 
        
        <div class="form-group">
            <?php echo form_label('Kode Prodi : ','kode_prodi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode_prodi',set_value('kode_prodi', isset($default['kode_prodi']) ? $default['kode_prodi'] : ''),'id="kode_prodi" class="form-control" placeholder="Masukkan Kode Prodi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('ID Jadwal : ','id_siakad_jadwal',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('id_siakad_jadwal',set_value('id_siakad_jadwal', isset($default['id_siakad_jadwal']) ? $default['id_siakad_jadwal'] : ''),'id="id_siakad_jadwal" class="form-control" placeholder="Masukkan ID Jadwal"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Jenis Ujian : ','jenis_ujian',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('jenis_ujian',set_value('jenis_ujian', isset($default['jenis_ujian']) ? $default['jenis_ujian'] : ''),'id="jenis_ujian" class="form-control" placeholder="Masukkan Jenis Ujian"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Tanggal Ujian : ','tgl_ujian',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('tgl_ujian',set_value('tgl_ujian', isset($default['tgl_ujian']) ? $default['tgl_ujian'] : ''),'id="tgl_ujian" class="form-control" placeholder="Masukkan tgl ujian"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Ujian Mulai : ','ujian_mulai',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('ujian_mulai',set_value('ujian_mulai', isset($default['ujian_mulai']) ? $default['ujian_mulai'] : ''),'id="ujian_mulai" class="form-control" placeholder="Masukkan Ujian Mulai"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Ujian Selesai : ','ujian_selesai',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('ujian_selesai',set_value('ujian_selesai', isset($default['ujian_selesai']) ? $default['ujian_selesai'] : ''),'id="ujian_selesai" class="form-control" placeholder="Masukkan Selesai"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('ID Ruang : ','id_siakad_ruang',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('id_siakad_ruang',set_value('id_siakad_ruang', isset($default['id_siakad_ruang']) ? $default['id_siakad_ruang'] : ''),'id="id_siakad_ruang" class="form-control" placeholder="Masukkan ID Ruang"'); ?>
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
