<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak Kwitansi</title>
    <!-- Extra metadata -->
    <!-- / -->
    <script type="text/javascript" src="<?php echo assets_url('js/jquery-1.11.3.min.js') ?>"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('button.print').click(function() {
            var baseurl = '<?php  echo base_url('mhspmb')?>';
            var id = $(this).data('id');

            $.post(baseurl + '/cetakkwitansi', { id: id },
                function(data, status) {
                    if (status == "success") {
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
        <div class="wrapper wrapper-content gray-bg">
            <div class="text-center">
                <div class="btn-group" style="">
                    <a class="print no-print btn btn-lg btn-primary" href="<?= $_SERVER['REQUEST_URI']."/".base64_encode("pdf");?>"><i class="fa fa-downlooad=o"></i> Download PDF</a>
                    <button class="print no-print btn btn-lg btn-danger"><i class="fa fa-print"></i> Cetak </button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="ibox-content p-xl table-responsive m-t">
                            <?php if(isset($data)||!empty($data)):$gel=$this->pmbdb->getpmbgel($data['gelid'])?>
                            <table class="col-xs-12">
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td colspan="2">
                                            <br>No. Kwitansi</td>
                                        <td>
                                            <br>:</td>
                                        <td>
                                            <br>
                                            <?php 
                                            $date=date("ymd");
                                            $no="0000".$data['id'];
                                            $right=substr($no,-4);
                                            echo "#RCP".$date.$right;
                                             ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2">Terima dari</td>
                                        <td>:</td>
                                        <td>
                                            <?php echo "(".$data['noreg_pmb'].") ".$data['nm_cmhs'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2">Terbilang</td>
                                        <td>:</td>
                                        <td>
                                            <?php echo terbilang($gel['kodetarifdaftar'])." RUPIAH" ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2">Untuk Pembayaran</td>
                                        <td>:</td>
                                        <td>PENDAFTARAN MAHASISWA BARU</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <br>
                                            <br> </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="3"></td>
                                        <td>Jombang,
                                            <?php echo thedate($data['tgl_reg_pmb']) ?>
                                            <br> Penerima,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="3" style="font-size: 16px; font-weight: bold;">Rp.
                                            <?php 
                                            
                                            echo rp($gel['kodetarifdaftar']) ?>
                                            <br>
                                            <br>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="3"></td>
                                        <td>FITRI</td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php else: ?>
                                <h2>Data tidak ditemukan</h2>
                            <?php endif; ?>
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
@media print {
        td,
        th {
            padding: 0
        }
        [class*=col-sm-],
        [class*=col-xs-] {
            float: left
        }
        .col-sm-12,
        .col-xs-12 {
            width: 100%!important
        }
        .col-sm-11,
        .col-xs-11 {
            width: 91.66666667%!important
        }
        .col-sm-10,
        .col-xs-10 {
            width: 83.33333333%!important
        }
        .col-sm-9,
        .col-xs-9 {
            width: 75%!important
        }
        .col-sm-8,
        .col-xs-8 {
            width: 66.66666667%!important
        }
        .col-sm-7,
        .col-xs-7 {
            width: 58.33333333%!important
        }
        .col-sm-6,
        .col-xs-6 {
            width: 50%!important
        }
        .col-sm-5,
        .col-xs-5 {
            width: 41.66666667%!important
        }
        .col-sm-4,
        .col-xs-4 {
            width: 33.33333333%!important
        }
        .col-sm-3,
        .col-xs-3 {
            width: 25%!important
        }
        .col-sm-2,
        .col-xs-2 {
            width: 16.66666667%!important
        }
        .col-sm-1,
        .col-xs-1 {
            width: 8.33333333%!important
        }
        .col-sm-1,
        .col-sm-10,
        .col-sm-11,
        .col-sm-12,
        .col-sm-2,
        .col-sm-3,
        .col-sm-4,
        .col-sm-5,
        .col-sm-6,
        .col-sm-7,
        .col-sm-8,
        .col-sm-9,
        .col-xs-1,
        .col-xs-10,
        .col-xs-11,
        .col-xs-12,
        .col-xs-2,
        .col-xs-3,
        .col-xs-4,
        .col-xs-5,
        .col-xs-6,
        .col-xs-7,
        .col-xs-8,
        .col-xs-9 {
            float: left!important
        }
        body {
            margin: 0;
            padding: 0!important;
            min-width: 768px;
            font-size: 14px;
            font-family: 'Open Sans', sans-serif
        }
        .container {
            width: auto;
            min-width: 750px
        }
        a[href]:after {
            content: none
        }
        #comments,
        .btn,
        .footer,
        .group-media,
        .nav,
        .noprint,
        div.alert,
        form,
        header,
        ul.action-links,
        ul.links.list-inline {
            display: none!important
        }
        table {
            margin-top: 130px;
            margin-left: 50px;
            border-collapse: collapse
        }
        thead {
            position: fixed;
            font-weight: 700
        }
    }
}
@media print {
    .no-print,
    .no-print * {
        display: none !important;
    }
}
    </style>
</body>

</html>