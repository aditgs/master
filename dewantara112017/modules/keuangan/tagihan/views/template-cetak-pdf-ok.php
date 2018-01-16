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

            $.post('<?php echo $baseurl.'tagihan/cetak'; ?>',{id:id},function(data,status){
                if(status=="success"){
                    window.print();
                }
            });
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
                    <a class="print no-print btn btn-lg btn-primary" href="<?= $_SERVER['REQUEST_URI']."/".base64_encode("pdf ");?>"><i class="fa fa-downlooad=o"></i> Download PDF</a>
                    
                    <button data-id="<?=isset($data['id'])?$data['id']:''; ?>" class="print no-print btn btn-lg btn-danger"><i class="fa fa-print"></i> Cetak </button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="ibox-content p-xl table-responsive m-t">
                            <?php if(isset($data)){ $detail=$this->tagihdb->gettagihan($data['id']); //print_r($detail)?>
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No. Tagihan</th>
                                        <td>#
                                            <?php echo $data['kode'] ?>
                                        </td>
                                        <th>Tanggal</th>
                                        <th>
                                            <?php echo thedate($data['tanggal']) ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Nama/NIM</th>
                                        <td>
                                            <?php echo $detail['nmmhs']." (".$detail['nimmhs'].")<br>".(new tagihan)->bacatarif($detail['nimmhs']) ?>
                                        </td>
                                        <th>Tempo</th>
                                        <th>
                                            <?php echo thedate($data['tgltempo']) ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="2">Keterangan Detail Tagihan</th>
                                        <th colspan="2">Total Tagihan</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="">
                                            <?php (new tagihan)->getmultitem($data['id'],true); ?>
                                        </td>
                                        <td colspan="2" class="text-right">
                                            <h3><?php echo rp($total['total']) ?></h3></td>
                                    </tr>
                                </tbody>
                            </table>
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
    @media print{td,th{padding:0}[class*=col-sm-],[class*=col-xs-]{float:left}.col-sm-12,.col-xs-12{width:100%!important}.col-sm-11,.col-xs-11{width:91.66666667%!important}.col-sm-10,.col-xs-10{width:83.33333333%!important}.col-sm-9,.col-xs-9{width:75%!important}.col-sm-8,.col-xs-8{width:66.66666667%!important}.col-sm-7,.col-xs-7{width:58.33333333%!important}.col-sm-6,.col-xs-6{width:50%!important}.col-sm-5,.col-xs-5{width:41.66666667%!important}.col-sm-4,.col-xs-4{width:33.33333333%!important}.col-sm-3,.col-xs-3{width:25%!important}.col-sm-2,.col-xs-2{width:16.66666667%!important}.col-sm-1,.col-xs-1{width:8.33333333%!important}.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9{float:left!important}body{margin:0;padding:0!important;min-width:768px;font-size:10px;font-family:'Open Sans',sans-serif}.container{width:auto;min-width:750px}a[href]:after{content:none}#comments,.btn,.footer,.group-media,.nav,.noprint,div.alert,form,header,ul.action-links,ul.links.list-inline{display:none!important}table{border-collapse:collapse}td{border-bottom:1px solid #ccc}thead{position:fixed;font-weight:700}}}
    @media print {
        .no-print,.no-print * {display: none !important;}
    }
    </style>
</body>

</html>