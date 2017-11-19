<style type="text/css">
	a.ahover{
		color:#ffffff;
	}
	a.ahover:hover{
		color:#ff9900;
		text-shadow: 1px 1px 3px #000000;
	}
</style>
<div class="row" style="margin-top:30px;">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php if(!isset($data)): ?>
        <div class="jumbotron home">
            <div class="container text-center">
                <div class="row gutter5">
                    <h1>SIKA DEWANTARA</h1>
                    <h2>SISTEM INFORMASI AKADEMIK STIE DEWANTARA </h2>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="widget style1 navy-bg">
                            <a class="ahover" style="" href="<?php echo base_url('sika') ?>" data-load="<?php echo base_url('sika') ?>" data-table="<?php echo base_url('sika') ?>" data-remote-target="#ajax-remote">
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <i class="fa fa-money fa-5x"></i>
                                        <!-- <img src="<?php //echo assets_url() ?>/images/sales.png"> -->
                                    </div>
                                    <div class="col-xs-12 text-center">
                                        <h3 class="font-bold">KEUANGAN MAHASISWA</h3>
                                    </div>
                                </div>
                            </a>
                            <div class="row" style="margin-top:20px">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="btn-group">
                                        <a class="btn btn-success" href=" <?php echo domain() ?>sika/tarif/">Set Tarif</a>
                                        <a class="btn btn-info" href=" <?php echo domain() ?>sika/tagihanmhs/">Cetak Tagihan</a>
                                        <a class="btn btn-warning" href=" <?php echo domain() ?>sika/tagihanmhs/validasi/">Validasi</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="widget style1 blue-bg">
                        		<a class="ahover" style="" href="<?php echo base_url('pos') ?>" data-load="<?php echo base_url('pos') ?>" data-table="<?php echo base_url('pos') ?>" data-remote-target="#ajax-remote">
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <i class="fa fa-graduation-cap fa-5x"></i>
                                        <!-- <img src="<?php //echo assets_url() ?>/images/Inventory.png"> -->
                                    </div>
                                    <div class="col-xs-12 text-center">
                                        <h3 class="font-bold">AKADEMIK</h3>
                                    </div>
                                </div>
                        	</a>
                        	<div class="row" style="margin-top:20px">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="btn-group">
										<a class="btn btn-info" href=" <?php echo domain() ?>sika/mhsmaster/">Mahasiswa</a>
										<a class="btn btn-primary" href=" <?php echo domain() ?>sika/dosen">Dosen</a>
										<a class="btn btn-warning" href=" <?php echo domain() ?>sika/matakuliah">Mata Kuliah</a>
										<a class="btn btn-danger" href=" <?php echo domain() ?>sika/nilai">Nilai</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="widget style1 yellow-bg">
                        <a class="ahover" style="" href="<?php echo base_url('pos') ?>" data-load="<?php echo base_url('pos') ?>" data-table="<?php echo base_url('pos') ?>" data-remote-target="#ajax-remote">
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <i class="fa fa-university fa-5x"></i>
                                        <!-- <img src="<?php //echo assets_url() ?>/images/sales.png"> -->
                                    </div>
                                    <div class="col-xs-12 text-center">
                                        <h3 class="font-bold">PMB</h3>
                                    </div>
                                </div>
                        </a>
                        <div class="row" style="margin-top:20px">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="btn-group">
                                    	<a class="btn btn-success" href=" <?php echo domain() ?>pos/purchase_order/">Pendaftaran</a>
                        				<a class="btn btn-info" href=" <?php echo domain() ?>pos/purchase_transaction/">Jadwal Test</a>
										<a class="btn btn-primary" href=" <?php echo domain() ?>pos/purchase_transaction/laporan">Hasil test</a>

                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="widget style1 yellow-bg">
                        <a class="ahover" style="" href="<?php echo base_url('acc') ?>" data-load="<?php echo base_url('acc') ?>" data-table="<?php echo base_url('acc') ?>" data-remote-target="#ajax-remote">
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <!-- <i class="fa fa-cubes fa-5x"></i> -->
                                        <img src="<?php echo assets_url() ?>/images/account_receivable.png">
                                    </div>
                                    <div class="col-xs-12 text-center">
                                        <h3 class="font-bold">PENJAMINAN MUTU</h3>
                                    </div>
                                </div>
                        </a>
                        <div class="row" style="margin-top:20px">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="btn-group">
                                    	 <a class="btn btn-success" href=" <?php echo domain() ?>fin/kas_masuk">Formulir</a>
                        <a class="btn btn-success" href=" <?php echo domain() ?>fin/kas_keluar">Formulir</a>
                         <a class="btn btn-success" href=" <?php echo domain() ?>fin/banks">Hasil formulir</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="widget style1 red-bg">
                        <a class="ahover" style="" href="<?php echo base_url('acc') ?>" data-load="<?php echo base_url('acc') ?>" data-table="<?php echo base_url('acc') ?>" data-remote-target="#ajax-remote">
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <i class="fa fa-users fa-5x"></i>
                                        <!-- <img src="<?php //echo assets_url() ?>/images/account_receivable.png"> -->
                                    </div>
                                    <div class="col-xs-12 text-center">
                                        <h3 class="font-bold">SDM</h3>
                                    </div>
                                </div>
                        </a>
                        <div class="row" style="margin-top:20px">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="btn-group">
                       	<a class="btn btn-success" href=" <?php echo domain() ?>fin/bank/masuk">Absensi</a>
                        <a class="btn btn-success" href=" <?php echo domain() ?>fin/bank/keluar">Data Pegawai</a>
                        <a class="btn btn-success" href=" <?php echo domain() ?>fin/banks">Evaluasi</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="widget style1 lazur-bg">
                        <a class="ahover" style="" href="<?php echo base_url('acc') ?>" data-load="<?php echo base_url('acc') ?>" data-table="<?php echo base_url('acc') ?>" data-remote-target="#ajax-remote">
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <!-- <i class="fa fa-cubes fa-5x"></i> -->
                                        <img src="<?php echo assets_url() ?>/images/account_receivable.png">
                                    </div>
                                    <div class="col-xs-12 text-center">
                                        <h3 class="font-bold">ASSET MANAJEMEN</h3>
                                    </div>
                                </div>
                        </a>
                        <div class="row" style="margin-top:20px">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="btn-group">
                       	  <a class="btn btn-success" href=" <?php echo domain() ?>acc/rekening/data">Perkiraan</a>
                        <a class="btn btn-success" href=" <?php echo domain() ?>acc/saldorekening/">Saldo Rekening</a>
                        <a class="btn btn-success" href=" <?php echo domain() ?>acc/jurnal">Jurnal</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="widget style1 red-bg">
                        <a class="ahover" style="" href="<?php echo base_url('farm') ?>" data-load="<?php echo base_url('farm') ?>" data-table="<?php echo base_url('farm') ?>" data-remote-target="#ajax-remote">
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <i class="fa fa-cubes fa-5x"></i>

                                    </div>
                                    <div class="col-xs-12 text-center">
                                        <h3 class="font-bold">&nbsp;</h3>
                                        <h3 class="font-bold">MASTER</h3>
                                    </div>
                                </div>
                        </a>
                        <div class="row" style="margin-top:20px">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="btn-group">
                       	   <a class="btn btn-warning" href=" <?php echo domain() ?>sika/mhsmaster">Mahasiswa</a>
                        <a class="btn btn-warning" href=" <?php echo domain() ?>sika/dosen">Dosen</a>
                        <a class="btn btn-warning" href=" <?php echo domain() ?>sika/matakuliah/">Mata Kuliah</a>
                        <a class="btn btn-warning" href=" <?php echo domain() ?>sika/tarif/">Tarif</a>
                        <a class="btn btn-warning" href=" <?php echo domain() ?>sika/kelompok">Kelompok</a>
                        <a class="btn btn-warning" href=" <?php echo domain() ?>sika/prodi">Prodi</a>
                        <a class="btn btn-warning" href=" <?php echo domain() ?>sika/jenis">Jenis</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

                    </div>

                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
