<form id="laporan_po" action="<?php echo !empty($action)?$action:base_url('tagihan/laporan/'); ?>" method="POST" role="form">
    <!-- <legend>Form title</legend> -->
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <?php echo form_label('Laporan Penjualan: ','laporan',array('class'=>'control-label')); ?>
                <div class="input-group">
                    <div class="controls">
                        <?php $opt_laporan=array(
					        	'0'=>'-- Pilih Laporan --',
					        	'1'=>'Per Faktur Detail',
					        	'2'=>'Per Faktur Rekap',
					        	'3'=>'Harian Detail',
					        	'4'=>'Harian Rekap',
					        	'5'=>'Per Golongan Detail',
					        	'6'=>'Per Golongan Rekap',
					        	'7'=>'Per Supplier Detail',
					        	'8'=>'Per Supplier Rekap',
					        	'9'=>'Per Customer Detail',
					        	'10'=>'Per Customer Rekap',
					        	'11'=>'Per Barang Detail',
					        	'12'=>'Per Barang Rekap',
					        	'13'=>'History Harga',
					        	'14'=>'Master Customer',
					        	
					       
					        	
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
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <div class="input-group ">
                    <label>
                        Customer
                    </label>
                    <div class="controls">
                        <?php //print_r($opt_customer) ?>
                        <?php //$customer = isset($default['id_customer'])? $default['id_customer'] : '0';  ?>
                        <?php //echo form_dropdown('id_customer',$opt_customer,$customer,'id="id_customer" class="form-control select2" placeholder="Customer"'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label for=""> </label>
            <br>
            <div class="btn-group">
                <button id="cek_laporan_po" type="submit" class="btn btn-lg btn-primary"><i class="fa fa-eye"></i> Lihat</button>
                <button id="buildpdf" type="submit" class="btn btn-lg btn-danger"><i class="fa fa-print"></i> Cetak PDF</button>
            </div>
        </div>
    </div>
</form>
<div class="laporan"></div>