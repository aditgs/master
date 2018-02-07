<div id="form_input" class="row clearfix">
    <?php echo form_open(base_url().'mhspmb/submit',array('id'=>'addform','role'=>'form','class'=>'form','enctype'=>"multipart/form-data")); ?>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <h2>Identitas Pendaftar</h2>
        <input type="hidden" value='' id="id" name="id">
        <div class="form-group">
            <?php echo form_label('No Pendaftaran : ','noreg_pmb',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('noreg_pmb',set_value('noreg_pmb', isset($default['noreg_pmb']) ? $default['noreg_pmb'] : ''),'id="noreg_pmb" class="form-control" placeholder="AUTO" readonly '); ?>
            </div>
        </div>
        <div class="form-group">
            <?php //print_r($opt_gel); ?>
            <?php if(!empty($opt_gel)): ?>
            <?php echo form_label('Gelombang : ','gelid',array('class'=>'control-label')); ?>
            <div class="controls input-group" style="width: 100%">
                <?php $gelid = isset($default['gelid'])? $default['gelid'] : '0';  ?>
                <?php echo form_dropdown('gelid',$opt_gel,$gelid,'id="gelid" class="form-control select2 " style="width:100%" placeholder="Gelombang"'); ?>
            </div>
            <?php else: ?>
            <div class="alert alert-warning">
                <strong><i class="fa fa-warning"></i> Perhatian</strong> Tidak ada Gelombang PMB Aktif
            </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <?php echo form_label('Kode Prodi : ','kode_prodi',array('class'=>'control-label')); ?>
            <?php $opt_prodi = array('61201'=>'S-1 Manajemen','62201'=>'S-1 Akuntansi',);?>
            <div class="controls input-group" style="width: 100%">
                <?php $kode_prodi = isset($default['kode_prodi'])? $default['kode_prodi'] : '0';  ?>
                <?php echo form_dropdown('kode_prodi',$opt_prodi,$kode_prodi,'id="kode_prodi" class="form-control select2 " style="width:100%" placeholder="Prodi" required="true"'); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">
                Kelas
            </label>
            <?php if(!empty($opt_kelas)): ?>
            <div class="controls input-group" style="width: 100%">
                <?php $kelas = isset($default['id_siakad_kelas'])? $default['id_siakad_kelas'] : '0';  ?>
                <?php echo form_dropdown('id_siakad_kelas',$opt_kelas,$kelas,'id="id_siakad_kelas" class="form-control select2 " style="width:100%" placeholder="Agama"'); ?>
            </div>
            <?php else: ?>
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Perhatian</strong> Data Gelombang PMB aktif tidak ditemukan
            </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <?php echo form_label('Nama Lengkap : ','nm_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nm_cmhs',set_value('nm_cmhs', isset($default['nm_cmhs']) ? $default['nm_cmhs'] : ''),'id="nm_cmhs" class="form-control" placeholder="Masukkan Nama" required="trus"'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo form_label('NIK : ','nik_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nik_cmhs',set_value('kodepos_cmhs', isset($default['nik_cmhs']) ? $default['nik_cmhs'] : ''),'id="nik_cmhs" class="form-control" placeholder="Masukkan NIK"'); ?>
            </div>
        </div>
        <div class="row gutter5" style="padding:0px 10px 0px 10px">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <?php echo form_label('Tempat Lahir : ','tmp_cmhs',array('class'=>'control-label')); ?>
                    <div class="controls">
                        <?php echo form_input('tmp_cmhs',set_value('tmp_cmhs', isset($default['tmp_cmhs']) ? $default['tmp_cmhs'] : ''),'id="tmp_cmhs" class="form-control" placeholder="Masukkan Tempat Lahir "'); ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group tanggal">
                    <?php echo form_label('Tanggal Lahir : ','tgl_cmhs',array('class'=>'control-label')); ?>
                    <div class="input-daterange input-group controls" id="datepicker">
                        <?php if (!empty($default['tgl_cmhs'])): ?>
                        <input id="tgl_cmhs" value="<?php echo $default['tgl_cmhs']; ?>" type="text" onchange="" class="input-md form-control" name="tgl_cmhs" required />
                        <?php else: ?>
                        <input id="tgl_cmhs" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="tgl_cmhs" required />
                        <?php endif; ?>
                        <span class="input-group-btn">
                            <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gutter5" style="padding:0px 10px">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <?php $opt_agama_cmhs = array('Islam' => 'Islam',
            'Protestan'=>'Protestan',
            'Katolik'=>'Katolik',
            'Hindu'=>'Hindu',
            'Budha'=>'Budha',
            'Konghucu'=>'Konghucu',);?>
                <div class="form-group">
                    <label class="control-label">
                        Agama
                    </label>
                    <div class="controls input-group" style="width: 100%">
                        <?php $agama_cmhs = isset($default['agama_cmhs'])? $default['agama_cmhs'] : '0';  ?>
                        <?php echo form_dropdown('agama_cmhs',$opt_agama_cmhs,$agama_cmhs,'id="agama_cmhs" class="form-control select2" style="width:100%" placeholder="Agama" required="true"'); ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <div class="controls input-group">
                        <?php echo form_label('Jenis Kelamin : ','kelamin_cmhs',array('class'=>'control-label')); ?>
                        <select name="kelamin_cmhs" id="kelamin_cmhs" class=" form-control select2" style="width: 100%" required>
                            <option value="Laki-laki">Laki - laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <h2>Detail Informasi Pendaftar</h2>
        <div class="form-group">
            <?php echo form_label('Alamat : ','almt_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_textarea('almt_cmhs',set_value('almt_cmhs', isset($default['almt_cmhs']) ? $default['almt_cmhs'] : ''),'id="almt_cmhs" class="form-control" placeholder="Masukkan Alamat" style="height:96px"'); ?>
            </div>
        </div>
        <div class="row gutter5" style="padding:10px 10px 0px 10px">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="form-group">
                    <?php echo form_label('Kota : ','kota_cmhs',array('class'=>'control-label')); ?>
                    <div class="controls">
                        <?php echo form_input('kota_cmhs',set_value('kota_cmhs', isset($default['kota_cmhs']) ? $default['kota_cmhs'] : ''),'id="kota_cmhs" class="form-control" placeholder="Masukkan Kota"'); ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <?php echo form_label('Kodepos : ','kodepos_cmhs',array('class'=>'control-label')); ?>
                    <div class="controls">
                        <?php echo form_input('kodepos_cmhs',set_value('kodepos_cmhs', isset($default['kodepos_cmhs']) ? $default['kodepos_cmhs'] : ''),'id="kodepos_cmhs" class="form-control" placeholder="Masukkan Kodepos"'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?php echo form_label('Email : ','email_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('email_cmhs',set_value('email_cmhs', isset($default['email_cmhs']) ? $default['email_cmhs'] : ''),'id="email_cmhs" class="form-control" placeholder="Masukkan Email"'); ?>
            </div>
        </div>
        <div class="row gutter5" style="padding:0px 10px 0px 10px">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <?php echo form_label('No HP : ','hp_cmhs',array('class'=>'control-label')); ?>
                    <div class="controls">
                        <?php echo form_input('hp_cmhs',set_value('hp_cmhs', isset($default['hp_cmhs']) ? $default['hp_cmhs'] : ''),'id="hp_cmhs" class="form-control" placeholder="Masukkan No HP"'); ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <?php echo form_label('Telp : ','telp_cmhs',array('class'=>'control-label')); ?>
                    <div class="controls">
                        <?php echo form_input('telp_cmhs',set_value('telp_cmhs', isset($default['telp_cmhs']) ? $default['telp_cmhs'] : ''),'id="telp_cmhs" class="form-control" placeholder="Masukkan Telp"'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?php echo form_label('Nama Ibu : ','nm_ibu_cmhs',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('nm_ibu_cmhs',set_value('nm_ibu_cmhs', isset($default['nm_ibu_cmhs']) ? $default['nm_ibu_cmhs'] : ''),'id="nm_ibu_cmhs" class="form-control" placeholder="Masukkan Nama Ibu"'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo form_label('Rekomendasi/Memo: ','memo',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('memo',set_value('memo', isset($default['memo']) ? $default['memo'] : ''),'id="memo" class="form-control" placeholder="Rekomendasi/Memo"'); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <h2>Informasi Pendidikan</h2>
        <div class="form-group">
            <?php echo form_label('Asal Pendidikan : ','asal_pend',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('asal_pend',set_value('asal_pend', isset($default['asal_pend']) ? $default['asal_pend'] : ''),'id="asal_pend" class="form-control" placeholder="Masukkan Asal Pendidikan"'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo form_label('Jurusan Pendidikan : ','jurusan_pend',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('jurusan_pend',set_value('jurusan_pend', isset($default['jurusan_pend']) ? $default['jurusan_pend'] : ''),'id="jurusan_pend" class="form-control" placeholder="Masukkan Jurusan Pendidikan"'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo form_label('No Ijazah : ','no_ijazah_pend',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('no_ijazah_pend',set_value('no_ijazah_pend', isset($default['no_ijazah_pend']) ? $default['no_ijazah_pend'] : ''),'id="no_ijazah_pend" class="form-control" placeholder="Masukkan No Ijazah"'); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="row gutter5" style="padding:0px 10px 0px 10px">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group tanggal">
                    <?php echo form_label('Tanggal Ijazah : ','tgl_ijazah_pend',array('class'=>'control-label')); ?>
                    <div class="input-daterange input-group controls" id="datepicker">
                        <?php if (!empty($default['tgl_ijazah_pend'])): ?>
                        <input id="tgl_ijazah_pend" value="<?php echo $default['tgl_ijazah_pend']; ?>" type="text" required="true" onchange="" class="input-md form-control" name="tgl_ijazah_pend" />
                        <?php else: ?>
                        <input id="tgl_ijazah_pend" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" required="true" name="tgl_ijazah_pend" />
                        <?php endif; ?>
                        <span class="input-group-btn">
                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a></span>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <?php echo form_label('Nilai Ijazah : ','nil_ijazah_pend',array('class'=>'control-label')); ?>
                    <div class="controls">
                        <?php echo form_input('nil_ijazah_pend',set_value('nil_ijazah_pend', isset($default['nil_ijazah_pend']) ? $default['nil_ijazah_pend'] : ''),'id="nil_ijazah_pend" class="form-control" placeholder="Masukkan Nilai Ijazah"'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group tanggal">
            <?php echo form_label('Tanggal Tansfer : ','tgl_transfer',array('class'=>'control-label')); ?>
            <div class="input-daterange input-group controls" id="datepicker">
                <?php if (!empty($default['tgl_transfer'])): ?>
                <input id="tgl_transfer" value="<?php echo $default['tgl_transfer']; ?>" type="text" onchange="" class="input-md form-control" name="tgl_transfer" />
                <?php else: ?>
                <input id="tgl_transfer" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="tgl_transfer" />
                <?php endif; ?>
                <span class="input-group-btn">
                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a></span>
            </div>
        </div>
        <div class="form-group">
            <?php echo form_label('img_pasfoto : ','img_pasfoto',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo form_input('img_pasfoto',set_value('img_pasfoto', isset($default['img_pasfoto']) ? $default['img_pasfoto'] : ''),'id="img_pasfoto" class="form-control" placeholder="Masukkan img_pasfoto"'); ?>
            </div>
        </div>
          <?php $opt_status_pmb = array('Terima',
        'Baru' => 'Baru',
        'Online' => 'Online',
        'Tolak' => 'Tolak',);?>
   
                <div class="form-group">
                    <div class="controls input-group">
                        <?php echo form_label('Status Calon Mahasiswa : ','status_cmhs',array('class'=>'control-label')); ?>
                        <select name="status_cmhs" id="status_cmhs" class="input-md form-control" style="width: 100%" required>
                            <option value="Baru">Baru</option>
                            <option value="Pindah">Pindah</option>
                        </select>
                    </div>
                </div>
        <div id="FILEUPLOAD">
        <div class="form-group uploader">
                <span class="btn btn-md btn-success fileinput-button">
                            <i class="fa fa-plus icon-white"></i>
                            <span>Upload Foto</span>
                <input type="file" name="image" data-url="<?php echo base_url() ?>mhspmb/fileupload" multiple="multiple" />
                </span>
                
                <div class="fileupload-progress fade">
                    <div class="progress active">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                            70%
                        </div>
                    </div>
                    <div class="progress active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                        <div class="bar" style="width: 0%;"></div>
                    </div>
                </div>
            </div>
        </div>
      
         
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="FILEUPLOAD" class="controls">
            <div class="uploader">
                <span class="btn btn-md btn-success fileinput-button">
                            <i class="fa fa-plus icon-white"></i>
                            <span>Upload Foto</span>
                <input type="file" name="image" data-url="<?php echo base_url() ?>mhspmb/fileupload" multiple="multiple" />
                </span>
                
                <div class="fileupload-progress fade">
                    <div class="progress active">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                            70%
                        </div>
                    </div>
                    <div class="progress active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                        <div class="bar" style="width: 0%;"></div>
                    </div>
                </div>
            </div>
         
            <div class="files table-resposive">
                <table class="table table-striped table-bordered ">
                </table>
            </div>
        </div>
        <div class="files table-resposive">
            <table class="table table-striped table-bordered ">
            </table>
        </div>
    </div>
    <div id="body">
            <p>Pilih file untuk di resize</p>
            <?php
            if (isset($success) && strlen($success)) {
                echo '<div class="success">';
                echo '<p>' . $success . '</p>';
                echo '</div>';
            }
            if (isset($errors) && strlen($errors)) {
                echo '<div class="error">';
                echo '<p>' . $errors . '</p>';
                echo '</div>';
            }
            if (validation_errors()) {
                    echo validation_errors('<div class="error">', '</div>');
                }
                if (isset($resize_img)) {
                    echo img($resize_img);
                }
                ?>
                <?php
                $attributes = array('name' => 'image_upload_form', 'id' => 'image_upload_form');
                echo form_open_multipart($this->uri->uri_string(), $attributes);
                ?>
                <img id="blah" alt="your image" width="150" height="150" />
                <p><input name="image_name" id="image_name" readonly="readonly" type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" /></p>
                <p><input name="image_upload" value="Upload Image" type="submit" /></p>
                <?php
                echo form_close();
                ?>
            
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

<script type="text/javascript">
    $('body').on('change','#image_name',function(){
        image=$(this).val();
        // e.preventDefault();
        $.post($(this).data('url'),{image_name:image},function(data,status){
            if(status=='success'){
                handleUpload(data);
            }
        }); 
    });
    function changeimage(){
        var url=baseurl+'unggahfoto';
        image=$('#image_name').val();
        // e.preventDefault();
        $.post(url,{image:image},function(data,status){
            if(status=='success'){
                alert('oke');
                // handleUpload(data);
            }
        }); 
    }
    function handleUpload(data) {
        dx = JSON.parse(data);
        if (dx.st == 1) {
            // alert("Sukses"+dx.msg);
            $('#modal-notif').modal('toggle');
            $('#modal-notif .modal-body').html(dx.msg);

        } else {
            $('#modal-alert').modal('toggle');
            $('#modal-alert .modal-body').html(dx.msg);
            // alert(dx.msg);

        }

    }
</script>