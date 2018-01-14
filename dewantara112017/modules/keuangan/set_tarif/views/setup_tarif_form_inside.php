
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'set_tarif/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id" name="id"> 
        
        <div class="form-group">
            <?php echo form_label('angktn : ','angktn',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('angktn',set_value('angktn', isset($default['angktn']) ? $default['angktn'] : ''),'id="angktn" class="form-control" placeholder="Masukkan angktn"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('prodi : ','prodi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('prodi',set_value('prodi', isset($default['prodi']) ? $default['prodi'] : ''),'id="prodi" class="form-control" placeholder="Masukkan prodi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('idprodi : ','idprodi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('idprodi',set_value('idprodi', isset($default['idprodi']) ? $default['idprodi'] : ''),'id="idprodi" class="form-control" placeholder="Masukkan idprodi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('idkel : ','idkel',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('idkel',set_value('idkel', isset($default['idkel']) ? $default['idkel'] : ''),'id="idkel" class="form-control" placeholder="Masukkan idkel"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('thn : ','thn',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('thn',set_value('thn', isset($default['thn']) ? $default['thn'] : ''),'id="thn" class="form-control" placeholder="Masukkan thn"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('smster : ','smster',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('smster',set_value('smster', isset($default['smster']) ? $default['smster'] : ''),'id="smster" class="form-control" placeholder="Masukkan smster"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('kodetarif : ','kodetarif',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kodetarif',set_value('kodetarif', isset($default['kodetarif']) ? $default['kodetarif'] : ''),'id="kodetarif" class="form-control" placeholder="Masukkan kodetarif"'); ?>
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
