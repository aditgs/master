 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'tagihan_detail/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('kodetagihan : ','kodetagihan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kodetagihan',set_value('kodetagihan', isset($default['kodetagihan']) ? $default['kodetagihan'] : ''),'id="kodetagihan" class="form-control" placeholder="Masukkan kodetagihan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kodetarif : ','kodetarif',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kodetarif',set_value('kodetarif', isset($default['kodetarif']) ? $default['kodetarif'] : ''),'id="kodetarif" class="form-control" placeholder="Masukkan kodetarif"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('istagihan : ','istagihan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('istagihan',set_value('istagihan', isset($default['istagihan']) ? $default['istagihan'] : ''),'id="istagihan" class="form-control" placeholder="Masukkan istagihan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('isactive : ','isactive',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('isactive',set_value('isactive', isset($default['isactive']) ? $default['isactive'] : ''),'id="isactive" class="form-control" placeholder="Masukkan isactive"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('isdeleted : ','isdeleted',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('isdeleted',set_value('isdeleted', isset($default['isdeleted']) ? $default['isdeleted'] : ''),'id="isdeleted" class="form-control" placeholder="Masukkan isdeleted"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('datedeleted : ','datedeleted',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('datedeleted',set_value('datedeleted', isset($default['datedeleted']) ? $default['datedeleted'] : ''),'id="datedeleted" class="form-control" placeholder="Masukkan datedeleted"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('datetime : ','datetime',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('datetime',set_value('datetime', isset($default['datetime']) ? $default['datetime'] : ''),'id="datetime" class="form-control" placeholder="Masukkan datetime"'); ?>
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
            


 