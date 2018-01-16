
<!-- Rounded switch -->
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'tagihan/submit',array('id'=>'addform','role'=>'form','class'=>'form','onsubmit="checkForm(this)"')); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="id" name="id">
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
            <?php echo form_label('Tanggal Validasi: ','tanggal',array('class'=>'control-label')); ?>
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
      
      
    
         
            <div class="form-group tagihan text-right">
                <label>Total Tagihan:</label>
                <div class="total"><input type="text" name="total" id="total" readonly class="text-right input-lg form-control" style="font-size:24px"></div>
                
            </div>
            <div class="form-group password text-center">
                <label>Total Tagihan:</label>
                <div class="password"><input type="text" name="passwd" id="passwd" readonly class="text-right input-lg form-control" style="font-size:24px"></div>
                
            </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <button id="save" name="myButton" type="submit" class="btn btn-lg btn-success">
            <icon class="fa fa-floppy-o"></icon> Simpan</button>
        <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;">
            <icon class="fa fa-refresh"></icon> Perbaiki</button>
        <button id="reset" type="reset" class="btn btn-lg btn-info">
            <icon class="fa fa-refresh"></icon> Reset</button>
        <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
    </div>
    <?php echo form_close();?>
</div>