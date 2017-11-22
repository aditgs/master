 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'siakad_keu_koreksi/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id_sikad_keu_koreksi" name="id_sikad_keu_koreksi">
                            
                            <div class="form-group">
                                <?php echo form_label('jns_koreksi : ','jns_koreksi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jns_koreksi',set_value('jns_koreksi', isset($default['jns_koreksi']) ? $default['jns_koreksi'] : ''),'id="jns_koreksi" class="form-control" placeholder="Masukkan jns_koreksi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nim_mhs : ','nim_mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nim_mhs',set_value('nim_mhs', isset($default['nim_mhs']) ? $default['nim_mhs'] : ''),'id="nim_mhs" class="form-control" placeholder="Masukkan nim_mhs"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgl_koreksi : ','tgl_koreksi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_koreksi',set_value('tgl_koreksi', isset($default['tgl_koreksi']) ? $default['tgl_koreksi'] : ''),'id="tgl_koreksi" class="form-control" placeholder="Masukkan tgl_koreksi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nm_koreksi : ','nm_koreksi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nm_koreksi',set_value('nm_koreksi', isset($default['nm_koreksi']) ? $default['nm_koreksi'] : ''),'id="nm_koreksi" class="form-control" placeholder="Masukkan nm_koreksi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nominal_koreksi : ','nominal_koreksi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nominal_koreksi',set_value('nominal_koreksi', isset($default['nominal_koreksi']) ? $default['nominal_koreksi'] : ''),'id="nominal_koreksi" class="form-control" placeholder="Masukkan nominal_koreksi"'); ?>
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
            


 