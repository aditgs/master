<style type="text/css">
    .datepicker{
        z-index: 2200 !important;
    }
    span.select2-container.select2-container--bootstrap.input-md.select2-container--open{
        z-index: 2200 !important;

    }
 
</style>
<script type="text/javascript">
    
    
  function checkForm(form)
  {
    //
    // validate form fields
    //

    form.myButton.disabled = true;
    return true;
  }

</script>
<!-- Rounded switch -->



<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'tagihanmhs/submit',array('id'=>'addform','role'=>'form','class'=>'form','onsubmit="checkForm(this)"')); ?>
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
        <div class="form-group">
            <label class="control-label">
                Nama Mahasiswa
            </label>
            <div class="controls input-group">
                <?php $mhs = isset($default['mhs'])? $default['mhs'] : '0';  ?>
                <?php echo form_dropdown('mhs',$opt_mhs,$mhs,'id="mhs" class="rekening input-lg form-control select2 input-md" style="width:100%" placeholder="Mahasiswa"'); ?>
                
                <!--  <span class="input-group-btn">
                                                        <a class="cekvendor btn btn-primary" data-toggle="modal" href='#modal-bon'><i class="fa fa-refresh"></i></a>
                                                    </span> -->
            </div>
            
        </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            
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
        <div class="form-group tgltempo">
            <?php echo form_label('Tanggal Tempo: ','tgltempo',array('class'=>'control-label')); ?>
            <div class="input-daterange input-group controls" id="datepicker">
                <?php if(!empty($default['tgltempo'])): //print_r($default);?>
                <?php //rint_r($default); ?>
                <input id="tgltempo" value="<?php echo $default['tgltempo']; ?>" type="text" onchange="" class="input-md form-control" name="tgltempo" required />
                <?php else: ?>
                <input id="tgltempo" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="tgltempo" required />
                <?php endif; ?>
                <span class="input-group-btn">
                                                <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                              </span>
            </div>
        </div>
        
       
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        
        <div class="form-group">
            <label class="control-label">
                 Paket Tagihan
            </label>
            <div class="controls input-group">
                <?php $multipaket = isset($default['multipaket'])? $default['multipaket'] : '0';  ?>
                <?php echo form_dropdown('multipaket[]',$opt_paket,$multipaket,'id="paket" class="rekening input-lg form-control select2 input-md" style="width:100%;" multiple="multiple" placeholder="Multi Paket"'); ?>
                
                <!--  <span class="input-group-btn">
                                                        <a class="cekvendor btn btn-primary" data-toggle="modal" href='#modal-bon'><i class="fa fa-refresh"></i></a>
                                                    </span> -->
            </div>
            
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button id="save" name="myButton" type="submit" class="btn btn-lg btn-success">
            <icon class="fa fa-floppy-o"></icon> Simpan</button>
        <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;">
            <icon class="fa fa-refresh"></icon> Perbaiki</button>
        <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
    </div>
    <?php echo form_close();?>
</div>

