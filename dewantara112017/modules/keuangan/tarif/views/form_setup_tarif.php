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
        <div class="row no-gutter genjenis">
            <h3>Jenis Pembayaran</h3>
            <?php if(isset($jenis)):
                if(!empty($jenis)||$jenis!=null){

                    foreach ($jenis as $key => $value) {?>
                         <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                
                                <div class="controls">
                                    <?php echo form_input('KodeT[]',set_value('KodeT', isset($default['KodeT']) ? $default['KodeT'] : ''),'id="KodeT" style="" data-tarif="'.$value['KodeJ'].'" class="form-control input-md text-center kodetarif" placeholder="'.$value['KodeJ'].'" readonly'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                             <div class="form-group">
                                
                                <div class="controls form-control input-md noborder">
                                    <?= "(".$value['KodeJ'] .") ".$value['Jenis'] ?>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                            <div class="form-group">
                                
                                <div class="controls">
                                    <?php echo form_input('Tarif[]',set_value('Tarif', isset($default['Tarif']) ? $default['Tarif'] : ''),'id="Tarif" style="" class="form-control input-md text-right nilaitarif" placeholder="Rp"'); ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                }
                ?>
            <?php else:?>
            <?php endif;?>

        </div>


        
   
        
    </div>
   
    <?php if(isset($default)){
        print_r($default);
    } ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button id="save" type="submit" class="btn btn-lg btn-success">
            <icon class="fa fa-floppy-o"></icon> Simpan</button>
        <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;">
            <icon class="fa fa-refresh"></icon> Koreksi</button>
        <button id="reset" type="reset" class="btn btn-lg btn-info">
            <icon class="fa fa-refresh"></icon> Reset</button>
        <button id="cancel_edit" data-dismiss="modal" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</button>
    </div>
    <?php echo form_close();?>
</div>