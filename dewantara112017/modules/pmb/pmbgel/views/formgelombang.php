<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'pmb_gelombang/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <h2>Informasi Gelombang</h2>
        <input type="hidden" value='' id="id" name="id">
       
        <div class="row gutter5">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                 <div class="form-group">
                    <?php echo form_label('Kode: ','kodegel',array('class'=>'control-label')); ?>
                    <div class="controls">
                        <?php echo form_input('kodegel',set_value('kodegel', isset($default['kodegel']) ? $default['kodegel'] : ''),'id="kodegel" class="form-control text-center" placeholder="AUTO" readonly disabled'); ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <div class="form-group">
                    <?php echo form_label('Nama Gelombang : ','keterangan',array('class'=>'control-label')); ?>
                    <div class="controls">
                        <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan Nama Gelombang"'); ?>
                    </div>
                </div>
            </div>
            
        </div>
         <div class="form-group">
                <?php echo form_label('Kode Biaya Pendaftaran : ','kodetarifdaftar',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo form_input('kodetarifdaftar',set_value('kodetarifdaftar', isset($default['kodetarifdaftar']) ? $default['kodetarifdaftar'] : ''),'id="kodetarifdaftar" class="form-control" placeholder="Masukkan kodetarifdaftar"'); ?>
                </div>
            </div>
        <div class="row gutter5">
            <div class="col-sm-6 col-sm-6 col-md-6 col-md-6">
                <div class="form-group">
                    <?php echo form_label('Tanggal Mulai : ','date_start',array('class'=>'control-label')); ?>
                    <div class="input-daterange input-group controls" id="datepicker">
                        <?php if (!empty($default['date_start'])): ?>
                        <input id="date_start" value="<?php echo $default['date_start']; ?>" type="text" onchange="" class="input-md form-control" name="date_start" required />
                        <?php else: ?>
                        <input id="date_start" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="date_start" required />
                        <?php endif; ?>
                        <span class="input-group-btn">
                                    <a href="#" class="btn btn-default disabled" type="button"><i class="fa fa-calendar"></i></a></span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-sm-6 col-md-6 col-md-6">
                <div class="form-group">
                    <?php echo form_label('Tanggal Berakhir : ','date_end',array('class'=>'control-label')); ?>
                    <div class="input-daterange input-group controls" id="datepicker">
                        <?php if (!empty($default['date_end'])): ?>
                        <input id="date_end" value="<?php echo $default['date_end']; ?>" type="text" onchange="" class="input-md form-control" name="date_end" required />
                        <?php else: ?>
                        <input id="date_end" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="date_end" required />
                        <?php endif; ?>
                        <span class="input-group-btn">
                                            <a href="#" class="btn btn-default disabled" type="button"><i class="fa fa-calendar"></i></a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row gutter5"> -->
        <div class="col-sm-12 col-sm-12 col-md-6 col-md-6">
            <h2>Waktu</h2>
            <div class="row gutter5">
            <div class="col-sm-6 col-sm-6 col-md-6 col-md-6">
                <div class="form-group">
                    <?php echo form_label('Tanggal Mulai Seleksi : ','date_seleksi_start',array('class'=>'control-label')); ?>
                    <div class="input-daterange input-group controls" id="datepicker">
                        <?php if (!empty($default['date_seleksi_start'])): ?>
                        <input id="date_seleksi_start" value="<?php echo $default['date_seleksi_start']; ?>" type="text" onchange="" class="input-md form-control" name="date_seleksi_start" required />
                        <?php else: ?>
                        <input id="date_seleksi_start" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="date_seleksi_start" required />
                        <?php endif; ?>
                        <span class="input-group-btn"><a href="#" class="btn btn-default disabled" type="button"><i class="fa fa-calendar"></i></a></span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-sm-6 col-md-6 col-md-6">
                <div class="form-group">
                    <?php echo form_label('Tanggal Berakhir Seleksi : ','date_seleksi_end',array('class'=>'control-label')); ?>
                    <div class="input-daterange input-group controls" id="datepicker">
                        <?php if (!empty($default['date_seleksi_end'])): ?>
                        <input id="date_seleksi_end" value="<?php echo $default['date_seleksi_end']; ?>" type="text" onchange="" class="input-md form-control" name="date_seleksi_end" required />
                        <?php else: ?>
                        <input id="date_seleksi_end" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="date_seleksi_end" required />
                        <?php endif; ?>
                        <span class="input-group-btn">
                            <a href="#" class="btn btn-default disabled" type="button"><i class="fa fa-calendar"></i></a></span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-sm-6 col-md-6 col-md-6">
                <div class="form-group">
                    <?php echo form_label('Tanggal Mulai Her Registrasi : ','date_her_start',array('class'=>'control-label')); ?>
                    <div class="input-daterange input-group controls">
                        <?php if (!empty($default['date_her_start'])): ?>
                        <input id="date_her_start" value="<?php echo $default['date_her_start']; ?>" type="text" onchange="" class="input-md form-control" name="date_her_start" required />
                        <?php else: ?>
                        <input id="date_her_start" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="date_her_start" required />
                        <?php endif; ?>
                        <span class="input-group-btn">
                            <a href="#" class="btn btn-default disabled" type="button"><i class="fa fa-calendar"></i></a></span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-sm-6 col-md-6 col-md-6">
                <div class="form-group">
                    <?php echo form_label('Tanggal Akhir Her Registrasi : ','date_her_end',array('class'=>'control-label')); ?>
                    <div class="input-daterange input-group controls">
                        <?php if (!empty($default['date_her_end'])): ?>
                        <input id="date_her_end" value="<?php echo $default['date_her_end']; ?>" type="text" onchange="" class="input-md form-control" name="date_her_end" required />
                        <?php else: ?>
                        <input id="date_her_end" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="date_her_end" required />
                        <?php endif; ?>
                        <span class="input-group-btn">
                                                                            <a href="#" class="btn btn-default disabled" type="button"><i class="fa fa-calendar"></i></a></span>
                    </div>
                </div>
            </div>
</div>
            <div class="row gutter5">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    
                
                    <div class="form-group">
                        <?php echo form_label('Tanggal Pengumuman ','date_pengumuman',array('class'=>'control-label')); ?>
                        <div class="input-daterange input-group controls" id="datepicker">
                            <?php if (!empty($default['date_pengumuman'])): ?>
                            <input id="date_pengumuman" value="<?php echo $default['date_pengumuman']; ?>" type="text" onchange="" class="input-md form-control" name="date_pengumuman" required />
                            <?php else: ?>
                            <input id="date_pengumuman" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="date_pengumuman" required />
                            <?php endif; ?>
                            <span class="input-group-btn">
                                <a href="#" class="btn btn-default disabled" type="button"><i class="fa fa-calendar"></i></a></span>
                        </div>
                    </div>
                </div>  
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <?php $opt_th_akad = array('2018' => '2018',
                    '2019' => '2019',
                    '2020' => '2020',
                    '2021' => '2021',
                    '2022' => '2022',
                    '2023' => '2023',
                    '2024' => '2024',
                    '2025' => '2025', );  ?>
                        <div class="form-group">
                            <label class="control-label">
                                Tahun Akademik
                            </label>
                            <div class="controls input-group">
                                <?php $th_akad = isset($default['th_akad'])? $default['th_akad'] : '0'; ?>
                                <?php echo form_dropdown('th_akad',$opt_th_akad,$th_akad,'id="th_akad" class="rekening input-block form-control select2 " style="width:100%" placeholder="Tahun Akademik"'); ?>
                            </div>
                        </div>
                </div>
            </div>  
        </div>
    <!-- </div> -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button id="save" type="submit" class="btn btn-lg btn-success">
            <icon class="fa fa-floppy-o"></icon> Simpan</button>
        <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;">
            <icon class="fa fa-refresh"></icon> Perbaiki</button>
        <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
    </div>
    <?php echo form_close();?>
</div>