 

                    <div id="form_input" class="row gutter5">
                    <?php echo form_open(base_url().'tagihanmhs/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                      
                            <div class="form-group">
                                <?php echo form_label('kodebank : ','kodebank',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kodebank',set_value('kodebank', isset($default['kodebank']) ? $default['kodebank'] : ''),'id="kodebank" class="form-control" placeholder="Masukkan kodebank"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('refbank : ','refbank',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('refbank',set_value('refbank', isset($default['refbank']) ? $default['refbank'] : ''),'id="refbank" class="form-control" placeholder="Masukkan refbank"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('isbayar : ','isbayar',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('isbayar',set_value('isbayar', isset($default['isbayar']) ? $default['isbayar'] : ''),'id="isbayar" class="form-control" placeholder="Masukkan isbayar"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tglbayar : ','tglbayar',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tglbayar',set_value('tglbayar', isset($default['tglbayar']) ? $default['tglbayar'] : ''),'id="tglbayar" class="form-control" placeholder="Masukkan tglbayar"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('isvalidasi : ','isvalidasi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('isvalidasi',set_value('isvalidasi', isset($default['isvalidasi']) ? $default['isvalidasi'] : ''),'id="isvalidasi" class="form-control" placeholder="Masukkan isvalidasi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tglvalidasi : ','tglvalidasi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tglvalidasi',set_value('tglvalidasi', isset($default['tglvalidasi']) ? $default['tglvalidasi'] : ''),'id="tglvalidasi" class="form-control" placeholder="Masukkan tglvalidasi"'); ?>
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
            


 