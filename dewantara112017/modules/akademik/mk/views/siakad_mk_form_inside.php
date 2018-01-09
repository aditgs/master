 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'mk/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="kode_mk" name="kode_mk">
                            
                            <div class="form-group">
                                <?php echo form_label('ID Kurikulum : ','id_siakad_kurikulum',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_siakad_kurikulum',set_value('id_siakad_kurikulum', isset($default['id_siakad_kurikulum']) ? $default['id_siakad_kurikulum'] : ''),'id="id_siakad_kurikulum" class="form-control" placeholder="Masukkan id kurikulum"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Kode Prodi : ','kode_prodi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode_prodi',set_value('kode_prodi', isset($default['kode_prodi']) ? $default['kode_prodi'] : ''),'id="kode_prodi" class="form-control" placeholder="Masukkan kode prodi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Nama Mata Kuliah : ','nm_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nm_mk',set_value('nm_mk', isset($default['nm_mk']) ? $default['nm_mk'] : ''),'id="nm_mk" class="form-control" placeholder="Masukkan nama mata kuliah"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Jenis Mata Kuliah : ','jns_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jns_mk',set_value('jns_mk', isset($default['jns_mk']) ? $default['jns_mk'] : ''),'id="jns_mk" class="form-control" placeholder="Masukkan jenis mata kuliah"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Kurikulum Mata Kuliah : ','kurikulum_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kurikulum_mk',set_value('kurikulum_mk', isset($default['kurikulum_mk']) ? $default['kurikulum_mk'] : ''),'id="kurikulum_mk" class="form-control" placeholder="Masukkan kurikulum mata kuliah"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Kelompok Mata Kuliah : ','kelompok_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kelompok_mk',set_value('kelompok_mk', isset($default['kelompok_mk']) ? $default['kelompok_mk'] : ''),'id="kelompok_mk" class="form-control" placeholder="Masukkan kelompok mata kuliah"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('SKS Mata Kuliah : ','sks_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('sks_mk',set_value('sks_mk', isset($default['sks_mk']) ? $default['sks_mk'] : ''),'id="sks_mk" class="form-control" placeholder="Masukkan sks mata kuliah"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('SKS Tatap Muka : ','sks_tatapmuka',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('sks_tatapmuka',set_value('sks_tatapmuka', isset($default['sks_tatapmuka']) ? $default['sks_tatapmuka'] : ''),'id="sks_tatapmuka" class="form-control" placeholder="Masukkan sks tatap muka"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('SKS Praktikum : ','sks_praktikum',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('sks_praktikum',set_value('sks_praktikum', isset($default['sks_praktikum']) ? $default['sks_praktikum'] : ''),'id="sks_praktikum" class="form-control" placeholder="Masukkan sks praktikum"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Minimal Mata Kuliah Lulus : ','min_mk_lulus',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('min_mk_lulus',set_value('min_mk_lulus', isset($default['min_mk_lulus']) ? $default['min_mk_lulus'] : ''),'id="min_mk_lulus" class="form-control" placeholder="Masukkan minimal mata kuliah lulus"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Status Mata Kuliah : ','status_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('status_mk',set_value('status_mk', isset($default['status_mk']) ? $default['status_mk'] : ''),'id="status_mk" class="form-control" placeholder="Masukkan status mata kuliah"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Upload Silabus Mata Kuliah : ','upload_silabus_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('upload_silabus_mk',set_value('upload_silabus_mk', isset($default['upload_silabus_mk']) ? $default['upload_silabus_mk'] : ''),'id="upload_silabus_mk" class="form-control" placeholder="Masukkan upload silabus mata kuliah"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Upload SAP Mata Kuliah : ','upload_sap_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('upload_sap_mk',set_value('upload_sap_mk', isset($default['upload_sap_mk']) ? $default['upload_sap_mk'] : ''),'id="upload_sap_mk" class="form-control" placeholder="Masukkan upload sap mata kuliah"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Upload Bahan Mata Kuliah : ','upload_bahan_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('upload_bahan_mk',set_value('upload_bahan_mk', isset($default['upload_bahan_mk']) ? $default['upload_bahan_mk'] : ''),'id="upload_bahan_mk" class="form-control" placeholder="Masukkan upload bahan mata kuliah"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Upload Diktat Mata Kuliah : ','upload_diktat_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('upload_diktat_mk',set_value('upload_diktat_mk', isset($default['upload_diktat_mk']) ? $default['upload_diktat_mk'] : ''),'id="upload_diktat_mk" class="form-control" placeholder="Masukkan upload diktat mata kuliah"'); ?>
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
            


 