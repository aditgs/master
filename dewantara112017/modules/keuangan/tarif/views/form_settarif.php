<div id="form_input" class="row gutter5">
    
    <?php echo form_open(base_url().'tarif/submit_settarif',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <input type="hidden" value='' id="id" name="id">
       
        <div class="form-group sp-dropdown">
            <?php echo form_label('Angkatan ','angkatan',array('class'=>'control-label')); ?>
            <div class="input-group select2-bootstrap-prepend">
                <span class="input-group-btn">
                                                <a class="add_supplier btn btn-default" data-form="supplier" data-toggle="modal" href='#modal-form' data-load-remote="<?php echo base_url('supplier/simple_forms/') ?>" data-remote-target="#modal-form .modal-body"><i class="fa fa-plus"></i></a>
                                            </span>
                <div class="controls">
                    <?php //print_r($opt_supplier) ?>
                    <?php $angkatan = isset($default['angkatan'])? $default['angkatan'] : '0';  ?>
                    <?php echo form_dropdown('angkatan',$opt_angkatan,$angkatan,'id="angkatan" class="form-control select2" placeholder="Angkatan"'); ?>
                </div>
            </div>
        </div>
        <div class="form-group sp-dropdown">
            <?php echo form_label('Program Studi ','prodi',array('class'=>'control-label')); ?>
            <div class="input-group select2-bootstrap-prepend">
                <span class="input-group-btn">
                                                <a class="add_supplier btn btn-default" data-form="supplier" data-toggle="modal" href='#modal-form' data-load-remote="<?php echo base_url('supplier/simple_forms/') ?>" data-remote-target="#modal-form .modal-body"><i class="fa fa-plus"></i></a>
                                            </span>
                <div class="controls">
                    <?php //print_r($opt_supplier) ?>
                    <?php $prodi = isset($default['prodi'])? $default['prodi'] : '0';  ?>
                    <?php echo form_dropdown('prodi',$opt_prodi,$prodi,'id="prodi" class="form-control select2" placeholder="Prodi"'); ?>
                </div>
            </div>
        </div>
        <div class="form-group sp-dropdown">
            <?php echo form_label('Jenis Tarif: ','tarif',array('class'=>'control-label')); ?>
            <div class="input-group select2-bootstrap-prepend">
                <span class="input-group-btn">
                                                <a class="add_supplier btn btn-default" data-form="supplier" data-toggle="modal" href='#modal-form' data-load-remote="<?php echo base_url('supplier/simple_forms/') ?>" data-remote-target="#modal-form .modal-body"><i class="fa fa-plus"></i></a>
                                            </span>
                <div class="controls">
                    <?php //print_r($opt_supplier) ?>
                    <?php $jenis = isset($default['tarif'])? $default['tarif'] : '0';  ?>
                    <?php echo form_dropdown('tarif',$opt_jenis,$jenis,'id="tarif" class="form-control select2" placeholder="Supplier"'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            
        <div class="form-group sp-dropdown">
            <?php echo form_label('Kelompok Kelas: ','kelompok',array('class'=>'control-label')); ?>
            <div class="input-group select2-bootstrap-prepend">
                <span class="input-group-btn">
                                                <a class="add_supplier btn btn-default" data-form="supplier" data-toggle="modal" href='#modal-form' data-load-remote="<?php echo base_url('supplier/simple_forms/') ?>" data-remote-target="#modal-form .modal-body"><i class="fa fa-plus"></i></a>
                                            </span>
                <div class="controls">
                    <?php //print_r($opt_supplier) ?>
                    <?php $kelompok = isset($default['kelompok'])? $default['kelompok'] : '0';  ?>
                    <?php echo form_dropdown('kelompok',$opt_kelompok,$kelompok,'id="kelompok" class="form-control select2" placeholder="Kelompok"'); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?php echo form_label('tahun : ','tahun',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('tahun',set_value('tahun', isset($default['tahun']) ? $default['tahun'] : ''),'id="tahun" class="form-control" placeholder="Masukkan tahun"'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo form_label('semester : ','semester',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('semester',set_value('semester', isset($default['semester']) ? $default['semester'] : ''),'id="semester" class="form-control" placeholder="Masukkan semester"'); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    
        <div class="form-group">
            <?php echo form_label('Nilai Tarif : ','tarif',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('tarif',set_value('tarif', isset($default['tarif']) ? $default['tarif'] : ''),'id="tarif" class="form-control" placeholder="Masukkan tarif"'); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button id="savetarif" type="submit" class="btn btn-lg btn-success">
            <icon class="fa fa-floppy-o"></icon> Simpan</button>
        <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;">
            <icon class="fa fa-refresh"></icon> Perbaiki</button>
        <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
    </div>
    <?php echo form_close();?>
</div>