 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'siakad_mhs/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="nim_mhs" name="nim_mhs">
                            
                            <div class="form-group">
                                <?php echo form_label('npm_mhs : ','npm_mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('npm_mhs',set_value('npm_mhs', isset($default['npm_mhs']) ? $default['npm_mhs'] : ''),'id="npm_mhs" class="form-control" placeholder="Masukkan npm_mhs"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('noreg_pmb : ','noreg_pmb',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('noreg_pmb',set_value('noreg_pmb', isset($default['noreg_pmb']) ? $default['noreg_pmb'] : ''),'id="noreg_pmb" class="form-control" placeholder="Masukkan noreg_pmb"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kode_prodi : ','kode_prodi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode_prodi',set_value('kode_prodi', isset($default['kode_prodi']) ? $default['kode_prodi'] : ''),'id="kode_prodi" class="form-control" placeholder="Masukkan kode_prodi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nm_mhs : ','nm_mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nm_mhs',set_value('nm_mhs', isset($default['nm_mhs']) ? $default['nm_mhs'] : ''),'id="nm_mhs" class="form-control" placeholder="Masukkan nm_mhs"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('thn_masuk : ','thn_masuk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('thn_masuk',set_value('thn_masuk', isset($default['thn_masuk']) ? $default['thn_masuk'] : ''),'id="thn_masuk" class="form-control" placeholder="Masukkan thn_masuk"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kode_akademik : ','kode_akademik',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode_akademik',set_value('kode_akademik', isset($default['kode_akademik']) ? $default['kode_akademik'] : ''),'id="kode_akademik" class="form-control" placeholder="Masukkan kode_akademik"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('bts_akademik : ','bts_akademik',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('bts_akademik',set_value('bts_akademik', isset($default['bts_akademik']) ? $default['bts_akademik'] : ''),'id="bts_akademik" class="form-control" placeholder="Masukkan bts_akademik"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kelamin_mhs : ','kelamin_mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kelamin_mhs',set_value('kelamin_mhs', isset($default['kelamin_mhs']) ? $default['kelamin_mhs'] : ''),'id="kelamin_mhs" class="form-control" placeholder="Masukkan kelamin_mhs"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tmp_mhs : ','tmp_mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tmp_mhs',set_value('tmp_mhs', isset($default['tmp_mhs']) ? $default['tmp_mhs'] : ''),'id="tmp_mhs" class="form-control" placeholder="Masukkan tmp_mhs"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgl_mhs : ','tgl_mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_mhs',set_value('tgl_mhs', isset($default['tgl_mhs']) ? $default['tgl_mhs'] : ''),'id="tgl_mhs" class="form-control" placeholder="Masukkan tgl_mhs"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('agama_mhs : ','agama_mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('agama_mhs',set_value('agama_mhs', isset($default['agama_mhs']) ? $default['agama_mhs'] : ''),'id="agama_mhs" class="form-control" placeholder="Masukkan agama_mhs"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('almt_mhs : ','almt_mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('almt_mhs',set_value('almt_mhs', isset($default['almt_mhs']) ? $default['almt_mhs'] : ''),'id="almt_mhs" class="form-control" placeholder="Masukkan almt_mhs"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kota_mhs : ','kota_mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kota_mhs',set_value('kota_mhs', isset($default['kota_mhs']) ? $default['kota_mhs'] : ''),'id="kota_mhs" class="form-control" placeholder="Masukkan kota_mhs"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kodepos_mhs : ','kodepos_mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kodepos_mhs',set_value('kodepos_mhs', isset($default['kodepos_mhs']) ? $default['kodepos_mhs'] : ''),'id="kodepos_mhs" class="form-control" placeholder="Masukkan kodepos_mhs"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('email_mhs : ','email_mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('email_mhs',set_value('email_mhs', isset($default['email_mhs']) ? $default['email_mhs'] : ''),'id="email_mhs" class="form-control" placeholder="Masukkan email_mhs"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('hp_mhs : ','hp_mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('hp_mhs',set_value('hp_mhs', isset($default['hp_mhs']) ? $default['hp_mhs'] : ''),'id="hp_mhs" class="form-control" placeholder="Masukkan hp_mhs"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('telp_mhs : ','telp_mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('telp_mhs',set_value('telp_mhs', isset($default['telp_mhs']) ? $default['telp_mhs'] : ''),'id="telp_mhs" class="form-control" placeholder="Masukkan telp_mhs"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('status_mhs : ','status_mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('status_mhs',set_value('status_mhs', isset($default['status_mhs']) ? $default['status_mhs'] : ''),'id="status_mhs" class="form-control" placeholder="Masukkan status_mhs"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nip_dosen : ','nip_dosen',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nip_dosen',set_value('nip_dosen', isset($default['nip_dosen']) ? $default['nip_dosen'] : ''),'id="nip_dosen" class="form-control" placeholder="Masukkan nip_dosen"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('img_mhs : ','img_mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('img_mhs',set_value('img_mhs', isset($default['img_mhs']) ? $default['img_mhs'] : ''),'id="img_mhs" class="form-control" placeholder="Masukkan img_mhs"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('pass_mhs : ','pass_mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('pass_mhs',set_value('pass_mhs', isset($default['pass_mhs']) ? $default['pass_mhs'] : ''),'id="pass_mhs" class="form-control" placeholder="Masukkan pass_mhs"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgl_lulus_mhs : ','tgl_lulus_mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_lulus_mhs',set_value('tgl_lulus_mhs', isset($default['tgl_lulus_mhs']) ? $default['tgl_lulus_mhs'] : ''),'id="tgl_lulus_mhs" class="form-control" placeholder="Masukkan tgl_lulus_mhs"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('no_transkrip : ','no_transkrip',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('no_transkrip',set_value('no_transkrip', isset($default['no_transkrip']) ? $default['no_transkrip'] : ''),'id="no_transkrip" class="form-control" placeholder="Masukkan no_transkrip"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('status_masuk : ','status_masuk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('status_masuk',set_value('status_masuk', isset($default['status_masuk']) ? $default['status_masuk'] : ''),'id="status_masuk" class="form-control" placeholder="Masukkan status_masuk"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('style_mhs : ','style_mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('style_mhs',set_value('style_mhs', isset($default['style_mhs']) ? $default['style_mhs'] : ''),'id="style_mhs" class="form-control" placeholder="Masukkan style_mhs"'); ?>
                                </div>
                            </div>
                        
                        </div>
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button id="save" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                   
                    <?php echo form_close();?>
                    </div>
            


 