 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'siakad_kurikulum/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id_siakad_kurikulum" name="id_siakad_kurikulum">
                            
                            <div class="form-group">
                                <?php echo form_label('kode_prodi : ','kode_prodi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode_prodi',set_value('kode_prodi', isset($default['kode_prodi']) ? $default['kode_prodi'] : ''),'id="kode_prodi" class="form-control" placeholder="Masukkan kode_prodi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kode_kurikulum : ','kode_kurikulum',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode_kurikulum',set_value('kode_kurikulum', isset($default['kode_kurikulum']) ? $default['kode_kurikulum'] : ''),'id="kode_kurikulum" class="form-control" placeholder="Masukkan kode_kurikulum"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nm_kurikulum : ','nm_kurikulum',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nm_kurikulum',set_value('nm_kurikulum', isset($default['nm_kurikulum']) ? $default['nm_kurikulum'] : ''),'id="nm_kurikulum" class="form-control" placeholder="Masukkan nm_kurikulum"'); ?>
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
            


 