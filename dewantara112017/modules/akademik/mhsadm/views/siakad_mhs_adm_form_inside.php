
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'mhsadm/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id" name="id"> 
        
        <div class="form-group">
            <?php echo form_label('NIM : ','nim_mhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nim_mhs',set_value('nim_mhs', isset($default['nim_mhs']) ? $default['nim_mhs'] : ''),'id="nim_mhs" class="form-control" placeholder="Masukkan nim_mhs"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('Kode Akademik : ','kode_akademik',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode_akademik',set_value('kode_akademik', isset($default['kode_akademik']) ? $default['kode_akademik'] : ''),'id="kode_akademik" class="form-control" placeholder="Masukkan kode_akademik"'); ?>
            </div>
        </div>
        
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button id="save" type="submit" class="btn btn-lg btn-success">
            <icon class="fa fa-floppy-o"></icon> Simpan</button>
        <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;">
            <icon class="fa fa-refresh"></icon> Koreksi</button>
        <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
    </div>
    <?php echo form_close();?>
</div>
