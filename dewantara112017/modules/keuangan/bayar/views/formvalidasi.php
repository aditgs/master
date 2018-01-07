
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'bayar/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id" name="id"> 
        
        <div class="form-group">
            <?php echo form_label('kode : ','kode',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode',set_value('kode', isset($default['kode']) ? $default['kode'] : ''),'id="kode" class="form-control" placeholder="Masukkan kode"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('invoice : ','invoice',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('invoice',set_value('invoice', isset($default['invoice']) ? $default['invoice'] : ''),'id="invoice" class="form-control" placeholder="Masukkan invoice"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('itembayar : ','itembayar',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('itembayar',set_value('itembayar', isset($default['itembayar']) ? $default['itembayar'] : ''),'id="itembayar" class="form-control" placeholder="Masukkan itembayar"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('tanggal : ','tanggal',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('tanggal',set_value('tanggal', isset($default['tanggal']) ? $default['tanggal'] : ''),'id="tanggal" class="form-control" placeholder="Masukkan tanggal"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('bank : ','bank',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('bank',set_value('bank', isset($default['bank']) ? $default['bank'] : ''),'id="bank" class="form-control" placeholder="Masukkan bank"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('refbank : ','refbank',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('refbank',set_value('refbank', isset($default['refbank']) ? $default['refbank'] : ''),'id="refbank" class="form-control" placeholder="Masukkan refbank"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('tglbank : ','tglbank',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('tglbank',set_value('tglbank', isset($default['tglbank']) ? $default['tglbank'] : ''),'id="tglbank" class="form-control" placeholder="Masukkan tglbank"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('totalbayar : ','totalbayar',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('totalbayar',set_value('totalbayar', isset($default['totalbayar']) ? $default['totalbayar'] : ''),'id="totalbayar" class="form-control" placeholder="Masukkan totalbayar"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('sisabayar : ','sisabayar',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('sisabayar',set_value('sisabayar', isset($default['sisabayar']) ? $default['sisabayar'] : ''),'id="sisabayar" class="form-control" placeholder="Masukkan sisabayar"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('totaltagihan : ','totaltagihan',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('totaltagihan',set_value('totaltagihan', isset($default['totaltagihan']) ? $default['totaltagihan'] : ''),'id="totaltagihan" class="form-control" placeholder="Masukkan totaltagihan"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('sisatagihan : ','sisatagihan',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('sisatagihan',set_value('sisatagihan', isset($default['sisatagihan']) ? $default['sisatagihan'] : ''),'id="sisatagihan" class="form-control" placeholder="Masukkan sisatagihan"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('isvalidasi : ','isvalidasi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('isvalidasi',set_value('isvalidasi', isset($default['isvalidasi']) ? $default['isvalidasi'] : ''),'id="isvalidasi" class="form-control" placeholder="Masukkan isvalidasi"'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo form_label('tglvalidasi : ','tglvalidasi',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('tglvalidasi',set_value('tglvalidasi', isset($default['tglvalidasi']) ? $default['tglvalidasi'] : ''),'id="tglvalidasi" class="form-control" placeholder="Masukkan tglvalidasi"'); ?>
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
