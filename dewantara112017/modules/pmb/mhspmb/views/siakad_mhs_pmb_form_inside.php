
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'siakad_mhs_pmb/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id_siakad_mhs_pmb" name="id_siakad_mhs_pmb"> 

         <div class="form-group">
            <?php echo form_label('No Pendaftaran : ','noreg_pmb',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('noreg_pmb',set_value('noreg_pmb', isset($default['noreg_pmb']) ? $default['noreg_pmb'] : ''),'id="noreg_pmb" class="form-control" placeholder="AUTO" readonly'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Kode Prodi : ','kode_prodi',array('class'=>'control-label')); ?>
            <?php $opt_prodi = array('61201'=>'S-1 Manajemen','62201'=>'S-1 Akuntansi',);?>
           
            <div class="controls input-group" style="width: 100%">
                <?php $kode_prodi = isset($default['kode_prodi'])? $default['kode_prodi'] : '0';  ?>
                <?php echo form_dropdown('kode_prodi',$opt_prodi,$kode_prodi,'id="kode_prodi" class="rekening form-control select2 " style="width:100%" placeholder="Prodi"'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Nama Lengkap : ','nm_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nm_cmhs',set_value('nm_cmhs', isset($default['nm_cmhs']) ? $default['nm_cmhs'] : ''),'id="nm_cmhs" class="form-control" placeholder="Masukkan Nama"'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('NIK : ','nik_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nik_cmhs',set_value('kodepos_cmhs', isset($default['nik_cmhs']) ? $default['nik_cmhs'] : ''),'id="nik_cmhs" class="form-control" placeholder="Masukkan NIK"'); ?>
            </div>
        </div>

        <div class="form-group">
                    <?php echo form_label('Tempat Lahir : ','tmp_cmhs',array('class'=>'control-label')); ?>
                    <div class="controls">
                        <?php echo form_input('tmp_cmhs',set_value('tmp_cmhs', isset($default['tmp_cmhs']) ? $default['tmp_cmhs'] : ''),'id="tmp_cmhs" class="form-control" placeholder="Masukkan Tempat Lahir "'); ?>
                    </div>
        </div>

        <div class="form-group tanggal">
                    <?php echo form_label('Tanggal Lahir : ','tgl_cmhs',array('class'=>'control-label')); ?>
                    <div class="input-daterange input-group controls" id="datepicker">
                        <?php if (!empty($default['tgl_cmhs'])): ?>
                        <input id="tgl_cmhs" value="<?php echo $default['tgl_cmhs']; ?>" type="text" onchange="" class="input-md form-control" name="tgl_cmhs" required />
                        <?php else: ?>
                        <input id="tgl_cmhs" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="tgl_cmhs" required />
                        <?php endif; ?>
                        <span class="input-group-btn">
                            <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a></span>
                    </div>
                </div>

        <?php $opt_agama_cmhs = array('Islam',
            'Protestan'=>'Protestan',
            'Katolik'=>'Katolik',
            'Hindu'=>'Hindu',
            'Budha'=>'Budha',
            'Konghucu'=>'Konghucu',);?>
                <div class="form-group">
                    <label class="control-label">
                        Agama
                    </label>
                    <div class="controls input-group" style="width: 100%">
                        <?php $agama_cmhs = isset($default['agama_cmhs'])? $default['agama_cmhs'] : '0';  ?>
                        <?php echo form_dropdown('agama_cmhs',$opt_agama_cmhs,$agama_cmhs,'id="agama_cmhs" class="rekening form-control select2 " style="width:100%" placeholder="Agama"'); ?>
                    </div>
                </div>

        
        
        <div class="form-group">
                    <div class="controls input-group">
                        <?php echo form_label('Jenis Kelamin : ','kelamin_cmhs',array('class'=>'control-label')); ?>
                        <select name="kelamin_cmhs" id="kelamin_cmhs" class=" form-control select2" style="width: 100%">
                            <option value="Laki-laki">Laki - laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
        
        
                
        <div class="form-group">
            <?php echo form_label('Alamat : ','almt_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_textarea('almt_cmhs',set_value('almt_cmhs', isset($default['almt_cmhs']) ? $default['almt_cmhs'] : ''),'id="almt_cmhs" class="form-control" placeholder="Masukkan Alamat" style="height:96px"'); ?>
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
        
        <div class="form-group" >
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
            <?php echo form_label('Nama Ibu : ','nm_ibu_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nm_ibu_cmhs',set_value('nm_ibu_cmhs', isset($default['nm_ibu_cmhs']) ? $default['nm_ibu_cmhs'] : ''),'id="nm_ibu_cmhs" class="form-control" placeholder="Masukkan Nama Ibu"'); ?>
            </div>
        </div>
        
       <div class="form-group">
            <?php echo form_label('Asal Pendidikan : ','asal_pend',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('asal_pend',set_value('asal_pend', isset($default['asal_pend']) ? $default['asal_pend'] : ''),'id="asal_pend" class="form-control" placeholder="Masukkan Asal Pendidikan"'); ?>
            </div>
        
        <div class="form-group">
            <?php echo form_label('Jurusan Pendidikan : ','jurusan_pend',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('jurusan_pend',set_value('jurusan_pend', isset($default['jurusan_pend']) ? $default['jurusan_pend'] : ''),'id="jurusan_pend" class="form-control" placeholder="Masukkan Jurusan Pendidikan"'); ?>
            </div>
        
        <div class="form-group">
            <?php echo form_label('No Ijazah : ','no_ijazah_pend',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('no_ijazah_pend',set_value('no_ijazah_pend', isset($default['no_ijazah_pend']) ? $default['no_ijazah_pend'] : ''),'id="no_ijazah_pend" class="form-control" placeholder="Masukkan No Ijazah"'); ?>
            </div>
        </div>
        
        <div class="form-group tanggal">
                    <?php echo form_label('Tanggal Ijazah : ','tgl_ijazah_pend',array('class'=>'control-label')); ?>
                    <div class="input-daterange input-group controls" id="datepicker">
                        <?php if (!empty($default['tgl_ijazah_pend'])): ?>
                        <input id="tgl_ijazah_pend" value="<?php echo $default['tgl_ijazah_pend']; ?>" type="text" onchange="" class="input-md form-control" name="tgl_ijazah_pend" required />
                        <?php else: ?>
                        <input id="tgl_ijazah_pend" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="tgl_ijazah_pend" required />
                        <?php endif; ?>
                        <span class="input-group-btn">
                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a></span>
                    </div>
                </div>
        
        <div class="form-group">
            <?php echo form_label('nil_ijazah_pend : ','nil_ijazah_pend',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nil_ijazah_pend',set_value('nil_ijazah_pend', isset($default['nil_ijazah_pend']) ? $default['nil_ijazah_pend'] : ''),'id="nil_ijazah_pend" class="form-control" placeholder="Masukkan nil_ijazah_pend"'); ?>
            </div>
        </div>

        <?php $opt_status_pmb = array('Terima',
        'Baru' => 'Baru',
        'Online' => 'Online',
        'Tolak' => 'Tolak',);?>
        
        <div class="form-group">
                    <label class="control-label">
                        Status PMB
                    </label>
                    <div class="controls input-group">
                        <?php $status_pmb = isset($default['status_pmb'])? $default['status_pmb'] : '0';  ?>
                        <?php echo form_dropdown('status_pmb',$opt_status_pmb,$status_pmb,'id="status_pmb" class="rekening form-control input-block input-md" style="width:100%" placeholder="Status PMB"'); ?>
                    </div>
                </div>
        
        <div class="form-group tanggal">
            <?php echo form_label('Tanggal Tansfer : ','tgl_transfer',array('class'=>'control-label')); ?>
            <div class="input-daterange input-group controls" id="datepicker">
                <?php if (!empty($default['tgl_transfer'])): ?>
                <input id="tgl_transfer" value="<?php echo $default['tgl_transfer']; ?>" type="text" onchange="" class="input-md form-control" name="tgl_transfer" required />
                <?php else: ?>
                <input id="tgl_transfer" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="tgl_transfer" required />
                <?php endif; ?>
                <span class="input-group-btn">
                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a></span>
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
                    <div class="controls input-group">
                        <?php echo form_label('Status Calon Mahasiswa : ','status_cmhs',array('class'=>'control-label')); ?>
                        <select name="status_cmhs" id="status_cmhs" class="input-md form-control" style="width: 100%">
                            <option value="Baru">Baru</option>
                            <option value="Pindah">Pindah</option>
                        </select>
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
<script type="text/javascript">
$(document).ready(function() {
            $.getScript(assetsurl + "datepicker.js")
                .done(function(script, textStatus) {
                    console.log(textStatus);
                })
                .fail(function(jqxhr, settings, exception) {
                    // $( "div.log" ).text( "Triggered ajaxError handler." ); 
                    // alert('triiger');

                })
</script>
