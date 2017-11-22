 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'siakad_keu_paket_komp/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              
                        </div>  
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <input type="hidden" value='' id="id_siakad_keu_paket_komp" name="id_siakad_keu_paket_komp">
                            
                            <div class="form-group">
                                <?php echo form_label('ID Paket : ','id_siakad_keu_paket',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_siakad_keu_paket',set_value('id_siakad_keu_paket', isset($default['id_siakad_keu_paket']) ? $default['id_siakad_keu_paket'] : ''),'id="id_siakad_keu_paket" class="form-control" placeholder="Masukkan id_siakad_keu_paket"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            
                            <div class="form-group">
                                <?php echo form_label('ID Tagihan Biaya : ','id_siakad_keu_master',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_siakad_keu_master',set_value('id_siakad_keu_master', isset($default['id_siakad_keu_master']) ? $default['id_siakad_keu_master'] : ''),'id="id_siakad_keu_master" class="form-control" placeholder="Masukkan id_siakad_keu_master"'); ?>
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
            


 