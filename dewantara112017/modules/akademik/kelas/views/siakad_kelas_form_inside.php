 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'siakad_kelas/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id_siakad_kelas" name="id_siakad_kelas">
                            
                            <div class="form-group">
                                <?php echo form_label('thn_akademik : ','thn_akademik',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('thn_akademik',set_value('thn_akademik', isset($default['thn_akademik']) ? $default['thn_akademik'] : ''),'id="thn_akademik" class="form-control" placeholder="Masukkan thn_akademik"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('inisial_kelas : ','inisial_kelas',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('inisial_kelas',set_value('inisial_kelas', isset($default['inisial_kelas']) ? $default['inisial_kelas'] : ''),'id="inisial_kelas" class="form-control" placeholder="Masukkan inisial_kelas"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nm_kelas : ','nm_kelas',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nm_kelas',set_value('nm_kelas', isset($default['nm_kelas']) ? $default['nm_kelas'] : ''),'id="nm_kelas" class="form-control" placeholder="Masukkan nm_kelas"'); ?>
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
            


 