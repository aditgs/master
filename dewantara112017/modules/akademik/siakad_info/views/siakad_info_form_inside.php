 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'siakad_info/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id_siakad_info" name="id_siakad_info">
                            
                            <div class="form-group">
                                <?php echo form_label('nm_info : ','nm_info',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nm_info',set_value('nm_info', isset($default['nm_info']) ? $default['nm_info'] : ''),'id="nm_info" class="form-control" placeholder="Masukkan nm_info"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('ket_info : ','ket_info',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('ket_info',set_value('ket_info', isset($default['ket_info']) ? $default['ket_info'] : ''),'id="ket_info" class="form-control" placeholder="Masukkan ket_info"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgl_info : ','tgl_info',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_info',set_value('tgl_info', isset($default['tgl_info']) ? $default['tgl_info'] : ''),'id="tgl_info" class="form-control" placeholder="Masukkan tgl_info"'); ?>
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
            


 