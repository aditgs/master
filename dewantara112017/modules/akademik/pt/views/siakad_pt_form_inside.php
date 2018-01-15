 

                    <div id="form_input" class="row">
                    <?php echo form_open(base_url().'pt/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            
                            <div class="form-group">
                                <?php echo form_label('Kode Perguruan Tinggi : ','kode_pt',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode_pt',set_value('kode_pt', isset($default['kode_pt']) ? $default['kode_pt'] : ''),'id="kode_pt" class="form-control" placeholder="Masukkan nama Perguruan tinggi"'); ?>
                                </div>
                            </div>
                             <div class="form-group">
                                <?php echo form_label('Nama Perguruan Tinggi : ','nm_pt',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nm_pt',set_value('nm_pt', isset($default['nm_pt']) ? $default['nm_pt'] : ''),'id="nm_pt" class="form-control" placeholder="Masukkan nama Perguruan tinggi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tanggal Perguruan Tinggi : ','tgl_pt',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_pt',set_value('tgl_pt', isset($default['tgl_pt']) ? $default['tgl_pt'] : ''),'id="tgl_pt" class="form-control" placeholder="Masukkan tanggal perguruan tinggi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('SK Perguruan Tinggi : ','sk_pt',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('sk_pt',set_value('sk_pt', isset($default['sk_pt']) ? $default['sk_pt'] : ''),'id="sk_pt" class="form-control" placeholder="Masukkan sk perguruan tinggi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tanggal SK Perguruan Tinggi : ','tgl_sk_pt',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_sk_pt',set_value('tgl_sk_pt', isset($default['tgl_sk_pt']) ? $default['tgl_sk_pt'] : ''),'id="tgl_sk_pt" class="form-control" placeholder="Masukkan tanggal sk perguruan tinggi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Alamat Perguruan Tinggi : ','almt_pt',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('almt_pt',set_value('almt_pt', isset($default['almt_pt']) ? $default['almt_pt'] : ''),'id="almt_pt" class="form-control" placeholder="Masukkan alamat perguruan tinggi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Kota Perguruan Tinggi : ','kota_pt',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kota_pt',set_value('kota_pt', isset($default['kota_pt']) ? $default['kota_pt'] : ''),'id="kota_pt" class="form-control" placeholder="Masukkan kota perguruan tinggi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Kodepos Perguruan Tinggi : ','kodepos_pt',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kodepos_pt',set_value('kodepos_pt', isset($default['kodepos_pt']) ? $default['kodepos_pt'] : ''),'id="kodepos_pt" class="form-control" placeholder="Masukkan kodepos perguruan tinggi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Telp Perguruan Tinggi : ','telp_pt',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('telp_pt',set_value('telp_pt', isset($default['telp_pt']) ? $default['telp_pt'] : ''),'id="telp_pt" class="form-control" placeholder="Masukkan telp perguruan tinggi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Fax Perguruan Tinggi : ','fax_pt',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('fax_pt',set_value('fax_pt', isset($default['fax_pt']) ? $default['fax_pt'] : ''),'id="fax_pt" class="form-control" placeholder="Masukkan fax perguruan tinggi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Email Perguruan Tinggi : ','email_pt',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('email_pt',set_value('email_pt', isset($default['email_pt']) ? $default['email_pt'] : ''),'id="email_pt" class="form-control" placeholder="Masukkan email perguruan tinggi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Web Perguruan Tinggi : ','web_pt',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('web_pt',set_value('web_pt', isset($default['web_pt']) ? $default['web_pt'] : ''),'id="web_pt" class="form-control" placeholder="Masukkan web perguruan tinggi "'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Logo Perguruan Tinggi : ','logo_pt',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('logo_pt',set_value('logo_pt', isset($default['logo_pt']) ? $default['logo_pt'] : ''),'id="logo_pt" class="form-control" placeholder="Masukkan logo perguruan tinggi"'); ?>
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
            


 