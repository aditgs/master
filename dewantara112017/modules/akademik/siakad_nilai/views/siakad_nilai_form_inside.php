 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'siakad_nilai/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id_siakad_nilai" name="id_siakad_nilai">
                            
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
                                <?php echo form_label('nilai_huruf : ','nilai_huruf',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nilai_huruf',set_value('nilai_huruf', isset($default['nilai_huruf']) ? $default['nilai_huruf'] : ''),'id="nilai_huruf" class="form-control" placeholder="Masukkan nilai_huruf"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nilai_bobot : ','nilai_bobot',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nilai_bobot',set_value('nilai_bobot', isset($default['nilai_bobot']) ? $default['nilai_bobot'] : ''),'id="nilai_bobot" class="form-control" placeholder="Masukkan nilai_bobot"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('bts_nilai_awal : ','bts_nilai_awal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('bts_nilai_awal',set_value('bts_nilai_awal', isset($default['bts_nilai_awal']) ? $default['bts_nilai_awal'] : ''),'id="bts_nilai_awal" class="form-control" placeholder="Masukkan bts_nilai_awal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('bts_nilai_akhir : ','bts_nilai_akhir',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('bts_nilai_akhir',set_value('bts_nilai_akhir', isset($default['bts_nilai_akhir']) ? $default['bts_nilai_akhir'] : ''),'id="bts_nilai_akhir" class="form-control" placeholder="Masukkan bts_nilai_akhir"'); ?>
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
            


 