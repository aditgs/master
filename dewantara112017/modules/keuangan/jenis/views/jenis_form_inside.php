<div id="form_input" class="">
    <?php echo form_open(base_url().'jenis/submit',array('id'=>'addjenis','role'=>'form','class'=>'form')); ?>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <input type="text" value='' id="id" name="id">
        <div class="form-group">
            <?php echo form_label('KodeJ : ','KodeJ',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('KodeJ',set_value('KodeJ', isset($default['KodeJ']) ? $default['KodeJ'] : ''),'id="KodeJ" class="form-control" placeholder="AUTO" disabled'); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="form-group">
            <?php echo form_label('Jenis : ','Jenis',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('Jenis',set_value('Jenis', isset($default['Jenis']) ? $default['Jenis'] : ''),'id="Jenis" class="form-control" placeholder="Masukkan Jenis"'); ?>
            </div>
        </div>
    </div>

    <?php $opt_prodi=array(
        '0'=>'-- Pilih Prodi --',
        'manajemen'=>'S1 Manajemen',
        'akuntansi'=>'S1 Akuntansi',
        'semua'=>'-- Semua Prodi --',
        ); ?>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        
        <div class="form-group">
            <label class="control-label">
                Program Studi
            </label>
            <div class="controls">
                <?php $prodi = isset($default['prodi'])? $default['prodi'] : '0';  ?>
                <?php echo form_dropdown('prodi',$opt_prodi,$prodi,'id="prodi" class="rekening input-lg form-control select2 " style="width:100%" placeholder="Mahasiswa"'); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        
    <div class="form-group">
        <label class="control-label">
            Induk Jenis
        </label>
        <div class="controls">
            <?php $parent = isset($default['parent'])? $default['parent'] : '0';  ?>
            <?php echo form_dropdown('parent',$opt_parent,$parent,'id="parent" class="rekening input-lg form-control select2 input-md" style="width:100%" placeholder="Mahasiswa"'); ?>
        </div>
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <div class="checkbox i-checks">
            <label style="padding-left: 0px"> <input type="checkbox" value="1" name="iscicilan" id="iscicilan"> <i></i> Cicilan </label>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <div class="checkbox i-checks">
            <label style="padding-left: 0px"> <input type="checkbox" value="1" name="ispmb" id="ispmb"> <i></i> Registrasi </label>
        </div>
    </div> 
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <div class="checkbox i-checks">
            <label style="padding-left: 0px"> <input type="checkbox" value="1" name="ishereg" id="ishereg"> <i></i> Daftar Ulang </label>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button id="save" type="submit" class="btn btn-lg btn-success">
            <icon class="fa fa-floppy-o"></icon> Simpan</button>
        <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;">
            <icon class="fa fa-refresh"></icon> Koreksi</button>
        <a href="#" id="cancel_edit" data-dismiss="modal" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
    </div>
    <?php echo form_close();?>
</div>