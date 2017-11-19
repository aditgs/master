<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'penjualan/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <input type="hidden" value='' id="id" name="id">
        <div class="form-group">
            <?php echo form_label('Faktur : ','Faktur',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('Faktur',set_value('Faktur', isset($default['Faktur']) ? $default['Faktur'] : ''),'id="Faktur" class="form-control" placeholder="Masukkan Faktur"'); ?>
            </div>
        </div>
      
        <div class="form-group">
            <?php echo form_label('Tgl : ','Tgl',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('Tgl',set_value('Tgl', isset($default['Tgl']) ? $default['Tgl'] : ''),'id="Tgl" class="form-control" placeholder="Masukkan Tgl"'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo form_label('Jthtmp : ','Jthtmp',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('Jthtmp',set_value('Jthtmp', isset($default['Jthtmp']) ? $default['Jthtmp'] : ''),'id="Jthtmp" class="form-control" placeholder="Masukkan Jthtmp"'); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="form-group">
            <?php echo form_label('Customer : ','Customer',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('Customer',set_value('Customer', isset($default['Customer']) ? $default['Customer'] : ''),'id="Customer" class="form-control" placeholder="Masukkan Customer"'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo form_label('NmCustomer : ','NmCustomer',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('NmCustomer',set_value('NmCustomer', isset($default['NmCustomer']) ? $default['NmCustomer'] : ''),'id="NmCustomer" class="form-control" placeholder="Masukkan NmCustomer"'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo form_label('cAccPiutang : ','cAccPiutang',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('cAccPiutang',set_value('cAccPiutang', isset($default['cAccPiutang']) ? $default['cAccPiutang'] : ''),'id="cAccPiutang" class="form-control" placeholder="Masukkan cAccPiutang"'); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                    <?php echo form_label('Gudang : ','Gudang',array('class'=>'control-label')); ?>
                    <div class="controls">
                        <?php echo form_input('Gudang',set_value('Gudang', isset($default['Gudang']) ? $default['Gudang'] : ''),'id="Gudang" class="form-control" placeholder="Masukkan Gudang"'); ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                         <div class="form-group">
                    <?php echo form_label('Salesman : ','Salesman',array('class'=>'control-label')); ?>
                    <div class="controls">
                        <?php echo form_input('Salesman',set_value('Salesman', isset($default['Salesman']) ? $default['Salesman'] : ''),'id="Salesman" class="form-control" placeholder="Masukkan Salesman"'); ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                    <?php echo form_label('FakturAsli : ','FakturAsli',array('class'=>'control-label')); ?>
                    <div class="controls">
                        <?php echo form_input('FakturAsli',set_value('FakturAsli', isset($default['FakturAsli']) ? $default['FakturAsli'] : ''),'id="FakturAsli" class="form-control" placeholder="Masukkan FakturAsli"'); ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                    <?php echo form_label('cKeterangan : ','cKeterangan',array('class'=>'control-label')); ?>
                    <div class="controls">
                        <?php echo form_input('cKeterangan',set_value('cKeterangan', isset($default['cKeterangan']) ? $default['cKeterangan'] : ''),'id="cKeterangan" class="form-control" placeholder="Masukkan cKeterangan"'); ?>
                    </div>
                </div>
            </div>
        </div>

        
       
          
        
    </div>
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
       
   </div>
   <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
       
   </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="form-group">
            <?php echo form_label('SubTotal : ','SubTotal',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('SubTotal',set_value('SubTotal', isset($default['SubTotal']) ? $default['SubTotal'] : ''),'id="SubTotal" class="form-control" placeholder="Masukkan SubTotal"'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo form_label('Total : ','Total',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('Total',set_value('Total', isset($default['Total']) ? $default['Total'] : ''),'id="Total" class="form-control" placeholder="Masukkan Total"'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo form_label('Tunai : ','Tunai',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('Tunai',set_value('Tunai', isset($default['Tunai']) ? $default['Tunai'] : ''),'id="Tunai" class="form-control" placeholder="Masukkan Tunai"'); ?>
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