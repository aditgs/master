 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'rekeningmhs/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('kode : ','kode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode',set_value('kode', isset($default['kode']) ? $default['kode'] : ''),'id="kode" class="form-control" placeholder="Masukkan kode"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kodemhs : ','kodemhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kodemhs',set_value('kodemhs', isset($default['kodemhs']) ? $default['kodemhs'] : ''),'id="kodemhs" class="form-control" placeholder="Masukkan kodemhs"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kodejurnal : ','kodejurnal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kodejurnal',set_value('kodejurnal', isset($default['kodejurnal']) ? $default['kodejurnal'] : ''),'id="kodejurnal" class="form-control" placeholder="Masukkan kodejurnal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tanggal : ','tanggal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tanggal',set_value('tanggal', isset($default['tanggal']) ? $default['tanggal'] : ''),'id="tanggal" class="form-control" placeholder="Masukkan tanggal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('saldoawal : ','saldoawal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('saldoawal',set_value('saldoawal', isset($default['saldoawal']) ? $default['saldoawal'] : ''),'id="saldoawal" class="form-control" placeholder="Masukkan saldoawal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('debet : ','debet',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('debet',set_value('debet', isset($default['debet']) ? $default['debet'] : ''),'id="debet" class="form-control" placeholder="Masukkan debet"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kredit : ','kredit',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kredit',set_value('kredit', isset($default['kredit']) ? $default['kredit'] : ''),'id="kredit" class="form-control" placeholder="Masukkan kredit"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('saldo : ','saldo',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('saldo',set_value('saldo', isset($default['saldo']) ? $default['saldo'] : ''),'id="saldo" class="form-control" placeholder="Masukkan saldo"'); ?>
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
            


 