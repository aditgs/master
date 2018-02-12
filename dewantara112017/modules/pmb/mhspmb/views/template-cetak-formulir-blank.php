<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cetak Formulir</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
    <style type="text/css">
    /*https://gist.github.com/donnierayjones/6fd9802d992b2d8d6cfd*/
@media print{.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9{float:left;}.col-sm-12{width:100%}.col-sm-11{width:91.66666667%}.col-sm-10{width:83.33333333%}.col-sm-9{width:75%}.col-sm-8{width:66.66666667%}.col-sm-7{width:58.33333333%}.col-sm-6{width:50%}.col-sm-5{width:41.66666667%}.col-sm-4{width:33.33333333%}.col-sm-3{width:25%}.col-sm-2{width:16.66666667%}.col-sm-1{width:8.33333333%}.col-sm-pull-12{right:100%}.col-sm-pull-11{right:91.66666667%}.col-sm-pull-10{right:83.33333333%}.col-sm-pull-9{right:75%}.col-sm-pull-8{right:66.66666667%}.col-sm-pull-7{right:58.33333333%}.col-sm-pull-6{right:50%}.col-sm-pull-5{right:41.66666667%}.col-sm-pull-4{right:33.33333333%}.col-sm-pull-3{right:25%}.col-sm-pull-2{right:16.66666667%}.col-sm-pull-1{right:8.33333333%}.col-sm-pull-0{right:auto}.col-sm-push-12{left:100%}.col-sm-push-11{left:91.66666667%}.col-sm-push-10{left:83.33333333%}.col-sm-push-9{left:75%}.col-sm-push-8{left:66.66666667%}.col-sm-push-7{left:58.33333333%}.col-sm-push-6{left:50%}.col-sm-push-5{left:41.66666667%}.col-sm-push-4{left:33.33333333%}.col-sm-push-3{left:25%}.col-sm-push-2{left:16.66666667%}.col-sm-push-1{left:8.33333333%}.col-sm-push-0{left:auto}.col-sm-offset-12{margin-left:100%}.col-sm-offset-11{margin-left:91.66666667%}.col-sm-offset-10{margin-left:83.33333333%}.col-sm-offset-9{margin-left:75%}.col-sm-offset-8{margin-left:66.66666667%}.col-sm-offset-7{margin-left:58.33333333%}.col-sm-offset-6{margin-left:50%}.col-sm-offset-5{margin-left:41.66666667%}.col-sm-offset-4{margin-left:33.33333333%}.col-sm-offset-3{margin-left:25%}.col-sm-offset-2{margin-left:16.66666667%}.col-sm-offset-1{margin-left:8.33333333%}.col-sm-offset-0{margin-left:0}.visible-xs{display:none!important}.hidden-xs{display:block!important}table.hidden-xs{display:table}tr.hidden-xs{display:table-row!important}td.hidden-xs,th.hidden-xs{display:table-cell!important}.hidden-sm,.hidden-xs.hidden-print{display:none!important}.visible-sm{display:block!important}table.visible-sm{display:table}tr.visible-sm{display:table-row!important}td.visible-sm,th.visible-sm{display:table-cell!important}}
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
<body class="A4">
    <div class="text-center no-print">
        <div class="btn-group" style="">
        <a class="print no-print btn btn-lg btn-primary" href="<?= $_SERVER['REQUEST_URI']."/".base64_encode("pdf");?>"><i class="fa fa-download"></i> Download PDF</a>
        <button class="print no-print btn btn-lg btn-danger"><i class="fa fa-print"></i> Cetak </button>
        </div>
    </div>
    <section class="sheet padding-5mm"  style="padding-top: 0px;">
        
        <!-- Write HTML just like a web page -->
        <article>
            <?php if(isset($data)||!empty($data)):$detail=$this->pmbdb->getpmbgel($data['gelid'])?>
            <header style="display:block;">
                <div style="clear: left;">
                    <p style="float: left;margin-right: 20px"><img src="<?= assets_url('images/logo.png') ?>" height="110px" width="110px"></p>
                    <h1 class="text-center">STIE PGRI DEWANTARA JOMBANG</h1>
                    <h4 align="center" style="font-weight: 700">Jl. Prof. Moh. Yamin No.77 Telp.(0321) 865180, Fax.(0321) 853807 Jombang, Jawa Timur</h4>
                    <h4 align="left" class="pull-left"> Website : www.stiedewantara.ac.id </h4>
                    <h4 align="right" class="pull-right"> e-mail : info@stiedewantara.ac.id</h4>
                </div>
            </header>

            <hr class="style-eight">    

            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <h3  style="font-weight: 700" align="center">FORMULIR PENDAFTARAN MAHASISWA BARU</h3>
                        <h4 align="center">Tahun Akademik 2018/2019</h4>                    
                </div>
            </div>


            <div class="row row-m-t outer" style="margin-left: 10px">
                <div class="col-xs-4 col-sm-4">
                    <strong>No Pendaftaran</strong>
                </div>

                <div class="col-xs-4 col-sm-4" style="margin-left: 5px">
                    : <?php echo $data['noreg_pmb'] ?>
                </div>
                <div class="col-xs-4 col-sm-4 inner" style="padding:0px;">
                        <?php if(!empty($data['img_pasfoto'])): ?>
                        <img src="<?php echo domain()."uploads/files/images/".$data['img_pasfoto'] ?>" width="123px" height="150px" alt="<?php echo $data['img_pasfoto'] ?>">
                    <?php else: ?>
                    
                    <p align="center" style="padding-top: 15mm">Pas Foto</p>
                    <p align="center" style="">3cm x 4cm</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row row-m-t">
                <div class="col-xs-12 col-sm-12">
                    <strong>DATA PRIBADI</strong>
                </div>
            </div>

            <div class="row row-m-t-1">
                <div class="col-xs-4 col-sm-4">
                    Nama Calon Mahasiswa
                </div>
                <div class="col-xs-8 col-sm-8">
                    : <?php echo $data['nm_cmhs'] ?>
                </div>
            </div>

            <div class="row row-m-t-1">
                <div class="col-xs-4 col-sm-4">
                    NIK
                </div>
                <div class="col-xs-8 col-sm-8">
                    : <?php echo $data['nik_cmhs'] ?>
                </div>
            </div>

            <div class="row row-m-t-1">
                <div class="col-xs-4 col-sm-4">
                    Jenis Kelamin
                </div>
                <div class="col-xs-8 col-sm-8">
                    : <?php echo $data['kelamin_cmhs'] ?>
                </div>
            </div>

            <div class="row row-m-t-1">
                <div class="col-xs-4 col-sm-4">
                    Pilihan Kelas
                </div>
                <div class="col-xs-8 col-sm-8">
                    : <?php 
                    $kelas=$this->pmbdb->getpmbkelas($data['id_siakad_kelas']);

                    // echo $data['id_siakad_kelas'] 
                    echo isset($kelas['inisial_kelas'])?"(".$kelas['inisial_kelas'].") ".$kelas['nm_kelas']:'';
                    ?>
                </div>
            </div>

            <div class="row row-m-t-1">
                <div class="col-xs-4 col-sm-4">
                    Tempat Tanggal Lahir
                </div>
                <div class="col-xs-8 col-sm-8">
                    : <?php echo $data['tmp_cmhs'].", ".$data['tgl_cmhs'] ?>
                </div>
            </div>

            <div class="row row-m-t-1">
                <div class="col-xs-4 col-sm-4">
                    Agama
                </div>
                <div class="col-xs-8 col-sm-8">
                    : <?php echo $data['agama_cmhs'] ?>
                </div>
            </div>

            <div class="row row-m-t-1">
                <div class="col-xs-4 col-sm-4">
                    Alamat
                </div>
                <div class="col-xs-8 col-sm-8">
                    : <?php echo $data['almt_cmhs'] ?>
                </div>
            </div>

            <div class="row row-m-t-1">
                <div class="col-xs-4 col-sm-4">
                    Nama Ibu
                </div>
                <div class="col-xs-8 col-sm-8">
                    : <?php echo $data['nm_ibu_cmhs'] ?>
                </div>
            </div>

            <div class="row row-m-t-1">
                <div class="col-xs-4 col-sm-4">
                    Kode Pos
                </div>
                <div class="col-xs-8 col-sm-8">
                    : <?php echo $data['kodepos_cmhs'] ?>
                </div>
            </div>

            <div class="row row-m-t-1">
                <div class="col-xs-4 col-sm-4">
                    Kota
                </div>
                <div class="col-xs-8 col-sm-8">
                    : <?php echo $data['kota_cmhs'] ?>
                </div>
            </div>

            <div class="row row-m-t-1">
                <div class="col-xs-4 col-sm-4">
                    No Telp Rumah
                </div>
                <div class="col-xs-8 col-sm-8">
                    : <?php echo $data['telp_cmhs'] ?>
                </div>
            </div>

            <div class="row row-m-t-1">
                <div class="col-xs-4 col-sm-4">
                    No HP
                </div>
                <div class="col-xs-8 col-sm-8">
                    : <?php echo $data['hp_cmhs'] ?>
                </div>
            </div>

            <div class="row row-m-t-1">
                <div class="col-xs-4 col-sm-4">
                    Email
                </div>
                <div class="col-xs-8 col-sm-8">
                    : <?php echo $data['email_cmhs'] ?>
                </div>
            </div>

            <div class="row row-m-t">
                <div class="col-xs-12 col-sm-12">
                    <strong>DATA PENDIDIKAN</strong>
                </div>
            </div>


            <div class="row row-m-t-1">
                <div class="col-xs-4 col-sm-4">
                    Asal SMU / PT
                </div>
                <div class="col-xs-8 col-sm-8">
                    : <?php echo $data['asal_pend'] ?>
                </div>
            </div>

            <div class="row row-m-t-1">
                <div class="col-xs-4 col-sm-4">
                    Program / Jurusan
                </div>
                <div class="col-xs-8 col-sm-8">
                    : <?php echo $data['jurusan_pend'] ?>
                </div>
            </div>

            <div class="row row-m-t-1">
                <div class="col-xs-4 col-sm-4">
                    No Ijazah
                </div>
                <div class="col-xs-8 col-sm-8">
                    : <?php echo $data['no_ijazah_pend'] ?>
                </div>
            </div>

            <div class="row row-m-t-1">
                <div class="col-xs-4 col-sm-4">
                    Tanggal Lulus
                </div>
                <div class="col-xs-8 col-sm-8">
                    : <?php echo tanggalindo($data['tgl_ijazah_pend']) ?>
                </div>
            </div>

            <div class="row row-m-t-1">
                <div class="col-xs-4 col-sm-4">
                    Nilai Ijazah
                </div>
                <div class="col-xs-8 col-sm-8">
                    : <?php echo $data['nil_ijazah_pend'] ?>
                </div>
            </div>


            <div class="row" style="margin-top: 50px; margin-left:130px">
                <div class="col-xs-6 col-sm-6" style="margin-top: 21px">
                    <p>Panitia PMB</p>
                </div>
                <div class="col-xs-6 col-sm-6">
                    <p>Jombang, <?php echo tanggalindo($data['tgl_reg_pmb'],true)?><br>
                    Calon Mahasiswa</p>
                </div>
            </div>

            <div class="row" style="margin-top: 80px; margin-left: 132px">
                <div class="col-xs-6 col-sm-6">
                    <p><?php $user = $this->ion_auth->user()->row(); 
            if (!empty($user)):
                $userid=$user->id;
                $username=$user->username; //untuk field $User
                $first=$user->first_name; //untuk field $User
                echo $first;
            endif;?></p>
                </div>
                <div class="col-xs-6 col-sm-6">
                    <?php echo $data['nm_cmhs'] ?>
                </div>
            </div>
                

            <?php else: ?>
            <h2>Data tidak ditemukan</h2>
            <?php endif; ?>
        </article>
    </section>
    
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
            width:30mm;
            border:1px solid black;
            position:absolute; right:0
        }
        h1{font-weight: 700;}
        h1{font-weight: 700;}
    }
    </style>
</body>

</html>