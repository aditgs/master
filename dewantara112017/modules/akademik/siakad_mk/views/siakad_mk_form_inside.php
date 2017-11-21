 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'siakad_mk/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="kode_mk" name="kode_mk">
                            
                            <div class="form-group">
                                <?php echo form_label('id_siakad_kurikulum : ','id_siakad_kurikulum',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_siakad_kurikulum',set_value('id_siakad_kurikulum', isset($default['id_siakad_kurikulum']) ? $default['id_siakad_kurikulum'] : ''),'id="id_siakad_kurikulum" class="form-control" placeholder="Masukkan id_siakad_kurikulum"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kode_prodi : ','kode_prodi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode_prodi',set_value('kode_prodi', isset($default['kode_prodi']) ? $default['kode_prodi'] : ''),'id="kode_prodi" class="form-control" placeholder="Masukkan kode_prodi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nm_mk : ','nm_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nm_mk',set_value('nm_mk', isset($default['nm_mk']) ? $default['nm_mk'] : ''),'id="nm_mk" class="form-control" placeholder="Masukkan nm_mk"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('jns_mk : ','jns_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jns_mk',set_value('jns_mk', isset($default['jns_mk']) ? $default['jns_mk'] : ''),'id="jns_mk" class="form-control" placeholder="Masukkan jns_mk"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kurikulum_mk : ','kurikulum_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kurikulum_mk',set_value('kurikulum_mk', isset($default['kurikulum_mk']) ? $default['kurikulum_mk'] : ''),'id="kurikulum_mk" class="form-control" placeholder="Masukkan kurikulum_mk"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kelompok_mk : ','kelompok_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kelompok_mk',set_value('kelompok_mk', isset($default['kelompok_mk']) ? $default['kelompok_mk'] : ''),'id="kelompok_mk" class="form-control" placeholder="Masukkan kelompok_mk"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('sks_mk : ','sks_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('sks_mk',set_value('sks_mk', isset($default['sks_mk']) ? $default['sks_mk'] : ''),'id="sks_mk" class="form-control" placeholder="Masukkan sks_mk"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('sks_tatapmuka : ','sks_tatapmuka',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('sks_tatapmuka',set_value('sks_tatapmuka', isset($default['sks_tatapmuka']) ? $default['sks_tatapmuka'] : ''),'id="sks_tatapmuka" class="form-control" placeholder="Masukkan sks_tatapmuka"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('sks_praktikum : ','sks_praktikum',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('sks_praktikum',set_value('sks_praktikum', isset($default['sks_praktikum']) ? $default['sks_praktikum'] : ''),'id="sks_praktikum" class="form-control" placeholder="Masukkan sks_praktikum"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('min_mk_lulus : ','min_mk_lulus',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('min_mk_lulus',set_value('min_mk_lulus', isset($default['min_mk_lulus']) ? $default['min_mk_lulus'] : ''),'id="min_mk_lulus" class="form-control" placeholder="Masukkan min_mk_lulus"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('status_mk : ','status_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('status_mk',set_value('status_mk', isset($default['status_mk']) ? $default['status_mk'] : ''),'id="status_mk" class="form-control" placeholder="Masukkan status_mk"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('upload_silabus_mk : ','upload_silabus_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('upload_silabus_mk',set_value('upload_silabus_mk', isset($default['upload_silabus_mk']) ? $default['upload_silabus_mk'] : ''),'id="upload_silabus_mk" class="form-control" placeholder="Masukkan upload_silabus_mk"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('upload_sap_mk : ','upload_sap_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('upload_sap_mk',set_value('upload_sap_mk', isset($default['upload_sap_mk']) ? $default['upload_sap_mk'] : ''),'id="upload_sap_mk" class="form-control" placeholder="Masukkan upload_sap_mk"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('upload_bahan_mk : ','upload_bahan_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('upload_bahan_mk',set_value('upload_bahan_mk', isset($default['upload_bahan_mk']) ? $default['upload_bahan_mk'] : ''),'id="upload_bahan_mk" class="form-control" placeholder="Masukkan upload_bahan_mk"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('upload_diktat_mk : ','upload_diktat_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('upload_diktat_mk',set_value('upload_diktat_mk', isset($default['upload_diktat_mk']) ? $default['upload_diktat_mk'] : ''),'id="upload_diktat_mk" class="form-control" placeholder="Masukkan upload_diktat_mk"'); ?>
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
            


 