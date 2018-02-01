
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'pmb_gelombang/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <input type="hidden" value='' id="id" name="id"> 
        <div class="form-group">
            <?php echo form_label('kodegel : ','kodegel',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kodegel',set_value('kodegel', isset($default['kodegel']) ? $default['kodegel'] : ''),'id="kodegel" class="text-center form-control" placeholder="AUTO" readonly disable'); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        
        <div class="form-group">
            <?php echo form_label('Tahun Akademik : ','th_akad',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('th_akad',set_value('th_akad', isset($default['th_akad']) ? $default['th_akad'] : ''),'id="th_akad" class="form-control" placeholder="Tahun Akademik"'); ?>
            </div>
        </div>
        
    </div>  
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          
        
        <div class="form-group">
            <?php echo form_label('Keterangan : ','keterangan',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
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
