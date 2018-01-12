<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'tarif/submit_settarif',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
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
            <?php echo form_label('Jenis Tarif: ','jenis',array('class'=>'control-label')); ?>
        
                <div class="controls">
                    <?php //print_r($opt_supplier) ?>
                    <?php $jenis = isset($default['jenis'])? $default['jenis'] : '0';  ?>
                    <?php echo form_dropdown('jenis',$opt_jenis,$jenis,'id="jenis" class="form-control select2" placeholder="Supplier"'); ?>
                </div>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group sp-dropdown">
            <?php echo form_label('Kelompok Kelas: ','kelompok',array('class'=>'control-label')); ?>
        
                <div class="controls">
                    <?php //print_r($opt_supplier) ?>
                    <?php $kelompok = isset($default['kelompok'])? $default['kelompok'] : '0';  ?>
                    <?php echo form_dropdown('kelompok',$opt_kelompok,$kelompok,'id="kelompok" class="form-control select2" placeholder="Kelompok"'); ?>
                </div>
        
        </div>
        <div class="form-group sp-dropdown">
            <?php echo form_label('Tahun: ','kelompok',array('class'=>'control-label')); ?>
             
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
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group">
            <?php echo form_label('Nominal Tarif : ','Tarif',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('Tarif',set_value('Tarif', isset($default['Tarif']) ? $default['Tarif'] : ''),'id="tarif" style="font-size:24px" class="form-control input-lg text-right" placeholder="Rp"'); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group">
            <?php echo form_label('Keterangan : ','keterangan',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="tarif" disabled class="disable form-control input-lg text-center" placeholder="Keterangan"'); ?>
            </div>
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