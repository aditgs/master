<form id="laporan_po" action="<?php echo !empty($action)?$action:base_url('pendapatan/laporan/'); ?>" method="POST" role="form">
	<!-- <legend>Form title</legend> -->
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="form-group">
					<?php echo form_label('Laporan Pendapatan Lain-lain: ','laporan',array('class'=>'control-label')); ?>
					<div class="input-group">
					 
					    <div class="controls">
					        <?php $opt_laporan=array(
					        	'0'=>'Pilih Laporan',
					        	'1'=>'Laporan Pendapatan Lain-lain Detail',
					        	'2'=>'Laporan Pendapatan Lain-lain Rekap Vendor',
					        	'3'=>'Laporan Pendapatan Lain-lain Rekap Tanggal',
					        	'4'=>'Laporan Ragam Pendapatan',
					       
					        	
					        	);
					        //print_r($opt_supplier) ?>
					        <?php $select = isset($default['laporan'])? $default['laporan'] : '0';  ?>
					    <?php echo form_dropdown('laporan',$opt_laporan,'','id="opt_laporan" class="opt_laporan input-lg select2 form-control" placeholder="Supplier"'); ?>
					    </div>
					    
					</div>
				</div>
		</div>
		
	</div>
	<div class="row">
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
		
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			
			<div id="radiovendor" class="btn-group btn-group-justified" data-toggle="buttons">
	           
	            <label class="btn btn-default">
	                <input type="radio" name="jenis" value="1" id="jenis1" autocomplete="off"> Customer
	            </label>
	            <label class="btn btn-default">
	                <input type="radio" name="jenis" value="2" id="jenis2" autocomplete="off"> Supplier
	            </label>
	            <label class="btn btn-default">
	                <input type="radio" name="jenis" value="3" id="jenis3" autocomplete="off"> Karyawan
	            </label>
	        </div>        
			
				
				
			
		
			 <div class="form-group">
                                          
                                                   
                                                    <div class="controls input-group">
                                                        
                                                        <?php $vendor = isset($default['vendor'])? $default['vendor'] : '0';  ?>
                                                    <?php echo form_dropdown('vendor',$opt_vendor,$vendor,'id="vendor" class="rekening input-lg form-control input-md select2" style="width:100%" placeholder="Rekening"'); ?>
                                                  
                                                    </div>
                                            </div>  
			
				
				
			
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
		
				
				
			
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label for=""> </label><br>

			<div class="btn-group">
				<button id="cek_laporan_po" type="submit" class="btn btn-lg btn-primary"><i class="fa fa-eye"></i> Lihat</button>
				<button id="buildpdf" type="submit" class="btn btn-lg btn-danger"><i class="fa fa-print"></i> Cetak PDF</button>
			</div>
		</div>
	</div>
		
	

	
</form>
<div class="laporan"></div>
