<div id="ajax-remote" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    
</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
     <h2>Pembelian</h2>
 
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">   
                <a class="" data="#" href="<?php echo domain() ?>pos/purchase_order/" data-remote-target="#ajax-remote">
                    <div class="widget style1 red-bg col-xs-12 text-center"><h1>ORDER</h1><h3 class="font-bold">Pesan Pembelian</h3></div>
                </a>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">   
                <a class="" href="<?php echo domain() ?>pos/purchase_transaction/" >
                    <div class="widget style1 red-bg col-xs-12 text-center"><h1>BELI</h1><h3 class="font-bold">Transaksi</h3></div>
                </a>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">   
                <a class="" href="<?php echo domain() ?>pos/purchase_order/laporan_po" >
                    <div class="widget style1 red-bg col-xs-12 text-center"><h1>LAPORAN ORDER</h1><h3 class="font-bold">Laporan Order</h3></div>
                </a>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">   
                <a class="" href="<?php echo domain() ?>pos/purchase_transaction/laporan" >
                    <div class="widget style1 red-bg col-xs-12 text-center"><h1>LAPORAN BELI</h1><h3 class="font-bold">Laporan Pembelian</h3></div>
                </a>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">   
                <a class="" href="<?php echo domain() ?>acc/kartuhutang/" >
                    <div class="widget style1 red-bg col-xs-12 text-center"><h1>HUTANG</h1><h3 class="font-bold">Hutang Dagang</h3></div>
                </a>
        </div>
    </div> 
</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
     <h2>Penjualan</h2>
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">   
                <a class="" href="#" data-load-remote="<?php echo domain() ?>pos/sales_trx/" data-table="<?php echo domain() ?>pos/sales_trx/" data-remote-target="#ajax-remote">
                    <div class="widget style1 blue-bg col-xs-12 text-center"><h1>JUAL</h1><h3 class="font-bold">Transaksi Penjualan</h3></div>
                </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">   
                <a class="" href="<?php echo domain() ?>acc/kartupiutang/" data-table="<?php echo domain() ?>pos/purchase_order/tables" data-remote-target="#ajax-remote">
                    <div class="widget style1 blue-bg col-xs-12 text-center"><h1>PIUTANG</h1><h3 class="font-bold">Piutang Dagang</h3></div>
                </a>
        </div> 
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">   
                <a class="" href="<?php echo domain() ?>pos/sales_trx/laporan" data-table="<?php echo domain() ?>pos/purchase_order/tables" data-remote-target="#ajax-remote">
                    <div class="widget style1 blue-bg col-xs-12 text-center"><h1>LAPORAN JUAL</h1><h3 class="font-bold">Laporan Penjualan</h3></div>
                </a>
        </div>
    </div> 
</div>  
   
