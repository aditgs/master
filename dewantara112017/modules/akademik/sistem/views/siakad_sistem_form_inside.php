 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'sistem/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id_siakad_sistem" name="id_siakad_sistem">
                            
                            <div class="form-group">
                                <?php echo form_label('Tahun Akademik : ','thn_akademik',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('thn_akademik',set_value('thn_akademik', isset($default['thn_akademik']) ? $default['thn_akademik'] : ''),'id="thn_akademik" class="form-control" placeholder="Masukkan tahun akademik"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Kode Akademik : ','kode_akademik',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode_akademik',set_value('kode_akademik', isset($default['kode_akademik']) ? $default['kode_akademik'] : ''),'id="kode_akademik" class="form-control" placeholder="Masukkan kode akademik"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Status Akademik : ','status_akademik',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('status_akademik',set_value('status_akademik', isset($default['status_akademik']) ? $default['status_akademik'] : ''),'id="status_akademik" class="form-control" placeholder="Masukkan status akademik"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Semester Akademik : ','smtr_akademik',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('smtr_akademik',set_value('smtr_akademik', isset($default['smtr_akademik']) ? $default['smtr_akademik'] : ''),'id="smtr_akademik" class="form-control" placeholder="Masukkan semester akademik"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tanggal Start Akademik : ','tgl_start_akademik',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_start_akademik',set_value('tgl_start_akademik', isset($default['tgl_start_akademik']) ? $default['tgl_start_akademik'] : ''),'id="tgl_start_akademik" class="form-control" placeholder="Masukkan tanggal start akademik"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tanggal Akhir Akademik : ','tgl_end_akademik',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_end_akademik',set_value('tgl_end_akademik', isset($default['tgl_end_akademik']) ? $default['tgl_end_akademik'] : ''),'id="tgl_end_akademik" class="form-control" placeholder="Masukkan tanggal akhir akademik"'); ?>
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
            


 