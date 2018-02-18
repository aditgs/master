    
<!-- Rounded switch -->
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'tagihan/submitval',array('id'=>'valform','role'=>'form','class'=>'form','onsubmit="checkForm(this)"')); ?>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <input type="hidden" value='<?php echo isset($default['id'])?$default['id']:'' ?>' id="id" name="id">
        <div class="form-group">
            <?php echo form_label('Kode Tagihan : ','kode',array('class'=>'control-label')); ?>
            <div class="controls input-group">
                <?php echo form_input('kode',set_value('kode', isset($default['kode']) ? $default['kode'] : ''),'id="kode" class="form-control" readonly placeholder="#Kode Tagihan"'); ?>
                <span class="input-group-btn">
                    <a class="genfaktur btn btn-primary disabled" data-toggle="" href='#'><i class="fa fa-cogs"></i></a>
                </span>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        
        <div class="form-group tanggal">
            <?php echo form_label('Tanggal Validasi: ','tglvalidasi',array('class'=>'control-label')); ?>
            <div class="input-daterange input-group controls" id="datepicker">
                <?php if(!empty($default['tglvalidasi'])): //print_r($default);?>
                <?php //rint_r($default); ?>
                <input id="tglvalidasi" value="<?php echo $default['tglvalidasi']; ?>" type="text" onchange="" class="input-md form-control" disabled name="tglvalidasi" required />
                <?php else: ?>
                <input id="tglvalidasi" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="tglvalidasi" disabled required />
                <?php endif; ?>
                <span class="input-group-btn">
                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a></span>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        
            <div class="form-group tagihan text-right">
                <label>Total Tagihan:</label>
                <div class="total"><input value="<?php echo !empty($default['total'])?($default['total']):0; ?>" type="text" name="total" id="total" readonly class="text-right input-md form-control" style="font-size:24px"></div>
                
            </div>
          
          
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php (new tagihan)->getmultitem($default['id'],true,true); ?>
    </div><?php //print_r($default); ?>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <div class="form-group sisahutang text-right">
                <label>Sisa Hutang</label>
                <div class="sisahutang"><input value="<?php echo !empty($default['sisahutang'])?($default['sisahutang']):0; ?>" type="text" name="sisahutang" id="sisahutang" readonly class="text-right input-lg form-control" style="font-size:24px"></div>
                
            </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <div class="form-group bayar text-right">
                <label>Bayar:</label>
                <div class="bayar"><input value="<?php echo !empty($default['bayar'])?($default['bayar']):0; ?>" type="text" readonly name="bayar" id="bayar" class="text-right input-lg form-control" style="font-size:24px"></div>
                
            </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 10px">
    <?php if(($default['isvalidasi']>0)&&($default['tglvalidasi']!=null)){
        $disabled='disabled';?>

        <div class="btn btn-block btn-lg btn-success">Sudah Divalidasi</div>
    <?php }else{?>
        <button id="saveval" name="myButton" type="submit" class="btn btn-block btn-lg btn-warning" <?php echo isset($disabled)?$disabled:'' ?>>
            <icon class="fa fa-check"></icon> Validasi</button>
    <?php } ?>
      
    </div>
    <?php echo form_close();?>
</div>

