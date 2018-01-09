 

                    <div id="form_input" class="">

                    <?php echo form_open(base_url().'prodi/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>

                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="kode_prodi" name="kode_prodi">
                            
                            <div class="form-group">

                                <?php echo form_label('Kode PT : ','kode_pt',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode_pt',set_value('kode_pt', isset($default['kode_pt']) ? $default['kode_pt'] : ''),'id="kode_pt" class="form-control" placeholder="Masukkan kode pt"'); ?>

                                </div>
                            </div>
                        
                            <div class="form-group">

                                <?php echo form_label('Kode Prodi Less : ','kode_prodi_less',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode_prodi_less',set_value('kode_prodi_less', isset($default['kode_prodi_less']) ? $default['kode_prodi_less'] : ''),'id="kode_prodi_less" class="form-control" placeholder="Masukkan kode prodi less"'); ?>

                                </div>
                            </div>
                        
                            <div class="form-group">

                                <?php echo form_label('Nama Prodi : ','nm_prodi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nm_prodi',set_value('nm_prodi', isset($default['nm_prodi']) ? $default['nm_prodi'] : ''),'id="nm_prodi" class="form-control" placeholder="Masukkan nama prodi"'); ?>

                                </div>
                            </div>
                        
                            <div class="form-group">

                                <?php echo form_label('Strata Prodi : ','strata_prodi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('strata_prodi',set_value('strata_prodi', isset($default['strata_prodi']) ? $default['strata_prodi'] : ''),'id="strata_prodi" class="form-control" placeholder="Masukkan strata prodi"'); ?>

                                </div>
                            </div>
                        
                            <div class="form-group">

                                <?php echo form_label('Tanggal Prodi : ','tgl_prodi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_prodi',set_value('tgl_prodi', isset($default['tgl_prodi']) ? $default['tgl_prodi'] : ''),'id="tgl_prodi" class="form-control" placeholder="Masukkan tanggal prodi"'); ?>

                                </div>
                            </div>
                        
                            <div class="form-group">

                                <?php echo form_label('SK Prodi : ','sk_prodi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('sk_prodi',set_value('sk_prodi', isset($default['sk_prodi']) ? $default['sk_prodi'] : ''),'id="sk_prodi" class="form-control" placeholder="Masukkan sk prodi"'); ?>

                                </div>
                            </div>
                        
                            <div class="form-group">

                                <?php echo form_label('Tanggal SK Prodi : ','tgl_sk_prodi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_sk_prodi',set_value('tgl_sk_prodi', isset($default['tgl_sk_prodi']) ? $default['tgl_sk_prodi'] : ''),'id="tgl_sk_prodi" class="form-control" placeholder="Masukkan tanggal sk prodi"'); ?>

                                </div>
                            </div>
                        
                            <div class="form-group">

                                <?php echo form_label('SKS Prodi : ','sks_prodi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('sks_prodi',set_value('sks_prodi', isset($default['sks_prodi']) ? $default['sks_prodi'] : ''),'id="sks_prodi" class="form-control" placeholder="Masukkan sks prodi"'); ?>

                                </div>
                            </div>
                        
                            <div class="form-group">

                                <?php echo form_label('Status Prodi : ','status_prodi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('status_prodi',set_value('status_prodi', isset($default['status_prodi']) ? $default['status_prodi'] : ''),'id="status_prodi" class="form-control" placeholder="Masukkan status prodi"'); ?>

                                </div>
                            </div>
                        
                            <div class="form-group">

                                <?php echo form_label('SK BANPT Prodi : ','sk_banpt_prodi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('sk_banpt_prodi',set_value('sk_banpt_prodi', isset($default['sk_banpt_prodi']) ? $default['sk_banpt_prodi'] : ''),'id="sk_banpt_prodi" class="form-control" placeholder="Masukkan sk banpt prodi"'); ?>

                                </div>
                            </div>
                        
                            <div class="form-group">

                                <?php echo form_label('Tahun BANPT Prodi : ','thn_banpt_prodi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('thn_banpt_prodi',set_value('thn_banpt_prodi', isset($default['thn_banpt_prodi']) ? $default['thn_banpt_prodi'] : ''),'id="thn_banpt_prodi" class="form-control" placeholder="Masukkan tahun banpt prodi"'); ?>

                                </div>
                            </div>
                        
                            <div class="form-group">

                                <?php echo form_label('Akreditasi BANPT Prodi : ','akr_banpt_prodi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('akr_banpt_prodi',set_value('akr_banpt_prodi', isset($default['akr_banpt_prodi']) ? $default['akr_banpt_prodi'] : ''),'id="akr_banpt_prodi" class="form-control" placeholder="Masukkan akreditas banpt prodi"'); ?>

                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('ex_banpt_prodi : ','ex_banpt_prodi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('ex_banpt_prodi',set_value('ex_banpt_prodi', isset($default['ex_banpt_prodi']) ? $default['ex_banpt_prodi'] : ''),'id="ex_banpt_prodi" class="form-control" placeholder="Masukkan ex_banpt_prodi"'); ?>
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
            


 