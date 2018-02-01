
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'pmb_gelombang/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id" name="id"> 
        
        <div class="form-group">
            <?php echo form_label('pmbid : ','pmbid',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('pmbid',set_value('pmbid', isset($default['pmbid']) ? $default['pmbid'] : ''),'id="pmbid" class="form-control" placeholder="Masukkan pmbid"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('th_akad : ','th_akad',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('th_akad',set_value('th_akad', isset($default['th_akad']) ? $default['th_akad'] : ''),'id="th_akad" class="form-control" placeholder="Masukkan th_akad"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('kodegel : ','kodegel',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kodegel',set_value('kodegel', isset($default['kodegel']) ? $default['kodegel'] : ''),'id="kodegel" class="form-control" placeholder="Masukkan kodegel"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
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
            <?php echo form_label('kodetarifdaftar : ','kodetarifdaftar',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kodetarifdaftar',set_value('kodetarifdaftar', isset($default['kodetarifdaftar']) ? $default['kodetarifdaftar'] : ''),'id="kodetarifdaftar" class="form-control" placeholder="Masukkan kodetarifdaftar"'); ?>
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
            <?php echo form_label('date_her_start : ','date_her_start',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('date_her_start',set_value('date_her_start', isset($default['date_her_start']) ? $default['date_her_start'] : ''),'id="date_her_start" class="form-control" placeholder="Masukkan date_her_start"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('date_her_end : ','date_her_end',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('date_her_end',set_value('date_her_end', isset($default['date_her_end']) ? $default['date_her_end'] : ''),'id="date_her_end" class="form-control" placeholder="Masukkan date_her_end"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('date_pengumuman : ','date_pengumuman',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('date_pengumuman',set_value('date_pengumuman', isset($default['date_pengumuman']) ? $default['date_pengumuman'] : ''),'id="date_pengumuman" class="form-control" placeholder="Masukkan date_pengumuman"'); ?>
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
