 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'tagihanbayar_detail/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('kode : ','kode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode',set_value('kode', isset($default['kode']) ? $default['kode'] : ''),'id="kode" class="form-control" placeholder="Masukkan kode"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('invoice : ','invoice',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('invoice',set_value('invoice', isset($default['invoice']) ? $default['invoice'] : ''),'id="invoice" class="form-control" placeholder="Masukkan invoice"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('idpaket : ','idpaket',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('idpaket',set_value('idpaket', isset($default['idpaket']) ? $default['idpaket'] : ''),'id="idpaket" class="form-control" placeholder="Masukkan idpaket"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('idtarif : ','idtarif',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('idtarif',set_value('idtarif', isset($default['idtarif']) ? $default['idtarif'] : ''),'id="idtarif" class="form-control" placeholder="Masukkan idtarif"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nominal_tarif : ','nominal_tarif',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nominal_tarif',set_value('nominal_tarif', isset($default['nominal_tarif']) ? $default['nominal_tarif'] : ''),'id="nominal_tarif" class="form-control" placeholder="Masukkan nominal_tarif"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nominal_bayar : ','nominal_bayar',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nominal_bayar',set_value('nominal_bayar', isset($default['nominal_bayar']) ? $default['nominal_bayar'] : ''),'id="nominal_bayar" class="form-control" placeholder="Masukkan nominal_bayar"'); ?>
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
                        
                            <div class="form-group">
                                <?php echo form_label('isactive : ','isactive',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('isactive',set_value('isactive', isset($default['isactive']) ? $default['isactive'] : ''),'id="isactive" class="form-control" placeholder="Masukkan isactive"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('islocked : ','islocked',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('islocked',set_value('islocked', isset($default['islocked']) ? $default['islocked'] : ''),'id="islocked" class="form-control" placeholder="Masukkan islocked"'); ?>
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
                                <?php echo form_label('userid : ','userid',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('userid',set_value('userid', isset($default['userid']) ? $default['userid'] : ''),'id="userid" class="form-control" placeholder="Masukkan userid"'); ?>
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
            


 