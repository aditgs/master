
<!-- Rounded switch -->
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'tagihan/submit',array('id'=>'addform','role'=>'form','class'=>'form','onsubmit="checkForm(this)"')); ?>
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
            <label class="control-label">
                Tahun
            </label>
            <div class="controls input-group">
                <?php $tahun = isset($default['tahun'])? $default['tahun'] : '0';  ?>
                <?php echo form_dropdown('tahun',$opt_tahun,$tahun,'id="tahun" class="rekening input-lg form-control select2 input-md" style="width:100%" placeholder="Mahasiswa"'); ?>
              
            </div>
        </div>
           <div class="form-group sp-dropdown">
            <?php echo form_label('Kelompok Kelas: ','kelompok',array('class'=>'control-label')); ?>
        
                <div class="controls">
                    <?php //print_r($opt_supplier) ?>
                    <?php $kelompok = isset($default['kelompok'])? $default['kelompok'] : '0';  ?>
                    <?php echo form_dropdown('kelompok',$opt_kelompok,$kelompok,'id="kelompok" class="form-control select2" style="width:100%" placeholder="Kelompok"'); ?>
                </div>
        
        </div>
        <div class="form-group">
            <div class="controls input-group">
            <?php echo form_label('Semester : ','semester',array('class'=>'control-label')); ?>
                <select name="semester" id="kdsmster" class="input-lg form-control select2" style="width:100%">
                    <option value="1">Ganjil</option>
                    <option value="2">Genap</option>
                </select>
            </div>
        </div>
      
    </div>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                <label>Total Tagihan:</label>
                <div class="total"><input type="text" name="total" id="total" readonly class="text-right input-lg form-control" style="font-size:24px"></div>
                
            </div>

        </div>
       <?php $this->load->view('tabeltarif') ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <button id="save" name="myButton" type="submit" class="btn btn-lg btn-success">
            <icon class="fa fa-floppy-o"></icon> Simpan</button>
        <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;">
            <icon class="fa fa-refresh"></icon> Koreksi</button>
        <button id="reset" type="reset" class="btn btn-lg btn-info">
            <icon class="fa fa-refresh"></icon> Reset</button>
        
    </div>
    <?php echo form_close();?>
</div>
<script type="text/javascript">
    $(document).ready(function(){
         
    })
</script>