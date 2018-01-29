
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'siakad_mhs_pmb/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id_siakad_mhs_pmb" name="id_siakad_mhs_pmb"> 
        
        
        <div class="form-group">
            <?php echo form_label('No Pendaftaran : ','noreg_pmb',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('noreg_pmb',set_value('noreg_pmb', isset($default['noreg_pmb']) ? $default['noreg_pmb'] : ''),'id="noreg_pmb" class="form-control" placeholder="Masukkan No Pendaftaran"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Nama Lengkap : ','nm_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nm_cmhs',set_value('nm_cmhs', isset($default['nm_cmhs']) ? $default['nm_cmhs'] : ''),'id="nm_cmhs" class="form-control" placeholder="Contoh : Ahmad Rofiqul Muslikh"'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('NIK : ','nik_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nik_cmhs',set_value('kodepos_cmhs', isset($default['nik_cmhs']) ? $default['nik_cmhs'] : ''),'id="nik_cmhs" class="form-control" placeholder="Contoh : 01679765443368363"'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Nama Ibu : ','nm_ibu_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nm_ibu_cmhs',set_value('nm_ibu_cmhs', isset($default['nm_ibu_cmhs']) ? $default['nm_ibu_cmhs'] : ''),'id="nm_ibu_cmhs" class="form-control" placeholder="Contoh : Sri Umiati"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <div class="controls input-group">
                <?php echo form_label('Jenis Kelamin : ','kelamin_cmhs',array('class'=>'control-label')); ?>
                <select name="kelamin_cmhs" id="kelamin_cmhs" class="input-lg form-control select2" style="width: 100%">
                    <option value="1">Laki - laki</option>
                    <option value="2">Perempuan</option>
                </select>
            </div>     
        </div>
      
        <div class="form-group">
            <?php echo form_label('Tempat Lahir : ','tmp_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('tmp_cmhs',set_value('tmp_cmhs', isset($default['tmp_cmhs']) ? $default['tmp_cmhs'] : ''),'id="tmp_cmhs" class="form-control" placeholder="Contoh : Jombang "'); ?>
            </div>
        </div>
        
        <div class="form-group tanggal">
            <?php echo form_label('Tanggal Lahir : ','tanggal',array('class'=>'control-label')); ?>
            <div class="input-daterange input-group controls" id="datepicker">
                <?php if (!empty($default['tanggal'])): ?>
                <input id="tanggal" value="<?php echo $default['tanggal']; ?>" type="text" onchange="" class="input-md form-control" name="tanggal" required />
                <?php else: ?>
                <input id="tanggal" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="tanggal" required />
                <?php endif; ?>
                <span class="input-group-btn">
                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a></span>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Agama : ','agama_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('agama_cmhs',set_value('agama_cmhs', isset($default['agama_cmhs']) ? $default['agama_cmhs'] : ''),'id="agama_cmhs" class="form-control" placeholder="Masukkan Agama"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Alamat : ','almt_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('almt_cmhs',set_value('almt_cmhs', isset($default['almt_cmhs']) ? $default['almt_cmhs'] : ''),'id="almt_cmhs" class="form-control" placeholder="Masukkan Alamat"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Kota : ','kota_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kota_cmhs',set_value('kota_cmhs', isset($default['kota_cmhs']) ? $default['kota_cmhs'] : ''),'id="kota_cmhs" class="form-control" placeholder="Masukkan Kota"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Kodepos : ','kodepos_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kodepos_cmhs',set_value('kodepos_cmhs', isset($default['kodepos_cmhs']) ? $default['kodepos_cmhs'] : ''),'id="kodepos_cmhs" class="form-control" placeholder="Masukkan Kodepos"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Email : ','email_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('email_cmhs',set_value('email_cmhs', isset($default['email_cmhs']) ? $default['email_cmhs'] : ''),'id="email_cmhs" class="form-control" placeholder="Masukkan Email"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('No HP : ','hp_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('hp_cmhs',set_value('hp_cmhs', isset($default['hp_cmhs']) ? $default['hp_cmhs'] : ''),'id="hp_cmhs" class="form-control" placeholder="Masukkan No HP"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Telp : ','telp_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('telp_cmhs',set_value('telp_cmhs', isset($default['telp_cmhs']) ? $default['telp_cmhs'] : ''),'id="telp_cmhs" class="form-control" placeholder="Masukkan Telp"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Asal Pendidikan : ','asal_pend',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('asal_pend',set_value('asal_pend', isset($default['asal_pend']) ? $default['asal_pend'] : ''),'id="asal_pend" class="form-control" placeholder="Masukkan Asal Pendidikan"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Jurusan Pendidikan : ','jurusan_pend',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('jurusan_pend',set_value('jurusan_pend', isset($default['jurusan_pend']) ? $default['jurusan_pend'] : ''),'id="jurusan_pend" class="form-control" placeholder="Masukkan Jurusan Pendidikan"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('No Ijazah : ','no_ijazah_pend',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('no_ijazah_pend',set_value('no_ijazah_pend', isset($default['no_ijazah_pend']) ? $default['no_ijazah_pend'] : ''),'id="no_ijazah_pend" class="form-control" placeholder="Masukkan No Ijazah"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Tanggal Ijazah : ','tgl_ijazah_pend',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('tgl_ijazah_pend',set_value('tgl_ijazah_pend', isset($default['tgl_ijazah_pend']) ? $default['tgl_ijazah_pend'] : ''),'id="tgl_ijazah_pend" class="form-control" placeholder="Masukkan Tanggal Ijazah"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Nilai Ijazah : ','nil_ijazah_pend',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nil_ijazah_pend',set_value('nil_ijazah_pend', isset($default['nil_ijazah_pend']) ? $default['nil_ijazah_pend'] : ''),'id="nil_ijazah_pend" class="form-control" placeholder="Masukkan Nilai Ijazah"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('img_pasfoto : ','img_pasfoto',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('img_pasfoto',set_value('img_pasfoto', isset($default['img_pasfoto']) ? $default['img_pasfoto'] : ''),'id="img_pasfoto" class="form-control" placeholder="Masukkan img_pasfoto"'); ?>
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
