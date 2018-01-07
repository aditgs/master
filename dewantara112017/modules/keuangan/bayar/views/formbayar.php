
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'bayar/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <input type="hidden" value='' id="id" name="id"> 
        
        <div class="form-group">
            <?php echo form_label('kode : ','kode',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode',set_value('kode', isset($default['kode']) ? $default['kode'] : ''),'id="kode" class="form-control" readonly placeholder="Masukkan kode"'); ?>
            </div>
        </div>
         <div class="form-group tanggal">
            <?php echo form_label('Tanggal: ','tanggal',array('class'=>'control-label')); ?>
            <div class="input-daterange input-group controls" id="datepicker">
                <?php if(!empty($default['tanggal'])): //print_r($default);?>
                <?php //rint_r($default); ?>
                <input id="tanggal" value="<?php echo $default['tanggal']; ?>" type="text" onchange="" class="input-md form-control" name="tanggal" required />
                <?php else: ?>
                <input id="tanggal" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="tanggal" required />
                <?php endif; ?>
                <span class="input-group-btn">
                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a></span>
            </div>
        </div>
         <div class="form-group">
            <label class="control-label">
                Nama Mahasiswa
            </label>
            <div class="controls input-group">
                <?php $mhs = isset($default['mhs'])? $default['mhs'] : '0';  ?>
                <?php echo form_dropdown('mhs',$opt_mhs,$mhs,'id="mhs" class="rekening input-lg form-control select2 input-md" style="width:100%" placeholder="Mahasiswa"'); ?>
              
            </div>
        </div>
       
        
        <div class="form-group">
            <?php echo form_label('itembayar : ','itembayar',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('itembayar',set_value('itembayar', isset($default['itembayar']) ? $default['itembayar'] : ''),'id="itembayar" class="form-control" placeholder="Masukkan itembayar"'); ?>
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
        
        
    </div>
    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <div class="form-group">
            <label class="control-label">
                Invoice
            </label>
            <div class="controls input-group">
                <?php $inv = isset($default['invoice'])? $default['invoice'] : '0';  ?>
                <?php echo form_dropdown('invoice',$opt_inv,$inv,'id="invoice" class=" input-lg form-control select2 input-md" style="width:100%" placeholder="Invoice"'); ?>
              
            </div>
        </div>
        <div id="datainvoice">
            <?php  $this->load->view('tabeltarif')?>
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
