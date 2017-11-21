 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'siakad_ruang/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id_siakad_ruang" name="id_siakad_ruang">
                            
                            <div class="form-group">
                                <?php echo form_label('inisial_ruangan : ','inisial_ruangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('inisial_ruangan',set_value('inisial_ruangan', isset($default['inisial_ruangan']) ? $default['inisial_ruangan'] : ''),'id="inisial_ruangan" class="form-control" placeholder="Masukkan inisial_ruangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nm_ruangan : ','nm_ruangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nm_ruangan',set_value('nm_ruangan', isset($default['nm_ruangan']) ? $default['nm_ruangan'] : ''),'id="nm_ruangan" class="form-control" placeholder="Masukkan nm_ruangan"'); ?>
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
            


 