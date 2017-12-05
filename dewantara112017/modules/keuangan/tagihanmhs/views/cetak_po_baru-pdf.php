<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Extra metadata -->
        <!-- / -->
  <script type="text/javascript">
        $(document).ready(function() {  
        $('button.print').click(function() {
            window.print();
            return false;
            });
        });
    </script>
        
    </head>

<body class="">



<div id="wrapper">
       

        <!-- <div id="page-wrapper" class="gray-bg" > -->
            <div class="wrapper wrapper-content gray-bg" class="" style="min-height: 655px;">
                <div class="text-center">

                            <div class="btn-group" style="">
                                <button class="print no-print btn btn-lg btn-primary"><i class="fa fa-downlooad=o"></i> Download PDF </button>
                                <button class="print no-print btn btn-lg btn-danger"><i class="fa fa-print"></i> Cetak </button>

                            </div>
                </div>

            <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl table-responsive m-t">
                            <?php if(!empty($data))://print_r($data)?>
                            <table class="table invoice-table">
                            <tr>
                                <td>
                                    <h5>Dari:</h5>
                                    <address>
                                        <strong>Muria PS</strong><br>
                                        Karangsono <br>
                                        Malang<br>
                                        <abbr title="Phone">Telp:</abbr> (0341) 601-4590
                                        <p>
                                            <strong>Kendaraan</strong><br>
                                            NOPOL: <?php echo !empty($data)?$data['nopol']:''; ?></br>
                                            Supir: <?php echo !empty($data)?$data['nama_supir']:''; ?></br>
                                        </p>

                                    </address>
                                </td>
                                
                                <td class="text-right">
                                    <h4>Order Pembelian No.</h4>
                                    <h4 class="text-navy"><?php echo $data['faktur_po'] ?></h4>
                                    <span>Kepada:</span>
                                    <address>
                                        <strong><?php echo $data['namasupplier']." (".$data['kdsupplier'].")" ?></strong><br>
                                        <?php echo !empty($supplier)?$supplier['Alamat']:''; ?></br>
                                        <?php echo !empty($supplier)?$supplier['Kota']:''; ?></br>
                                        Tel: <?php echo !empty($supplier)?$supplier['Telepon']:''; ?></br>
                                        Fax: <?php echo !empty($supplier)?$supplier['Fax']:''; ?></br>
                                        CP: (<?php echo !empty($supplier)?$supplier['Contact']:''; ?>)</br>
                                       
                                    </address>
                                    <?php //print_r($data) ?>
                                    <table class="table table-striped table-condensed table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Tanggal Order Pembelian</th>
                                                <th class="text-center">Tanggal Jatuh Tempo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center"><?php echo date('d F Y',strtotime($data['tgl_po'])) ?></td>
                                                <td class="text-center"><?php echo date('d F Y',strtotime($data['tgl_jatuhtempo'])) ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                  
                                </td>
                              
                            </tr>
                            </table>

                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th class="text-left" style="text-align:left">Nama Barang</th>
                                        <th class="text-right" style="text-align:right">Jumlah (Satuan)</th>
                                  
                                        <!-- <th>Harga Satuan</th> -->
                                        <!-- <th>Sub Total</th> -->
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $jcount=count($detail);
                                        //print_r($detail);
                                        foreach ($detail as $key => $value) {
                                            echo "<tr>";
                                            echo "<td><div><strong>".$value['Nama']." (".$value['Kode'].")"."</strong></div></td>";
                                            echo "<td style='text-align:right'>".$value['jumlah']." (".$value['satuan'].")</td>";
                                      
                                            // echo "<td>".rp($value['harga'])."</td>";
                                            // echo "<td>".rp($value['subtotal'])."</td>";
                                            # code...
                                            
                                            echo "</tr>";
                                        }
                                         ?>

                                  
                                  
                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <table class="table invoice-total">
                                <tbody>
                               <!--  <tr>
                                    <td><strong>Total :</strong></td>
                                    <td><?php  //echo rp($data['totalbayar']) ?></td>
                                </tr> -->
                                <!-- <tr>
                                    <td><strong>PAJAK :</strong></td>
                                    <td>$235.98</td>
                                </tr>
                                <tr>
                                    <td><strong>GRAND TOTAL :</strong></td>
                                    <td>$1261.98</td>
                                </tr> -->
                                </tbody>
                            </table>
                              <?php endif ?>
                           
                        </div>
                </div>
            </div>
