<?php //print_r($default); ?>
<!-- Rounded switch -->
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'tagihan/submitcicilan',array('id'=>'cicilform','role'=>'form','class'=>'form','onsubmit="checkForm(this)"')); ?>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <input type="hidden" value='<?php echo isset($default['id'])?$default['id']:'' ?>' id="id" name="id">
        <div class="form-group">
            <?php echo form_label('Kode Tarif  : ','kodetarif',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kodetarif',set_value('kodetarif', isset($default['kodetarif']) ? $default['kodetarif'] : ''),'id="kodetarif" class="form-control text-center" readonly placeholder="AUTO"'); ?>
               
            </div>
        </div>

         <div class="form-group sisahutang text-right">
                <label>Sisa Hutang</label>
                <div class="sisahutang"><input value="<?php echo !empty($default['sisahutang'])?($default['sisahutang']):0; ?>" type="text" name="sisahutang" readonly id="sisahutang" class="text-right input-lg form-control" style="font-size:24px"></div>
                
            </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        
        <div class="form-group">
            <?php echo form_label('Kode Tagihan  : ','kodetagihan',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kodetagihan',set_value('kodetagihan', isset($default['kodetagihan']) ? $default['kodetagihan'] : ''),'id="kodetagihan" class="form-control text-center" readonly placeholder="AUTO"'); ?>
               
            </div>
        </div>
        <div class="form-group">
            <?php echo form_label('NIM  : ','nim',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_hidden('nim',set_value('nim', isset($default['nim']) ? $default['nim'] : ''),'id="nim" class="hidden form-control text-center" readonly placeholder="AUTO"'); ?>
               
            </div>
        </div>
        <div class="form-group tagihan text-right">
                <label>Total Tagihan:</label>
                <div class="total"><input value="<?php echo !empty($default['tarif'])?($default['tarif']):0; ?>" type="text" name="tarif" id="tarif" readonly class="text-right input-lg form-control" style="font-size:24px"></div>
                
            </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        
        
      <div class="form-group">
            <?php echo form_label('Kode Cicilan  : ','kodetarifcicilan',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kodetarifcicilan',set_value('kodetarifcicilan', isset($default['kodetarifcicilan']) ? $default['kodetarifcicilan'] : ''),'id="kodetarifcicilan" class="form-control text-center" readonly placeholder="AUTO"'); ?>
               
            </div>
        </div>
            
            <div class="form-group cicilan text-right">
                <label>Bayar Cicilan:</label>
                <div class="bayar"><input value="<?php echo !empty($default['bayar'])?($default['bayar']):0; ?>" type="text" name="bayar" id="bayar" class="text-right input-lg form-control" style="font-size:24px"></div>
                
            </div> 
           
          
    </div>
  
        <button id="saveval" name="myButton" type="submit" class="btn btn-block btn-lg btn-warning" >
            <icon class="fa fa-check"></icon> Bayar Cicilan</button>
      
    </div>
    <?php echo form_close();?>
</div>

