
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'kelompokmhs/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id" name="id"> 
        
        <div class="form-group">
            <?php echo form_label('Kodek : ','Kodek',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('Kodek',set_value('Kodek', isset($default['Kodek']) ? $default['Kodek'] : ''),'id="Kodek" class="form-control" placeholder="Masukkan Kodek"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Kelompok : ','Kelompok',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('Kelompok',set_value('Kelompok', isset($default['Kelompok']) ? $default['Kelompok'] : ''),'id="Kelompok" class="form-control" placeholder="Masukkan Kelompok"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('t2013 : ','t2013',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('t2013',set_value('t2013', isset($default['t2013']) ? $default['t2013'] : ''),'id="t2013" class="form-control" placeholder="Masukkan t2013"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('t2014 : ','t2014',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('t2014',set_value('t2014', isset($default['t2014']) ? $default['t2014'] : ''),'id="t2014" class="form-control" placeholder="Masukkan t2014"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('t2015 : ','t2015',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('t2015',set_value('t2015', isset($default['t2015']) ? $default['t2015'] : ''),'id="t2015" class="form-control" placeholder="Masukkan t2015"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('a : ','a',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('a',set_value('a', isset($default['a']) ? $default['a'] : ''),'id="a" class="form-control" placeholder="Masukkan a"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('b : ','b',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('b',set_value('b', isset($default['b']) ? $default['b'] : ''),'id="b" class="form-control" placeholder="Masukkan b"'); ?>
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
