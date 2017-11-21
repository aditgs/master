 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'siakad_staff/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="nip_staff" name="nip_staff">
                            
                            <div class="form-group">
                                <?php echo form_label('tipe_staff : ','tipe_staff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tipe_staff',set_value('tipe_staff', isset($default['tipe_staff']) ? $default['tipe_staff'] : ''),'id="tipe_staff" class="form-control" placeholder="Masukkan tipe_staff"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('jenis_staff : ','jenis_staff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jenis_staff',set_value('jenis_staff', isset($default['jenis_staff']) ? $default['jenis_staff'] : ''),'id="jenis_staff" class="form-control" placeholder="Masukkan jenis_staff"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nidn_staff : ','nidn_staff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nidn_staff',set_value('nidn_staff', isset($default['nidn_staff']) ? $default['nidn_staff'] : ''),'id="nidn_staff" class="form-control" placeholder="Masukkan nidn_staff"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nm_staff : ','nm_staff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nm_staff',set_value('nm_staff', isset($default['nm_staff']) ? $default['nm_staff'] : ''),'id="nm_staff" class="form-control" placeholder="Masukkan nm_staff"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kelamin_staff : ','kelamin_staff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kelamin_staff',set_value('kelamin_staff', isset($default['kelamin_staff']) ? $default['kelamin_staff'] : ''),'id="kelamin_staff" class="form-control" placeholder="Masukkan kelamin_staff"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tmp_staff : ','tmp_staff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tmp_staff',set_value('tmp_staff', isset($default['tmp_staff']) ? $default['tmp_staff'] : ''),'id="tmp_staff" class="form-control" placeholder="Masukkan tmp_staff"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgl_staff : ','tgl_staff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_staff',set_value('tgl_staff', isset($default['tgl_staff']) ? $default['tgl_staff'] : ''),'id="tgl_staff" class="form-control" placeholder="Masukkan tgl_staff"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('agama_staff : ','agama_staff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('agama_staff',set_value('agama_staff', isset($default['agama_staff']) ? $default['agama_staff'] : ''),'id="agama_staff" class="form-control" placeholder="Masukkan agama_staff"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('almt_staff : ','almt_staff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('almt_staff',set_value('almt_staff', isset($default['almt_staff']) ? $default['almt_staff'] : ''),'id="almt_staff" class="form-control" placeholder="Masukkan almt_staff"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kota_staff : ','kota_staff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kota_staff',set_value('kota_staff', isset($default['kota_staff']) ? $default['kota_staff'] : ''),'id="kota_staff" class="form-control" placeholder="Masukkan kota_staff"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('email_staff : ','email_staff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('email_staff',set_value('email_staff', isset($default['email_staff']) ? $default['email_staff'] : ''),'id="email_staff" class="form-control" placeholder="Masukkan email_staff"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('telp_staff : ','telp_staff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('telp_staff',set_value('telp_staff', isset($default['telp_staff']) ? $default['telp_staff'] : ''),'id="telp_staff" class="form-control" placeholder="Masukkan telp_staff"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('g_dpn_staff : ','g_dpn_staff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('g_dpn_staff',set_value('g_dpn_staff', isset($default['g_dpn_staff']) ? $default['g_dpn_staff'] : ''),'id="g_dpn_staff" class="form-control" placeholder="Masukkan g_dpn_staff"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('g_blkng_staff : ','g_blkng_staff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('g_blkng_staff',set_value('g_blkng_staff', isset($default['g_blkng_staff']) ? $default['g_blkng_staff'] : ''),'id="g_blkng_staff" class="form-control" placeholder="Masukkan g_blkng_staff"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('status_staff : ','status_staff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('status_staff',set_value('status_staff', isset($default['status_staff']) ? $default['status_staff'] : ''),'id="status_staff" class="form-control" placeholder="Masukkan status_staff"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('foto_staff : ','foto_staff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('foto_staff',set_value('foto_staff', isset($default['foto_staff']) ? $default['foto_staff'] : ''),'id="foto_staff" class="form-control" placeholder="Masukkan foto_staff"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('pass_staff : ','pass_staff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('pass_staff',set_value('pass_staff', isset($default['pass_staff']) ? $default['pass_staff'] : ''),'id="pass_staff" class="form-control" placeholder="Masukkan pass_staff"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('style_staff : ','style_staff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('style_staff',set_value('style_staff', isset($default['style_staff']) ? $default['style_staff'] : ''),'id="style_staff" class="form-control" placeholder="Masukkan style_staff"'); ?>
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
            


 