</div>

            </div>


</div>

    
    
    <link href="<?php echo assets_url() ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="<?php echo assets_url() ?>css/style.css" rel="stylesheet"> -->
    <link href="<?php echo assets_url() ?>css/custom.css" rel="stylesheet">
    <style type="text/css">

@media print 
{

    [class*="col-sm-"] {
        float: left;
    }

    [class*="col-xs-"] {
        float: left;
    }

    .col-sm-12, .col-xs-12 { 
        width:100% !important;
    }

    .col-sm-11, .col-xs-11 { 
        width:91.66666667% !important;
    }

    .col-sm-10, .col-xs-10 { 
        width:83.33333333% !important;
    }

    .col-sm-9, .col-xs-9 { 
        width:75% !important;
    }

    .col-sm-8, .col-xs-8 { 
        width:66.66666667% !important;
    }

    .col-sm-7, .col-xs-7 { 
        width:58.33333333% !important;
    }

    .col-sm-6, .col-xs-6 { 
        width:50% !important;
    }

    .col-sm-5, .col-xs-5 { 
        width:41.66666667% !important;
    }

    .col-sm-4, .col-xs-4 { 
        width:33.33333333% !important;
    }

    .col-sm-3, .col-xs-3 { 
        width:25% !important;
    }

    .col-sm-2, .col-xs-2 { 
        width:16.66666667% !important;
    }

    .col-sm-1, .col-xs-1 { 
        width:8.33333333% !important;
    }
      
    .col-sm-1,
    .col-sm-2,
    .col-sm-3,
    .col-sm-4,
    .col-sm-5,
    .col-sm-6,
    .col-sm-7,
    .col-sm-8,
    .col-sm-9,
    .col-sm-10,
    .col-sm-11,
    .col-sm-12,
    .col-xs-1,
    .col-xs-2,
    .col-xs-3,
    .col-xs-4,
    .col-xs-5,
    .col-xs-6,
    .col-xs-7,
    .col-xs-8,
    .col-xs-9,
    .col-xs-10,
    .col-xs-11,
    .col-xs-12 {
        float: left !important;
    }

    body {
        margin: 0;
        padding: 0 !important;
        min-width: 768px;
    }

    .container {
        width: auto;
        min-width: 750px;
    }

    body {
        font-size: 10px;
        font-family: 'Open Sans', sans-serif;
         /*font-family: 'Open Sans', sans-serif;*/

        /*font-family: 'Roboto', sans-serif;*/
    }

    a[href]:after {
        content: none;
    }

    .noprint, 
        div.alert, 
        header, 
        .group-media, 
        .btn, 
        .footer, 
        form, 
        #comments, 
        .nav, 
        ul.links.list-inline,
        ul.action-links {
        display:none !important;
    }
    table{
        border-collapse: collapse; 
        /*width: 100%;*/
    }

    td{
       border-bottom:1px solid #ccc; 
       padding:0px;
    }

    thead{
       /*width:100%;*/
       position:fixed;
       /*height:109px;*/
       font-weight:bold; 
    }
    th{
        /*background: #cecece;*/
        padding:0px;
    }

}
</style>


    <!-- Mainly scripts -->
  
  
  
   
<style type="text/css">
            @media print
                {    
                    .no-print, .no-print *
                    {
                        display: none !important;
                    }
                }
            </style>
</body>

</html>