<form id="laporan_po" action="<?php echo !empty($action)?$action:base_url('tagihan/laporan/'); ?>" method="POST" role="form">
    <!-- <legend>Form title</legend> -->
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <?php echo form_label('Laporan: ','laporan',array('class'=>'control-label')); ?>
                <div class="input-group">
                    <div class="controls">
                        <?php $opt_laporan=array(
					        	'0'=>'-- Pilih Laporan --',
					        	'1'=>'Detail Tagihan',
					        	'2'=>'Rekap Tagihan',
					        	'3'=>'Detail Tagihan Per Prodi',
					        	'4'=>'Rekap Tagihan Per Prodi',
					        	'5'=>'Detail Tagihan Per Angkatan',
					        	'6'=>'Rekap Tagihan Per Angkatan',
					        	'7'=>'Detail Tagihan Per Mahasiswa',
					        	'8'=>'Rekap Tagihan Per Mahasiswa',

					        	);
					        //print_r($opt_supplier) ?>
                        <?php $select = isset($default['laporan'])? $default['laporan'] : '0';  ?>
                        <?php echo form_dropdown('laporan',$opt_laporan,'','id="opt_laporan" style="width:100%" class="select2 opt_laporan input-lg form-control" placeholder="Supplier"'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <label for="">Tanggal: </label>
                <div class="input-daterange input-group" id="datepicker">
                    <input id="start" type="text" class="input-lg form-control" name="start" />
                    <span class="input-group-addon">to</span>
                    <input id="end" type="text" class="input-lg form-control" name="end" />
                </div>
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        	 <div class="form-group">
                <?php echo form_label('Tipe Tagihan: ','tagihan',array('class'=>'control-label')); ?>
                <div class="input-group">
                    <div class="controls">
                        <?php $opt_tagihan=array(
					        	'0'=>'-- Tipe Tagihan --',
					        	'1'=>'Belum Tertagih',
					        	'2'=>'Tertagih (Belum Divalidasi)',
					        	'3'=>'Tertagih (Sudah Divalidasi)',

					        	);
					        //print_r($opt_supplier) ?>
                        <?php $select = isset($default['tagihan'])? $default['tagihan'] : '0';  ?>
                        <?php echo form_dropdown('tagihan',$opt_tagihan,'','id="opt_tagihan" style="width:100%" class="select2 opt_tagihan input-lg form-control" placeholder="Tagihan"'); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        	 <div class="form-group sp-dropdown">
	            <?php echo form_label('Program Studi: ','prodi',array('class'=>'control-label')); ?>
	        
	                <div class="controls">
	                    <?php //print_r($opt_supplier) ?>
	                    <?php $prodi = isset($default['prodi'])? $default['prodi'] : '0';  ?>
	                    <?php echo form_dropdown('prodi',$opt_prodi,$prodi,'id="prodi" class="form-control select2" style="width:100%" placeholder="Program Studi"'); ?>
	                </div>
	        
	        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
           
	        <div class="form-group">
	            <label class="control-label">
	                Nama Mahasiswa
	            </label>
	            <div class="controls input-group">
	                <?php $mhs = isset($default['mhs'])? $default['mhs'] : '0';  ?>
	                <?php echo form_dropdown('mhs',$opt_mhs,$mhs,'id="mhs" class="form-control select2 input-md" style="width:100%" placeholder="Mahasiswa"'); ?>
	              
	            </div>
	        </div>
	    </div>
	    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	    	
	        <div class="form-group">
	            <label class="control-label">
	                Tahun
	            </label>
	            <div class="controls input-group">
	                <?php $tahun = isset($default['tahun'])? $default['tahun'] : '0';  ?>
	                <?php echo form_dropdown('tahun',$opt_tahun,$tahun,'id="tahun" class="form-control select2 input-md" style="width:100%" placeholder="Mahasiswa"'); ?>
	              
	            </div>
	        </div>
	    </div>
	    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	    	
	           <div class="form-group sp-dropdown">
	            <?php echo form_label('Kelompok Kelas: ','kelompok',array('class'=>'control-label')); ?>
	        
	                <div class="controls">
	                    <?php //print_r($opt_supplier) ?>
	                    <?php $kelompok = isset($default['kelompok'])? $default['kelompok'] : '0';  ?>
	                    <?php echo form_dropdown('kelompok',$opt_kelompok,$kelompok,'id="kelompok" class="form-control select2" style="width:100%" placeholder="Kelompok"'); ?>
	                </div>
	        
	        </div>   
	    </div>
	    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	    	
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
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label for=""> </label>
            <br>
            <div class="btn-group">
                <button id="ceklaporan" type="submit" class="btn btn-lg btn-primary"><i class="fa fa-eye"></i> Lihat</button>
                <button id="buildpdf" type="submit" class="btn btn-lg btn-danger"><i class="fa fa-print"></i> Cetak PDF</button>
            </div>
        </div>
    </div>
</form>
<div class="laporan"></div>