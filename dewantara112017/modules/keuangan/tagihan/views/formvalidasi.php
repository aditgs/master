<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'tagihan/validasi/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        
    
    <div class="row gutter5 yellow-bg">
        <div class="col-xs-2 col-sm-2 col-md-6 col-lg-6">
         <div class="form-group">
            <?php echo form_label('kode : ','kode',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('kode',set_value('kode', isset($default['kode']) ? $default['kode'] : ''),'id="kode" class="form-control" readonly placeholder="Masukkan kode"'); ?>
            </div>
        </div>
        
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <input type="hidden" value='' id="id" name="id">
           
            <div class="form-group">
                <?php echo form_label('itembayar : ','itembayar',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo form_input('itembayar',set_value('itembayar', isset($default['itembayar']) ? $default['itembayar'] : ''),'id="itembayar" class="form-control" placeholder="Masukkan itembayar"'); ?>
                </div>
            </div>
         </div>  
           
     </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 ">
        <div class="row gutter5 blue-bg ">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
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
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    
                <div class="form-group">
                    <label class="control-label">
                        Nama Mahasiswa
                    </label>
                    <div class="controls input-group">
                        <?php $mhs = isset($default['mhs'])? $default['mhs'] : '0';  ?>
                        <?php echo form_dropdown('mhs',$opt_mhs,$mhs,'id="mhs" class="rekening input-lg form-control select2 input-lg" style="width:100%" placeholder="Mahasiswa"'); ?>
                    </div>
                </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    
                <div class="form-group">
                    <label class="control-label">
                        Invoice
                    </label>
                    <div class="controls input-group">
                        <?php $inv = isset($default['invoice'])? $default['invoice'] : '0';  ?>
                        <?php echo form_dropdown('invoice',$opt_inv,$inv,'id="invoice" class=" input-lg form-control select2 input-lg" style="width:100%" placeholder="Invoice"'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        
        <div id="datainvoice" class="row table-responsive dt-responsive">
            <?php  $this->load->view('tabeltarif')?>
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