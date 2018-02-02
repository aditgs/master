
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'siakad_mhs_pmb/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id_siakad_mhs_pmb" name="id_siakad_mhs_pmb"> 
        
        <div class="form-group">
            <?php echo form_label('kode_prodi : ','kode_prodi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode_prodi',set_value('kode_prodi', isset($default['kode_prodi']) ? $default['kode_prodi'] : ''),'id="kode_prodi" class="form-control" placeholder="Masukkan kode_prodi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('id_siakad_kelas : ','id_siakad_kelas',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('id_siakad_kelas',set_value('id_siakad_kelas', isset($default['id_siakad_kelas']) ? $default['id_siakad_kelas'] : ''),'id="id_siakad_kelas" class="form-control" placeholder="Masukkan id_siakad_kelas"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('tgl_reg_pmb : ','tgl_reg_pmb',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('tgl_reg_pmb',set_value('tgl_reg_pmb', isset($default['tgl_reg_pmb']) ? $default['tgl_reg_pmb'] : ''),'id="tgl_reg_pmb" class="form-control" placeholder="Masukkan tgl_reg_pmb"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('noreg_pmb : ','noreg_pmb',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('noreg_pmb',set_value('noreg_pmb', isset($default['noreg_pmb']) ? $default['noreg_pmb'] : ''),'id="noreg_pmb" class="form-control" placeholder="Masukkan noreg_pmb"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('nm_cmhs : ','nm_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nm_cmhs',set_value('nm_cmhs', isset($default['nm_cmhs']) ? $default['nm_cmhs'] : ''),'id="nm_cmhs" class="form-control" placeholder="Masukkan nm_cmhs"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('kelamin_cmhs : ','kelamin_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kelamin_cmhs',set_value('kelamin_cmhs', isset($default['kelamin_cmhs']) ? $default['kelamin_cmhs'] : ''),'id="kelamin_cmhs" class="form-control" placeholder="Masukkan kelamin_cmhs"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('tmp_cmhs : ','tmp_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('tmp_cmhs',set_value('tmp_cmhs', isset($default['tmp_cmhs']) ? $default['tmp_cmhs'] : ''),'id="tmp_cmhs" class="form-control" placeholder="Masukkan tmp_cmhs"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('tgl_cmhs : ','tgl_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('tgl_cmhs',set_value('tgl_cmhs', isset($default['tgl_cmhs']) ? $default['tgl_cmhs'] : ''),'id="tgl_cmhs" class="form-control" placeholder="Masukkan tgl_cmhs"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('agama_cmhs : ','agama_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('agama_cmhs',set_value('agama_cmhs', isset($default['agama_cmhs']) ? $default['agama_cmhs'] : ''),'id="agama_cmhs" class="form-control" placeholder="Masukkan agama_cmhs"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('almt_cmhs : ','almt_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('almt_cmhs',set_value('almt_cmhs', isset($default['almt_cmhs']) ? $default['almt_cmhs'] : ''),'id="almt_cmhs" class="form-control" placeholder="Masukkan almt_cmhs"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('kota_cmhs : ','kota_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kota_cmhs',set_value('kota_cmhs', isset($default['kota_cmhs']) ? $default['kota_cmhs'] : ''),'id="kota_cmhs" class="form-control" placeholder="Masukkan kota_cmhs"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('kodepos_cmhs : ','kodepos_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kodepos_cmhs',set_value('kodepos_cmhs', isset($default['kodepos_cmhs']) ? $default['kodepos_cmhs'] : ''),'id="kodepos_cmhs" class="form-control" placeholder="Masukkan kodepos_cmhs"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('email_cmhs : ','email_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('email_cmhs',set_value('email_cmhs', isset($default['email_cmhs']) ? $default['email_cmhs'] : ''),'id="email_cmhs" class="form-control" placeholder="Masukkan email_cmhs"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('hp_cmhs : ','hp_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('hp_cmhs',set_value('hp_cmhs', isset($default['hp_cmhs']) ? $default['hp_cmhs'] : ''),'id="hp_cmhs" class="form-control" placeholder="Masukkan hp_cmhs"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('telp_cmhs : ','telp_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('telp_cmhs',set_value('telp_cmhs', isset($default['telp_cmhs']) ? $default['telp_cmhs'] : ''),'id="telp_cmhs" class="form-control" placeholder="Masukkan telp_cmhs"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('asal_pend : ','asal_pend',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('asal_pend',set_value('asal_pend', isset($default['asal_pend']) ? $default['asal_pend'] : ''),'id="asal_pend" class="form-control" placeholder="Masukkan asal_pend"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('jurusan_pend : ','jurusan_pend',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('jurusan_pend',set_value('jurusan_pend', isset($default['jurusan_pend']) ? $default['jurusan_pend'] : ''),'id="jurusan_pend" class="form-control" placeholder="Masukkan jurusan_pend"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('no_ijazah_pend : ','no_ijazah_pend',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('no_ijazah_pend',set_value('no_ijazah_pend', isset($default['no_ijazah_pend']) ? $default['no_ijazah_pend'] : ''),'id="no_ijazah_pend" class="form-control" placeholder="Masukkan no_ijazah_pend"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('tgl_ijazah_pend : ','tgl_ijazah_pend',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('tgl_ijazah_pend',set_value('tgl_ijazah_pend', isset($default['tgl_ijazah_pend']) ? $default['tgl_ijazah_pend'] : ''),'id="tgl_ijazah_pend" class="form-control" placeholder="Masukkan tgl_ijazah_pend"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('nil_ijazah_pend : ','nil_ijazah_pend',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nil_ijazah_pend',set_value('nil_ijazah_pend', isset($default['nil_ijazah_pend']) ? $default['nil_ijazah_pend'] : ''),'id="nil_ijazah_pend" class="form-control" placeholder="Masukkan nil_ijazah_pend"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('status_pmb : ','status_pmb',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('status_pmb',set_value('status_pmb', isset($default['status_pmb']) ? $default['status_pmb'] : ''),'id="status_pmb" class="form-control" placeholder="Masukkan status_pmb"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('id_siakad_keu_rek : ','id_siakad_keu_rek',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('id_siakad_keu_rek',set_value('id_siakad_keu_rek', isset($default['id_siakad_keu_rek']) ? $default['id_siakad_keu_rek'] : ''),'id="id_siakad_keu_rek" class="form-control" placeholder="Masukkan id_siakad_keu_rek"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('id_siakad_keu_pendaftaran : ','id_siakad_keu_pendaftaran',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('id_siakad_keu_pendaftaran',set_value('id_siakad_keu_pendaftaran', isset($default['id_siakad_keu_pendaftaran']) ? $default['id_siakad_keu_pendaftaran'] : ''),'id="id_siakad_keu_pendaftaran" class="form-control" placeholder="Masukkan id_siakad_keu_pendaftaran"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('tgl_transfer : ','tgl_transfer',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('tgl_transfer',set_value('tgl_transfer', isset($default['tgl_transfer']) ? $default['tgl_transfer'] : ''),'id="tgl_transfer" class="form-control" placeholder="Masukkan tgl_transfer"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('nm_transfer : ','nm_transfer',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nm_transfer',set_value('nm_transfer', isset($default['nm_transfer']) ? $default['nm_transfer'] : ''),'id="nm_transfer" class="form-control" placeholder="Masukkan nm_transfer"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('img_bukti_transfer : ','img_bukti_transfer',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('img_bukti_transfer',set_value('img_bukti_transfer', isset($default['img_bukti_transfer']) ? $default['img_bukti_transfer'] : ''),'id="img_bukti_transfer" class="form-control" placeholder="Masukkan img_bukti_transfer"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('img_pasfoto : ','img_pasfoto',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('img_pasfoto',set_value('img_pasfoto', isset($default['img_pasfoto']) ? $default['img_pasfoto'] : ''),'id="img_pasfoto" class="form-control" placeholder="Masukkan img_pasfoto"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('img_ijazah : ','img_ijazah',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('img_ijazah',set_value('img_ijazah', isset($default['img_ijazah']) ? $default['img_ijazah'] : ''),'id="img_ijazah" class="form-control" placeholder="Masukkan img_ijazah"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('img_transkrip : ','img_transkrip',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('img_transkrip',set_value('img_transkrip', isset($default['img_transkrip']) ? $default['img_transkrip'] : ''),'id="img_transkrip" class="form-control" placeholder="Masukkan img_transkrip"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('img_pindah : ','img_pindah',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('img_pindah',set_value('img_pindah', isset($default['img_pindah']) ? $default['img_pindah'] : ''),'id="img_pindah" class="form-control" placeholder="Masukkan img_pindah"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('status_cmhs : ','status_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('status_cmhs',set_value('status_cmhs', isset($default['status_cmhs']) ? $default['status_cmhs'] : ''),'id="status_cmhs" class="form-control" placeholder="Masukkan status_cmhs"'); ?>
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
