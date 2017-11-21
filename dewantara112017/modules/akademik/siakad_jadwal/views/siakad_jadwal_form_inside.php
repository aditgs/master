 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'siakad_jadwal/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id_siakad_jadwal" name="id_siakad_jadwal">
                            
                            <div class="form-group">
                                <?php echo form_label('kode_akademik : ','kode_akademik',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode_akademik',set_value('kode_akademik', isset($default['kode_akademik']) ? $default['kode_akademik'] : ''),'id="kode_akademik" class="form-control" placeholder="Masukkan kode_akademik"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kode_prodi : ','kode_prodi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode_prodi',set_value('kode_prodi', isset($default['kode_prodi']) ? $default['kode_prodi'] : ''),'id="kode_prodi" class="form-control" placeholder="Masukkan kode_prodi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kode_mk : ','kode_mk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode_mk',set_value('kode_mk', isset($default['kode_mk']) ? $default['kode_mk'] : ''),'id="kode_mk" class="form-control" placeholder="Masukkan kode_mk"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('hari_jadwal : ','hari_jadwal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('hari_jadwal',set_value('hari_jadwal', isset($default['hari_jadwal']) ? $default['hari_jadwal'] : ''),'id="hari_jadwal" class="form-control" placeholder="Masukkan hari_jadwal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('jam_mulai : ','jam_mulai',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jam_mulai',set_value('jam_mulai', isset($default['jam_mulai']) ? $default['jam_mulai'] : ''),'id="jam_mulai" class="form-control" placeholder="Masukkan jam_mulai"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('jam_selesai : ','jam_selesai',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jam_selesai',set_value('jam_selesai', isset($default['jam_selesai']) ? $default['jam_selesai'] : ''),'id="jam_selesai" class="form-control" placeholder="Masukkan jam_selesai"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_siakad_ruang : ','id_siakad_ruang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_siakad_ruang',set_value('id_siakad_ruang', isset($default['id_siakad_ruang']) ? $default['id_siakad_ruang'] : ''),'id="id_siakad_ruang" class="form-control" placeholder="Masukkan id_siakad_ruang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kapasitas_ruang : ','kapasitas_ruang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kapasitas_ruang',set_value('kapasitas_ruang', isset($default['kapasitas_ruang']) ? $default['kapasitas_ruang'] : ''),'id="kapasitas_ruang" class="form-control" placeholder="Masukkan kapasitas_ruang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tatap_muka : ','tatap_muka',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tatap_muka',set_value('tatap_muka', isset($default['tatap_muka']) ? $default['tatap_muka'] : ''),'id="tatap_muka" class="form-control" placeholder="Masukkan tatap_muka"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('inisial_kelas_jadwal : ','inisial_kelas_jadwal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('inisial_kelas_jadwal',set_value('inisial_kelas_jadwal', isset($default['inisial_kelas_jadwal']) ? $default['inisial_kelas_jadwal'] : ''),'id="inisial_kelas_jadwal" class="form-control" placeholder="Masukkan inisial_kelas_jadwal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nip_dosen : ','nip_dosen',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nip_dosen',set_value('nip_dosen', isset($default['nip_dosen']) ? $default['nip_dosen'] : ''),'id="nip_dosen" class="form-control" placeholder="Masukkan nip_dosen"'); ?>
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
            


 