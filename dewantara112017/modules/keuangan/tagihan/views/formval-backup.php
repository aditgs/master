
<!-- Rounded switch -->
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'tagihan/submitval',array('id'=>'addform','role'=>'form','class'=>'form','onsubmit="checkForm(this)"')); ?>
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
        <div class="form-group tanggal">
            <?php echo form_label('Tanggal Validasi: ','tglvalidasi',array('class'=>'control-label')); ?>
            <div class="input-daterange input-group controls" id="datepicker">
                <?php if(!empty($default['tglvalidasi'])): //print_r($default);?>
                <?php //rint_r($default); ?>
                <input id="tglvalidasi" value="<?php echo $default['tglvalidasi']; ?>" type="text" onchange="" class="input-md form-control" name="tglvalidasi" required />
                <?php else: ?>
                <input id="tglvalidasi" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="tglvalidasi" required />
                <?php endif; ?>
                <span class="input-group-btn">
                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a></span>
            </div>
        </div>
            <div class="form-group tagihan text-right">
                <label>Total Tagihan:</label>
                <div class="total"><input value="<?php echo !empty($default['total'])?($default['total']):0; ?>" type="text" name="total" id="total" readonly class="text-right input-lg form-control" style="font-size:24px"></div>
                
            </div>
            <div class="form-group password text-center">
                <label class="label label-warning label-md">Masukkan Password Anda!</label>
                <div class="password"><input type="text" name="password" id="password" class="text-center input-lg input-warning form-control" style="font-size:24px"></div>
                
            </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <?php (new tagihan)->getmultitem($default['id'],true); ?>
    </div>
 
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 10px">

        <button id="save" name="myButton" type="submit" class="btn btn-block btn-lg btn-warning">
            <icon class="fa fa-check"></icon> Validasi</button>
      
    </div>
    <?php echo form_close();?>
</div>

<script type="text/javascript">
     $("#modal-form").on("shown.bs.modal", function() {
        // $('#modal-form .modal-body #addform #reset').trigger('click');
        
    });
</script>