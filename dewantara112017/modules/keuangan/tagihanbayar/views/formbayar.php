<style type="text/css">
    .datepicker{
        z-index: 2200 !important;
    }
    span.select2-container.select2-container--bootstrap.input-md.select2-container--open{
        z-index: 2200 !important;

    }
 
</style>
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'tagihanbayar/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <input type="hidden" value='' id="id" name="id">
        <div class="form-group">
            <?php echo form_label('Kode : ','kode',array('class'=>'control-label')); ?>
            <div class="controls input-group">
                <?php echo form_input('kode',set_value('kode', isset($default['kode']) ? $default['kode'] : ''),'id="kode" class="form-control" readonly placeholder="#Kode Tagihan"'); ?>
                <span class="input-group-btn">
                    <a class="genfaktur btn btn-primary disabled" data-toggle="" href='#'><i class="fa fa-cogs"></i></a>
                </span>
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
                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                </span>
            </div>
        </div>
   
        <div class="form-group">
            <label class="control-label">
                Invoice
            </label>
            <div class="controls input-group">
                <?php $invoice = isset($default['invoice'])? $default['invoice'] : '0';  ?>
                <?php 
                // print_r($opt_invoice);
                echo form_dropdown('invoice',$opt_invoice,$invoice,'id="invoice" class="rekening input-lg form-control select2 input-md" style="width:100%" placeholder="Invoice"'); ?>
                <!--  <span class="input-group-btn">
                                                        <a class="cekvendor btn btn-primary" data-toggle="modal" href='#modal-bon'><i class="fa fa-refresh"></i></a>
                                                    </span> -->
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
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <h3>Pembayaran</h3>
     
        <div class="form-group tglbank">
            <?php echo form_label('Tanggal Bayar: ','tglbank',array('class'=>'control-label')); ?>
            <div class="input-daterange input-group controls" id="datepicker">
                <?php if(!empty($default['tglbank'])): //print_r($default);?>
                <?php //rint_r($default); ?>
                <input id="tglbank" value="<?php echo $default['tglbank']; ?>" type="text" onchange="" class="input-md form-control" name="tglbank" required />
                <?php else: ?>
                <input id="tglbank" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="tglbank" required />
                <?php endif; ?>
                <span class="input-group-btn">
                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                </span>
            </div>
        </div>   
        <div class="form-group">
            <?php echo form_label('Referensi Bank : ','refbank',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('refbank',set_value('refbank', isset($default['refbank']) ? $default['refbank'] : ''),'id="refbank" class="form-control" placeholder="Masukkan refbank"'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo form_label('Total Bayar: ','totalbayar',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('totalbayar',set_value('totalbayar', isset($default['totalbayar']) ? $default['totalbayar'] : ''),'id="totalbayar" class="form-control" placeholder="Masukkan totalbayar"'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo form_label('Sisa Bayar: ','sisabayar',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('sisabayar',set_value('sisabayar', isset($default['sisabayar']) ? $default['sisabayar'] : ''),'id="sisabayar" class="form-control" placeholder="Masukkan sisabayar"'); ?>
            </div>
        </div>
        
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <h3>Detail Pembayaran</h3>
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