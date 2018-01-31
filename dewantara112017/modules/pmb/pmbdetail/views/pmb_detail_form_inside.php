
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'pmb_detail/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id" name="id"> 
        
        <div class="form-group">
            <?php echo form_label('kodepmb : ','kodepmb',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kodepmb',set_value('kodepmb', isset($default['kodepmb']) ? $default['kodepmb'] : ''),'id="kodepmb" class="form-control" placeholder="Masukkan kodepmb"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('gel_id : ','gel_id',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('gel_id',set_value('gel_id', isset($default['gel_id']) ? $default['gel_id'] : ''),'id="gel_id" class="form-control" placeholder="Masukkan gel_id"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('jalur_id : ','jalur_id',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('jalur_id',set_value('jalur_id', isset($default['jalur_id']) ? $default['jalur_id'] : ''),'id="jalur_id" class="form-control" placeholder="Masukkan jalur_id"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('date_start : ','date_start',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('date_start',set_value('date_start', isset($default['date_start']) ? $default['date_start'] : ''),'id="date_start" class="form-control" placeholder="Masukkan date_start"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('date_end : ','date_end',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('date_end',set_value('date_end', isset($default['date_end']) ? $default['date_end'] : ''),'id="date_end" class="form-control" placeholder="Masukkan date_end"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('date_seleksi_start : ','date_seleksi_start',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('date_seleksi_start',set_value('date_seleksi_start', isset($default['date_seleksi_start']) ? $default['date_seleksi_start'] : ''),'id="date_seleksi_start" class="form-control" placeholder="Masukkan date_seleksi_start"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('date_seleksi_end : ','date_seleksi_end',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('date_seleksi_end',set_value('date_seleksi_end', isset($default['date_seleksi_end']) ? $default['date_seleksi_end'] : ''),'id="date_seleksi_end" class="form-control" placeholder="Masukkan date_seleksi_end"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('time_start : ','time_start',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('time_start',set_value('time_start', isset($default['time_start']) ? $default['time_start'] : ''),'id="time_start" class="form-control" placeholder="Masukkan time_start"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('time_end : ','time_end',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('time_end',set_value('time_end', isset($default['time_end']) ? $default['time_end'] : ''),'id="time_end" class="form-control" placeholder="Masukkan time_end"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('pengawas : ','pengawas',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('pengawas',set_value('pengawas', isset($default['pengawas']) ? $default['pengawas'] : ''),'id="pengawas" class="form-control" placeholder="Masukkan pengawas"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('ruang_test : ','ruang_test',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('ruang_test',set_value('ruang_test', isset($default['ruang_test']) ? $default['ruang_test'] : ''),'id="ruang_test" class="form-control" placeholder="Masukkan ruang_test"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('kodetarifdaftar : ','kodetarifdaftar',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kodetarifdaftar',set_value('kodetarifdaftar', isset($default['kodetarifdaftar']) ? $default['kodetarifdaftar'] : ''),'id="kodetarifdaftar" class="form-control" placeholder="Masukkan kodetarifdaftar"'); ?>
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
        <button id="save" type="submit" class="btn btn-lg btn-success">
            <icon class="fa fa-floppy-o"></icon> Simpan</button>
        <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;">
            <icon class="fa fa-refresh"></icon> Perbaiki</button>
        <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
    </div>
    <?php echo form_close();?>
</div>
