 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'rekeningmhs/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('Kode : ','kode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode',set_value('kode', isset($default['kode']) ? $default['kode'] : ''),'id="kode" class="form-control" placeholder="Masukkan kode"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Kode mahasiswa : ','kodemhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kodemhs',set_value('kodemhs', isset($default['kodemhs']) ? $default['kodemhs'] : ''),'id="kodemhs" class="form-control" placeholder="Masukkan kode mahasiswa"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Kode jurnal : ','kodejurnal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kodejurnal',set_value('kodejurnal', isset($default['kodejurnal']) ? $default['kodejurnal'] : ''),'id="kodejurnal" class="form-control" placeholder="Masukkan kode jurnal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tanggal : ','tanggal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tanggal',set_value('tanggal', isset($default['tanggal']) ? $default['tanggal'] : ''),'id="tanggal" class="form-control" placeholder="Masukkan tanggal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Saldo awal : ','saldoawal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('saldoawal',set_value('saldoawal', isset($default['saldoawal']) ? $default['saldoawal'] : ''),'id="saldoawal" class="form-control" placeholder="Masukkan saldo awal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Debet : ','debet',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('debet',set_value('debet', isset($default['debet']) ? $default['debet'] : ''),'id="debet" class="form-control" placeholder="Masukkan debet"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Kredit : ','kredit',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kredit',set_value('kredit', isset($default['kredit']) ? $default['kredit'] : ''),'id="kredit" class="form-control" placeholder="Masukkan kredit"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Saldo : ','saldo',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('saldo',set_value('saldo', isset($default['saldo']) ? $default['saldo'] : ''),'id="saldo" class="form-control" placeholder="Masukkan saldo"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Active : ','isactive',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('isactive',set_value('isactive', isset($default['isactive']) ? $default['isactive'] : ''),'id="isactive" class="form-control" placeholder="Masukkan active"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Terhapus : ','isdeleted',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('isdeleted',set_value('isdeleted', isset($default['isdeleted']) ? $default['isdeleted'] : ''),'id="isdeleted" class="form-control" placeholder="Masukkan terhapus"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tanggal hapus : ','datedeleted',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('datedeleted',set_value('datedeleted', isset($default['datedeleted']) ? $default['datedeleted'] : ''),'id="datedeleted" class="form-control" placeholder="Masukkan tangal hapus"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Userid : ','userid',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('userid',set_value('userid', isset($default['userid']) ? $default['userid'] : ''),'id="userid" class="form-control" placeholder="Masukkan userid"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Waktu : ','datetime',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('datetime',set_value('datetime', isset($default['datetime']) ? $default['datetime'] : ''),'id="datetime" class="form-control" placeholder="Masukkan waktu"'); ?>
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
            


 