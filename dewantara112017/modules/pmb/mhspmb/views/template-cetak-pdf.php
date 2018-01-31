<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak PDF</title>
    <!-- Extra metadata -->
    <!-- / -->
    <script type="text/javascript" src="<?php echo assets_url('js/jquery-1.11.3.min.js') ?>"></script>
    <script type="text/javascript">
    $(document).ready(function() {
         $('button.print').click(function() {
            var id=$(this).data('id');

            $.post('<?php echo $baseurl.'mhspmb/cetak'; ?>',{id:id},function(data,status){
                if(status=="success"){
                    window.print();
                }
            });
            return false;
        });
    });
    </script>
    <script>
    function to_word($number)
    {
        $words = "";
        $arr_number = array(
        "",
        "satu",
        "dua",
        "tiga",
        "empat",
        "lima",
        "enam",
        "tujuh",
        "delapan",
        "sembilan",
        "sepuluh",
        "sebelas");

        if($number<12)
        {
            $words = " ".$arr_number[$number];
        }
        else if($number<20)
        {
            $words = to_word($number-10)." belas";
        }
        else if($number<100)
        {
            $words = to_word($number/10)." puluh ".to_word($number%10);
        }
        else if($number<200)
        {
            $words = "seratus ".to_word($number-100);
        }
        else if($number<1000)
        {
            $words = to_word($number/100)." ratus ".to_word($number%100);
        }
        else if($number<2000)
        {
            $words = "seribu ".to_word($number-1000);
        }
        else if($number<1000000)
        {
            $words = to_word($number/1000)." ribu ".to_word($number%1000);
        }
        else if($number<1000000000)
        {
            $words = to_word($number/1000000)." juta ".to_word($number%1000000);
        }
        else
        {
            $words = "undefined";
        }
        return $words;
    }
    </script>
</head>

<body class="">
    
    <div id="wrapper">
        <!-- <div id="page-wrapper" class="gray-bg" > -->
        <div class="wrapper wrapper-content gray-bg">
            <div class="text-center">
                <div class="btn-group" style="">
                    <a class="print no-print btn btn-lg btn-primary" href="<?= $_SERVER['REQUEST_URI']."/".base64_encode("pdf ");?>"><i class="fa fa-downlooad=o"></i> Download PDF</a>
                    <button class="print no-print btn btn-lg btn-danger"><i class="fa fa-print"></i> Cetak </button>
                </div>
            </div>
            <div class="row" style="width: 21.5cm; height: 11cm; background: url('<?= assets_url('images/kuitansi.jpg') ?>'); background-size: 100% 100%;" >
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="ibox-content p-xl table-responsive m-t">
                            <?php if(isset($data)){ $detail=$this->mhspmbdb->gettagihan($data['id']); //print_r($detail)?>
                            <div class="rek">242.000.6669</div>
                            <div class="uang"><?php echo rp($total['total']) ?></div>
                            <div class="terbilang"><b><?php echo terbilang($total['total']) ?> RUPIAH</b></div>
                            <div class="bayar"><?php (new tagihan)->getmultitem($data['id'],FALSE,FALSE,TRUE); ?></div>
                            <div class="nama"><?php echo $detail['nmmhs']; ?></div>
                            <div class="nim"><?php echo $detail['nimmhs']; ?></div>
                            <span class="tgl"><?php echo thedate($data['tanggal']); ?></span>
                            <div class="prodi"><?php echo (new tagihan)->bacatarif($detail['nimmhs']); ?></div>
                            
                            <?php

}else{
    echo "<h1>Data tidak ditemukan</h1>";
}
?>
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
    @media print{td,th{padding:0}[class*=col-sm-],[class*=col-xs-]{float:left}.col-sm-12,.col-xs-12{width:100%!important}.col-sm-11,.col-xs-11{width:91.66666667%!important}.col-sm-10,.col-xs-10{width:83.33333333%!important}.col-sm-9,.col-xs-9{width:75%!important}.col-sm-8,.col-xs-8{width:66.66666667%!important}.col-sm-7,.col-xs-7{width:58.33333333%!important}.col-sm-6,.col-xs-6{width:50%!important}.col-sm-5,.col-xs-5{width:41.66666667%!important}.col-sm-4,.col-xs-4{width:33.33333333%!important}.col-sm-3,.col-xs-3{width:25%!important}.col-sm-2,.col-xs-2{width:16.66666667%!important}.col-sm-1,.col-xs-1{width:8.33333333%!important}.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9{float:left!important}body{margin:0;padding:0!important;min-width:768px;font-size:14px;font-family:'Open Sans',sans-serif}.container{width:auto;min-width:750px}a[href]:after{content:none}#comments,.btn,.footer,.group-media,.nav,.noprint,div.alert,form,header,ul.action-links,ul.links.list-inline{display:none!important}table{border-collapse:collapse}td{border-bottom:1px solid #ccc}thead{position:fixed;font-weight:700}}}
    @media print {
        .no-print,.no-print * {display: none !important;}
    }
    .rek {margin-top: 1cm; margin-left: 5.5cm; position: fixed;}
    .uang {margin-top: 1.6cm; margin-left: 6cm; position: fixed;}
    .terbilang {margin-top: 2.3cm; margin-left: 5.5cm; position: fixed;}
    .bayar {margin-top: 3cm; margin-left: 5.1cm; position: fixed;}
    .nama {margin-top: 6.1cm; margin-left: 5.5cm; position: fixed;}
    .nim {margin-top: 6.8cm; margin-left: 5.5cm; position: fixed;}
    .tgl {margin-top: 6.9cm; margin-left: 19.8cm; position: fixed;}
    .prodi {margin-top: 7.5cm; margin-left: 5.5cm; position: fixed;}
    </style>
    
</body>

</html>