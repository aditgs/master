<style type="text/css">
    .row .genjenis > [class*='col-']{
        border-bottom: 1px solid #dddddd;
    }
    .genjenis .form-group{
        margin-bottom: 0px;
    }
    .form-control.noborder{
        border:none;
    }
</style>
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'tarif/setup/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 formtarif">
    <h2>Kriteria</h2>
        <input type="hidden" value='' id="id" name="id">
        <div class="form-group sp-dropdown">
            <?php echo form_label('Angkatan ','angkatan',array('class'=>'control-label')); ?>
          
                <div class="controls">
                    <?php //print_r($opt_supplier) ?>
                    <?php $angkatan = isset($default['angkatan'])? $default['angkatan'] : '0';  ?>
                    <?php echo form_dropdown('angkatan',$opt_angkatan,$angkatan,'id="angkatan" class="form-control select2" placeholder="Angkatan"'); ?>
                </div>
           
        </div>
        <div class="form-group sp-dropdown">
            <?php echo form_label('Program Studi ','prodi',array('class'=>'control-label')); ?>
          
                <div class="controls">
                    <?php //print_r($opt_supplier) ?>
                    <?php $prodi = isset($default['prodi'])? $default['prodi'] : '0';  ?>
                    <?php echo form_dropdown('prodi',$opt_prodi,$prodi,'id="prodi" class="form-control select2" placeholder="Prodi"'); ?>
                </div>
          
        </div>
          <div class="form-group sp-dropdown">
            <?php echo form_label('Kelompok Kelas: ','kelompok',array('class'=>'control-label')); ?>
        
                <div class="controls">
                    <?php //print_r($opt_supplier) ?>
                    <?php $kelompok = isset($default['kelompok'])? $default['kelompok'] : '0';  ?>
                    <?php echo form_dropdown('kelompok',$opt_kelompok,$kelompok,'id="kelompok" class="form-control select2" placeholder="Kelompok"'); ?>
                </div>
        
        </div>
        <div class="form-group sp-dropdown">
            <?php echo form_label('Tahun Akademik: ','kelompok',array('class'=>'control-label')); ?>
             
                <div class="controls">
                    <?php //print_r($opt_supplier) ?>
                    <?php $tahun = isset($default['tahun'])? $default['tahun'] : '0';  ?>
                    <?php echo form_dropdown('tahun',$opt_tahun,$tahun,'id="tahun" class="form-control select2" placeholder="Tahun"'); ?>
                </div>
        </div>
        <div class="form-group">
            <div class="controls">
            <?php echo form_label('Semester : ','semester',array('class'=>'control-label')); ?>
                <div class="checkbox">
                    <div class="radio">
                        <label>
                            <input class="radio ganjil" type="radio" name="semester" id="ganjil" value="1">
                            Ganjil
                        </label>
                        <label>
                            <input class="radio genap" type="radio" name="semester" id="genap" value="2">
                            Genap
                        </label>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        <h2>Jenis Pembayaran</h2>
       <div class=""><?php //$this->load->view('formkodejenis',$jenis) ?></div>
       <div class="genkodejenis"></div>


        
   
        
    </div>
   
    <?php if(isset($default)){
        print_r($default);
    } ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button id="save" type="submit" class="btn btn-lg btn-success">
            <icon class="fa fa-floppy-o"></icon> Simpan</button>
        <button id="reset" type="reset" class="btn btn-lg btn-info">
            <icon class="fa fa-refresh"></icon> Reset</button>
     
    </div>
    <?php echo form_close();?>
</div>