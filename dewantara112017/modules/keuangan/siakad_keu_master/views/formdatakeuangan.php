 

                    <div id="form_input" class="row gutter5">
                    <?php echo form_open(base_url().'siakad_keu_master/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id_siakad_keu_master" name="id_siakad_keu_master">
                            
                            <div class="form-group">
                                <?php echo form_label('kode_akademik : ','kode_akademik',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode_akademik',set_value('kode_akademik', isset($default['kode_akademik']) ? $default['kode_akademik'] : ''),'id="kode_akademik" class="form-control" placeholder="Masukkan kode_akademik"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nm_tagihan : ','nm_tagihan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nm_tagihan',set_value('nm_tagihan', isset($default['nm_tagihan']) ? $default['nm_tagihan'] : ''),'id="nm_tagihan" class="form-control" placeholder="Masukkan nm_tagihan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nominal_biaya : ','nominal_biaya',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nominal_biaya',set_value('nominal_biaya', isset($default['nominal_biaya']) ? $default['nominal_biaya'] : ''),'id="nominal_biaya" class="form-control" placeholder="Masukkan nominal_biaya"'); ?>
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
            


 