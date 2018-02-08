<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>A5 landscape</title>
    <link href="<?php echo assets_url() ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
    @page {
        size: A5 landscape
    }
    </style>
    <script type="text/javascript" src="<?php echo assets_url('js/jquery-1.11.3.min.js') ?>"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('button.print').click(function() { 
            window.print(); 
            return false; 
        }); 
    });
    </script>
</head>
<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->


<body class="A5 landscape">
    <section class="no-print">
        <div class="text-center">
                <div class="btn-group" style="">
                    <a class="print no-print btn btn-lg btn-primary" href="<?php echo base_url('mhspmb/cetakkwitansi/'.base64_encode('pdf')) ?>"><i class="fa fa-downlooad=o"></i> Download PDF</a>
                    <button class="print no-print btn btn-lg btn-danger"><i class="fa fa-print"></i> Cetak </button>
                </div>
            </div>
    </section>
    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="sheet padding-10mm">
        <!-- Write HTML just like a web page -->
        <article>
            <?php if(isset($data)||!empty($data)):$gel=$this->pmbdb->getpmbgel($data['gelid'])?>
            <table class="col-xs-12">
                <thead>
                    <tr>
                        <td class="margin-right:50px"><img alt="image" style="width:125px;" src="<?= assets_url('images/logo.png') ?>" /></td>
                        <td colspan="4">
                            <h1>STIE PGRI DEWANTARA JOMBANG</h1> Jl. Prof. Moh. Yamin No.77 Telp.(0321)865180, Fax.(0321)853807 Jombang, Jawa Timur
                            <br> Website : www.stiedewantara.ac.id
                            <br> e-mail : info@stiedewantara.ac.id</td>
                    </tr>
                </thead>
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
                                            echo "#KW".$date.$right;
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
                        <td><?php 
                      $user = $this->ion_auth->user()->row(); 
            if (!empty($user)):
                $userid=$user->id;
                $username=$user->username; //untuk field $User
                $first=$user->first_name; //untuk field $User
                echo $first;
            endif;

                     ?></td>
                    </tr>
                </tbody>
            </table>
            <?php else: ?>
            <h2>Data tidak ditemukan</h2>
            <?php endif; ?>
        </article>
    </section>
    <style type="text/css">
    /*https://gist.github.com/donnierayjones/6fd9802d992b2d8d6cfd*/
@media print{.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9{float:left}.col-sm-12{width:100%}.col-sm-11{width:91.66666667%}.col-sm-10{width:83.33333333%}.col-sm-9{width:75%}.col-sm-8{width:66.66666667%}.col-sm-7{width:58.33333333%}.col-sm-6{width:50%}.col-sm-5{width:41.66666667%}.col-sm-4{width:33.33333333%}.col-sm-3{width:25%}.col-sm-2{width:16.66666667%}.col-sm-1{width:8.33333333%}.col-sm-pull-12{right:100%}.col-sm-pull-11{right:91.66666667%}.col-sm-pull-10{right:83.33333333%}.col-sm-pull-9{right:75%}.col-sm-pull-8{right:66.66666667%}.col-sm-pull-7{right:58.33333333%}.col-sm-pull-6{right:50%}.col-sm-pull-5{right:41.66666667%}.col-sm-pull-4{right:33.33333333%}.col-sm-pull-3{right:25%}.col-sm-pull-2{right:16.66666667%}.col-sm-pull-1{right:8.33333333%}.col-sm-pull-0{right:auto}.col-sm-push-12{left:100%}.col-sm-push-11{left:91.66666667%}.col-sm-push-10{left:83.33333333%}.col-sm-push-9{left:75%}.col-sm-push-8{left:66.66666667%}.col-sm-push-7{left:58.33333333%}.col-sm-push-6{left:50%}.col-sm-push-5{left:41.66666667%}.col-sm-push-4{left:33.33333333%}.col-sm-push-3{left:25%}.col-sm-push-2{left:16.66666667%}.col-sm-push-1{left:8.33333333%}.col-sm-push-0{left:auto}.col-sm-offset-12{margin-left:100%}.col-sm-offset-11{margin-left:91.66666667%}.col-sm-offset-10{margin-left:83.33333333%}.col-sm-offset-9{margin-left:75%}.col-sm-offset-8{margin-left:66.66666667%}.col-sm-offset-7{margin-left:58.33333333%}.col-sm-offset-6{margin-left:50%}.col-sm-offset-5{margin-left:41.66666667%}.col-sm-offset-4{margin-left:33.33333333%}.col-sm-offset-3{margin-left:25%}.col-sm-offset-2{margin-left:16.66666667%}.col-sm-offset-1{margin-left:8.33333333%}.col-sm-offset-0{margin-left:0}.visible-xs{display:none!important}.hidden-xs{display:block!important}table.hidden-xs{display:table}tr.hidden-xs{display:table-row!important}td.hidden-xs,th.hidden-xs{display:table-cell!important}.hidden-sm,.hidden-xs.hidden-print{display:none!important}.visible-sm{display:block!important}table.visible-sm{display:table}tr.visible-sm{display:table-row!important}td.visible-sm,th.visible-sm{display:table-cell!important}}
    </style>
    <style type="text/css">
    @media print {
        .no-print,
        .no-print * {
            display: none !important;
        }
        thead {
            font-weight: 700;
        }
    }
    </style>
</body>

</html>