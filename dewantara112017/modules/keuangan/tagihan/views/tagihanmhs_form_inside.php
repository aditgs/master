 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'tagihanmhs/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('kode : ','kode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode',set_value('kode', isset($default['kode']) ? $default['kode'] : ''),'id="kode" class="form-control" placeholder="Masukkan kode"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tanggal : ','tanggal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tanggal',set_value('tanggal', isset($default['tanggal']) ? $default['tanggal'] : ''),'id="tanggal" class="form-control" placeholder="Masukkan tanggal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgltempo : ','tgltempo',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgltempo',set_value('tgltempo', isset($default['tgltempo']) ? $default['tgltempo'] : ''),'id="tgltempo" class="form-control" placeholder="Masukkan tgltempo"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('mhs : ','mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('mhs',set_value('mhs', isset($default['mhs']) ? $default['mhs'] : ''),'id="mhs" class="form-control" placeholder="Masukkan mhs"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kodebank : ','kodebank',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kodebank',set_value('kodebank', isset($default['kodebank']) ? $default['kodebank'] : ''),'id="kodebank" class="form-control" placeholder="Masukkan kodebank"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('idpaket : ','idpaket',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('idpaket',set_value('idpaket', isset($default['idpaket']) ? $default['idpaket'] : ''),'id="idpaket" class="form-control" placeholder="Masukkan idpaket"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('status : ','status',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('status',set_value('status', isset($default['status']) ? $default['status'] : ''),'id="status" class="form-control" placeholder="Masukkan status"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('dateopen : ','dateopen',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('dateopen',set_value('dateopen', isset($default['dateopen']) ? $default['dateopen'] : ''),'id="dateopen" class="form-control" placeholder="Masukkan dateopen"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('dateclosed : ','dateclosed',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('dateclosed',set_value('dateclosed', isset($default['dateclosed']) ? $default['dateclosed'] : ''),'id="dateclosed" class="form-control" placeholder="Masukkan dateclosed"'); ?>
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
            


 