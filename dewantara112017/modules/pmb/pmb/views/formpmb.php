
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'pmb/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
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
            <?php echo form_label('th_akad : ','th_akad',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('th_akad',set_value('th_akad', isset($default['th_akad']) ? $default['th_akad'] : ''),'id="th_akad" class="form-control" placeholder="Masukkan th_akad"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('kuota : ','kuota',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kuota',set_value('kuota', isset($default['kuota']) ? $default['kuota'] : ''),'id="kuota" class="form-control" placeholder="Masukkan kuota"'); ?>
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
