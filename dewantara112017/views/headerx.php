<?php if ($this->ion_auth->logged_in()): ?>
<div class="top-navigation">
    <nav class="navbar navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <i class="fa fa-reorder"></i>
            </button>
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-minimalize minimalize-styl-2 btn btn-success" type="button">
                <i class="fa fa-reorder"></i>
            </button>
            <!--                     <a class="navbar-minimalize minimalize-styl-2 btn btn-success " href="#"><i class="fa fa-bars"></i> </a>

 -->
        </div>
        <div style="height: 1px;" aria-expanded="false" class="navbar-collapse collapse" id="navbar">
            <?php if($this->ion_auth->in_group(array(1,2,3))): ?>
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Persediaan <span class="caret"></span></a>
                    <!-- <a data-module="fin" href="<?php //cho domain() ?>fin">Keuangan</a>  -->
                    <ul role="menu" class="dropdown-menu">
                        <li> <a data-module="inv" href="<?php echo domain() ?>inv">Dashboard Persediaan</a> </li>
                        <li><a href="http://sim.muriaps.com/inv/kartustok/">Kartu Stok</a></li>
                        <li><a href="http://sim.muriaps.com/inv/kartustok/laporan/">Laporan Stok</a></li>
                        <li><a href="http://sim.muriaps.com/inv/penyesuaian/">Penyesuaian Barang</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">Penjualan <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li> <a data-module="pos" href="<?php echo domain() ?>pos">Dashboard Penjualan</a> </li>
              
                        <li><a href="http://sim.muriaps.com/pos/sales_trx/">Penjualan</a></li>
                        <li><a href="http://sim.muriaps.com/pos/sales_trx/laporan">Laporan Penjualan</a></li>
                        <li><a href="http://sim.muriaps.com/pos/jualkasir">Jual Tunai</a></li>
                        <li><a href="http://sim.muriaps.com/pos/modalkasir">Modal Kasir</a></li>
                        <li><a href="http://sim.muriaps.com/acc/kartuhutang/">Kartu Hutang</a></li>
                        <li><a href="http://sim.muriaps.com/acc/kartuhutang/laporan">Laporan Kartu Hutang</a></li>
                        <li><a href="http://sim.muriaps.com/acc/kartupiutang/">Kartu Piutang</a></li>
                        <li><a href="http://sim.muriaps.com/acc/kartupiutang/laporan">Laporan Kartu Piutang</a></li>
                      
                    </ul>
                </li>
                <li class="dropdown">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">Pembelian<span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li> <a data-module="pos" href="<?php echo domain() ?>pos">Dashboard Pembelian</a> </li>
                        <li><a href="http://sim.muriaps.com/pos/purchase_order/">PO</a></li>
                        <li><a href="http://sim.muriaps.com/pos/purchase_transaction/">Pembelian</a></li>
                        <li><a href="http://sim.muriaps.com/pos/purchase_transaction/laporan">Laporan Pembelian</a></li>
                       
                        <li><a href="http://sim.muriaps.com/acc/kartuhutang/">Kartu Hutang</a></li>
                        <li><a href="http://sim.muriaps.com/acc/kartuhutang/laporan">Laporan Kartu Hutang</a></li>
                        <li><a href="http://sim.muriaps.com/acc/kartupiutang/">Kartu Piutang</a></li>
                        <li><a href="http://sim.muriaps.com/acc/kartupiutang/laporan">Laporan Kartu Piutang</a></li>
                        
                    </ul>
                </li>
                <!-- <li> <a data-module="fin" href="<?php //echo domain() ?>fin">Keuangan</a> </li> -->
                <li class="dropdown">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Keuangan <span class="caret"></span></a>
                    <!-- <a data-module="fin" href="<?php //cho domain() ?>fin">Keuangan</a>  -->
                    <ul role="menu" class="dropdown-menu">
                        <li> <a data-module="fin" href="<?php echo domain() ?>fin">Dashboard Keuangan</a> </li>
                        <li><a href="http://sim.muriaps.com/fin/kas_masuk">Kas Masuk</a></li>
                        <li><a href="http://sim.muriaps.com/fin/kas_keluar">Kas Keluar</a></li>
                        <li><a href="http://sim.muriaps.com/fin/bank/masuk">Bank Masuk</a></li>
                        <li><a href="http://sim.muriaps.com/fin/bank/keluar">Bank Keluar</a></li>
                        <li><a href="http://sim.muriaps.com/fin/banks">Rekening Kas/Bank</a></li>
                        <li><a href="http://sim.muriaps.com/fin/earn">Pendapatan</a></li>
                        <li><a href="http://sim.muriaps.com/fin/pendapatan/laporan">Laporan Pendapatan</a></li>
                        <li><a href="http://sim.muriaps.com/fin/bon">Bon Sementara</a></li>
                        <li><a href="http://sim.muriaps.com/fin/biaya">Biaya</a></li>
                        <li><a href="http://sim.muriaps.com/fin/biaya/laporan">Laporan Biaya</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Akuntansi <span class="caret"></span></a>
                    <!-- <a data-module="fin" href="<?php //cho domain() ?>fin">Keuangan</a>  -->
                    <ul role="menu" class="dropdown-menu">
                        <li> <a data-module="acc" href="<?php echo domain() ?>acc">Dashboard Akuntansi</a> </li>
                        <li><a href="http://sim.muriaps.com/acc/rekening/data">Rekening Perkiraan</a></li>
                        <li><a href="http://sim.muriaps.com/acc/jurnal">Jurnal</a></li>
                        <li><a href="http://sim.muriaps.com/acc/saldorekening/">Saldo Rekening</a></li>
                        <li><a href="http://sim.muriaps.com/acc/kartuhutang/">Hutang Dagang</a></li>
                        <li><a href="http://sim.muriaps.com/acc/kartuhutang/laporan">Laporan Hutang Dagang</a></li>
                        <li><a href="http://sim.muriaps.com/acc/kartupiutang/">Piutang Dagang</a></li>
                        <li><a href="http://sim.muriaps.com/acc/kartupiutang/laporan">Laporan Piutang Dagang</a></li>
                    </ul>
                </li>
                <!-- <li> <a data-module="acc" href="<?php //echo domain() ?>pay">Kepegawaian</a> </li> -->
                <!-- <li> <a data-module="farm" href="<?php //echo domain() ?>farm">Peternakan</a> </li> -->
                <li class="dropdown">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Peternakan <span class="caret"></span></a>
                    <!-- <a data-module="fin" href="<?php //cho domain() ?>fin">Keuangan</a>  -->
                    <ul role="menu" class="dropdown-menu">
                        <li> <a data-module="farm" href="<?php echo domain() ?>farm">Dashboard Peternakan</a> </li>
                        <li><a href="http://sim.muriaps.com/farm/recording_ayam">Rekam Ayam</a></li>
                        <li><a href="http://sim.muriaps.com/farm/recording_telur">Rekam Telur</a></li>
                        <li><a href="http://sim.muriaps.com/farm/recording_pakan/">Rekam Pakan</a></li>
                        <li><a href="http://sim.muriaps.com/farm/assembly_pakan/">Campur Pakan</a></li>
                        <li><a href="http://sim.muriaps.com/farm/laporan/laporan_baru">Laporan Baru</a></li>
                    </ul>
                </li>
            </ul>
            <?php endif; ?>
            <ul class="nav navbar-top-links navbar-right">
                <?php if ($this->ion_auth->logged_in()):?>
                <li>
                    <a href="<?php echo base_url('auth/logout') ?>">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                <?php elseif(!$this->ion_auth->logged_in()): ?>
                <li>
                    <a href="<?php echo base_url('auth/login') ?>">
                        <i class="fa fa-sign-in"></i> Login
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</div>
<?php endif; ?>
