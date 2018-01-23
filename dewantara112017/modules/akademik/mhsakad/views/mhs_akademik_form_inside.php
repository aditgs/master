
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'mhs_akademik/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id" name="id"> 
        
        <div class="form-group">
            <?php echo form_label('nim : ','nim',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nim',set_value('nim', isset($default['nim']) ? $default['nim'] : ''),'id="nim" class="form-control" placeholder="Masukkan nim"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('kodepaket : ','kodepaket',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kodepaket',set_value('kodepaket', isset($default['kodepaket']) ? $default['kodepaket'] : ''),'id="kodepaket" class="form-control" placeholder="Masukkan kodepaket"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('tahunakad : ','tahunakad',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('tahunakad',set_value('tahunakad', isset($default['tahunakad']) ? $default['tahunakad'] : ''),'id="tahunakad" class="form-control" placeholder="Masukkan tahunakad"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('isactive : ','isactive',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('isactive',set_value('isactive', isset($default['isactive']) ? $default['isactive'] : ''),'id="isactive" class="form-control" placeholder="Masukkan isactive"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('dateactive : ','dateactive',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('dateactive',set_value('dateactive', isset($default['dateactive']) ? $default['dateactive'] : ''),'id="dateactive" class="form-control" placeholder="Masukkan dateactive"'); ?>
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
