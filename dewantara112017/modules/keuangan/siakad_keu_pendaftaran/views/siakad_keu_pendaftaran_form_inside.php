 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'siakad_keu_pendaftaran/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id_siakad_keu_pendaftaran" name="id_siakad_keu_pendaftaran">
                            
                            <div class="form-group">
                                <?php echo form_label('thn_akademik : ','thn_akademik',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('thn_akademik',set_value('thn_akademik', isset($default['thn_akademik']) ? $default['thn_akademik'] : ''),'id="thn_akademik" class="form-control" placeholder="Masukkan thn_akademik"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nm_pendaftaran : ','nm_pendaftaran',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nm_pendaftaran',set_value('nm_pendaftaran', isset($default['nm_pendaftaran']) ? $default['nm_pendaftaran'] : ''),'id="nm_pendaftaran" class="form-control" placeholder="Masukkan nm_pendaftaran"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('biaya_pendaftaran : ','biaya_pendaftaran',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('biaya_pendaftaran',set_value('biaya_pendaftaran', isset($default['biaya_pendaftaran']) ? $default['biaya_pendaftaran'] : ''),'id="biaya_pendaftaran" class="form-control" placeholder="Masukkan biaya_pendaftaran"'); ?>
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
            


 