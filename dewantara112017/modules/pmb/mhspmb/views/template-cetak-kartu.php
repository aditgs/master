<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cetak Kartu Ujian</title>
    <link href="<?php echo assets_url() ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Normalize or reset CSS with your favorite library -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css"> -->
    <!-- Load paper.css for happy printing -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css"> -->
    <link href="<?php echo assets_url() ?>css/style.css" rel="stylesheet">
    <link href="<?php echo assets_url() ?>css/custom.css" rel="stylesheet">
    <!-- <link href="<?php //echo assets_url() ?>css/normalize.min.css" rel="stylesheet"> -->
    <!-- <link href="<?php //echo assets_url() ?>css/paper.css" rel="stylesheet"> -->
    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style type="text/css">
        /*! normalize.css v7.0.0 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,footer,header,nav,section{display:block}h1{font-size:2em;margin:.67em 0}figcaption,figure,main{display:block}figure{margin:1em 40px}hr{box-sizing:content-box;height:0;overflow:visible}pre{font-family:monospace,monospace;font-size:1em}a{background-color:transparent;-webkit-text-decoration-skip:objects}abbr[title]{border-bottom:none;text-decoration:underline;text-decoration:underline dotted}b,strong{font-weight:inherit}b,strong{font-weight:bolder}code,kbd,samp{font-family:monospace,monospace;font-size:1em}dfn{font-style:italic}mark{background-color:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}audio,video{display:inline-block}audio:not([controls]){display:none;height:0}img{border-style:none}svg:not(:root){overflow:hidden}button,input,optgroup,select,textarea{font-family:sans-serif;font-size:100%;line-height:1.15;margin:0}button,input{overflow:visible}button,select{text-transform:none}[type=reset],[type=submit],button,html [type=button]{-webkit-appearance:button}[type=button]::-moz-focus-inner,[type=reset]::-moz-focus-inner,[type=submit]::-moz-focus-inner,button::-moz-focus-inner{border-style:none;padding:0}[type=button]:-moz-focusring,[type=reset]:-moz-focusring,[type=submit]:-moz-focusring,button:-moz-focusring{outline:1px dotted ButtonText}fieldset{padding:.35em .75em .625em}legend{box-sizing:border-box;color:inherit;display:table;max-width:100%;padding:0;white-space:normal}progress{display:inline-block;vertical-align:baseline}textarea{overflow:auto}[type=checkbox],[type=radio]{box-sizing:border-box;padding:0}[type=number]::-webkit-inner-spin-button,[type=number]::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}[type=search]::-webkit-search-cancel-button,[type=search]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}details,menu{display:block}summary{display:list-item}canvas{display:inline-block}template{display:none}[hidden]{display:none}/*# sourceMappingURL=normalize.min.css.map */
    </style>
    <style type="text/css">
    /*PAPER.css*/
       .sheet,body{margin:0}@page{margin:0}.sheet{overflow:hidden;position:relative;box-sizing:border-box;page-break-after:always}body.A3 .sheet{width:297mm;height:419mm}body.A3.landscape .sheet{width:420mm;height:296mm}body.A4 .sheet{width:210mm;height:296mm}body.A4.landscape .sheet{width:297mm;height:209mm}body.A5 .sheet{width:148mm;height:209mm}body.A5.landscape .sheet{width:210mm;height:147mm}.sheet.padding-10mm{padding:10mm}.sheet.padding-15mm{padding:15mm}.sheet.padding-20mm{padding:20mm}.sheet.padding-25mm{padding:25mm}@media screen{body{background:#e0e0e0}.sheet{background:#fff;box-shadow:0 .5mm 2mm rgba(0,0,0,.3);margin:0 5mm 5mm}}@media print{body.A3.landscape{width:420mm}body.A3,body.A4.landscape{width:297mm}body.A4,body.A5.landscape{width:210mm}body.A5{width:148mm}}

    </style>
    <style>
    /*KHUSUS A6*/
   @page{size:A6}body.A6 .sheet{width:105mm;height:148mm margin-top:0px}body.A6.landscape .sheet{width:147mm;height:104mm}body.A6{width:105mm}.row-m-t{margin-top:10px;margin-left:10px}.row-m-t-1{margin-top:5px;margin-left:10px}.row{line-height:1.5}.row:after,.row:before{display:table;content:" "}.row:after{clear:both}.outer{margin:auto;position:relative}.inner{height:150px;width:125px;border:1px solid #000;position:absolute;right:0}.sheet.padding-3mm{padding:0 3mm 3mm}.sheet.padding-5mm{padding:0 5mm 5mm}.sheet.padding-7mm{padding:7mm}.sheet.padding-10mm{padding:0 10mm 10mm}.sheet.padding-15mm{padding:15mm}.sheet.padding-20mm{padding:20mm}.sheet.padding-25mm{padding:25mm}ul{list-style-type:square;margin-left:10px;padding:0}
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


<body class="A6" >
    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="no-print">

        <div class="text-center">
            <div class="btn-group" style="">
                <a class="print no-print btn btn-lg btn-primary" href="<?= $_SERVER['REQUEST_URI']."/".base64_encode("pdf ");?>"><i class="fa fa-downlooad=o"></i> Download PDF</a>
                <button class="print no-print btn btn-lg btn-danger"><i class="fa fa-print"></i> Cetak </button>
            </div>
        </div>
    </section>
    <section class="sheet padding-7mm" style="padding-top: 0px;margin-top: 0px;">
        <!-- Write HTML just like a web page -->
        <article>
            <?php if(isset($data)||!empty($data)):$detail=$this->pmbdb->getpmbgel($data['gelid']);?>
            <header style="display:block;">
                <div style="clear: left;">
                    <p style="float: left;margin-right: 10px;margin-bottom: 10px;display: block;float: left"><img src="<?= assets_url('images/logo.png') ?>" height="75px" width="75px" border="1px"></p>
                    <h1 class="text-left" align="left" style="font-weight: 700;margin-bottom: 0px">KARTU PESERTA</h1>
                    <h3 class="text-left" align="left" style="font-size:18px;text-transform: uppercase;font-weight: 700">SELEKSI PMB <?php echo isset($detail['keterangan'])?$detail['keterangan']:''; ?></h3>
                    <h4 class="text-left" align="left" style="margin-left: 10px;display: block">STIE PGRI DEWANTARA JOMBANG TAHUN AKADEMIK 2018/2019</h4>
                </div>
            </header>
            <hr class="" style="margin:0px;border:1px solid #333333">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h4 style="font-weight: 700" align="left" class="text-left">DATA PESERTA</h4>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 inner" style="padding:0px;margin-right: 25px;margin-top: 5px">
                    <?php if(!empty($data['img_pasfoto'])): ?>
                        <img src="<?php echo domain()."uploads/files/images/".$data['img_pasfoto'] ?>" width="123px" height="150px" alt="<?php echo $data['img_pasfoto'] ?>">
                    <?php else: ?>
                    <p align="center" style="padding-top: 12mm">Pas Foto</p>
                    <p align="center" style="">3cm x 4cm</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row" style="">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <strong>No. </strong>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="">
                    <?php echo $data['noreg_pmb'] ?>
                </div>
                
            </div>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    Nama:
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="word-wrap: break-word;">
                    <?php echo $data['nm_cmhs'] ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h4 style="font-weight: 700" align="left" class="text-left">MATERI</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <ul class="">
                        <li class="">Tes Kemampuan Akademik (TKA)</li>
                        <li class="">Interview</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h4 style="font-weight: 700" align="left" class="text-left">JADWAL UJIAN</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <strong>
                            Hari/Tanggal:
                            </strong>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <?php echo isset($detail['date_seleksi_start'])?tanggalindo($detail['date_seleksi_start'],true):''; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <strong>
                            Waktu:
                            </strong>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    Jam 08.00 WIB s/d Selesai
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <strong>
                    Pengumuman:
                    </strong>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <?php echo isset($detail['date_pengumuman'])?tanggalindo($detail['date_pengumuman']):''; ?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p><i>Dapat dilihat melalui website:
                    <strong>www.stiedewantara.ac.id</strong></i></p>
               
                    <p><i><strong>Catatan: Saat tes membawa alat tulis (ballpoint, pensil, penggaris, dsb)</strong></i></p>
                </div>
            </div>
            <div class="row" style="margin-top: 0px;">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center" align="center">
                   
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center" align="center" style="margin-top: -25px">
                    Jombang,
                        <?php echo tanggalindo($data['tgl_reg_pmb'])?>
                         <p style="margin-left: -85px">Panitia PMB</p>
                </div>
            </div>
            <div class="row" style="margin-top:0mm;">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center" align="center">
                   
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="margin-top: 25px">
                                <?php $user = $this->ion_auth->user()->row(); 
                    if (!empty($user)):
                        $userid=$user->id;
                        $username=$user->username; //untuk field $User
                        $first=$user->first_name; //untuk field $User
                        echo $first;
                    endif;?>
                </div>
            </div>
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
        .inner {
            height: 40mm;
            width: 30mm;
            border: 1px solid black;
            position: absolute;
            right: 0
        }
        h1 {
            font-weight: 700;
        }
        h1 {
            font-weight: 700;
        }
    }
    </style>
</body>

</html>