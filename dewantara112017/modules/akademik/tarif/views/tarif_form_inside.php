 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'tarif/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('KodeT : ','KodeT',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('KodeT',set_value('KodeT', isset($default['KodeT']) ? $default['KodeT'] : ''),'id="KodeT" class="form-control" placeholder="Masukkan KodeT"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tarif : ','Tarif',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Tarif',set_value('Tarif', isset($default['Tarif']) ? $default['Tarif'] : ''),'id="Tarif" class="form-control" placeholder="Masukkan Tarif"'); ?>
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
            


 