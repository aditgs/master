
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'pmb_jalur/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id" name="id"> 
        
        <div class="form-group">
            <?php echo form_label('gelid : ','gelid',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('gelid',set_value('gelid', isset($default['gelid']) ? $default['gelid'] : ''),'id="gelid" class="form-control" placeholder="Masukkan gelid"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('kodejalur : ','kodejalur',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kodejalur',set_value('kodejalur', isset($default['kodejalur']) ? $default['kodejalur'] : ''),'id="kodejalur" class="form-control" placeholder="Masukkan kodejalur"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('kodetarifdaftar : ','kodetarifdaftar',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kodetarifdaftar',set_value('kodetarifdaftar', isset($default['kodetarifdaftar']) ? $default['kodetarifdaftar'] : ''),'id="kodetarifdaftar" class="form-control" placeholder="Masukkan kodetarifdaftar"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('syaratketentuan : ','syaratketentuan',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('syaratketentuan',set_value('syaratketentuan', isset($default['syaratketentuan']) ? $default['syaratketentuan'] : ''),'id="syaratketentuan" class="form-control" placeholder="Masukkan syaratketentuan"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('file : ','file',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('file',set_value('file', isset($default['file']) ? $default['file'] : ''),'id="file" class="form-control" placeholder="Masukkan file"'); ?>
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
