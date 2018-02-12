<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cetak Kartu Ujian</title>
    
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
<body>
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
                    <h3 class="text-left" align="left" style="text-transform: uppercase;font-weight: 700">SELEKSI PMB <?php echo isset($detail['keterangan'])?$detail['keterangan']:''; ?></h3>
                    <h4 class="text-left" align="left" style="">STIE PGRI DEWANTARA JOMBANG TAHUN AKADEMIK 2018/2019</h4>
                </div>
            </header>
            <hr class="" style="margin:0px;border:1px solid #333333">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <h4 style="font-weight: 700" align="left" class="text-left">DATA PESERTA</h4>
                </div>
                <div class="col-xs-4 col-sm-4  inner" style="padding:0px;margin-right: 25px;margin-top: 5px">
                    <?php if(!empty($data['img_pasfoto'])): ?>
                        <img src="<?php echo domain()."uploads/files/images/".$data['img_pasfoto'] ?>" width="123px" height="150px" alt="<?php echo $data['img_pasfoto'] ?>">
                    <?php else: ?>
                    <p align="center" style="padding-top: 12mm">Pas Foto</p>
                    <p align="center" style="">3cm x 4cm</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row" style="">
                <div class="col-xs-2 col-sm-2 ">
                    <strong>No. </strong>
                </div>
                <div class="col-xs-6 col-sm-6 " style="">
                    <?php echo $data['noreg_pmb'] ?>
                </div>
                
            </div>
            <div class="row">
                <div class="col-xs-2 col-sm-2 ">
                    Nama:
                </div>
                <div class="col-xs-6 col-sm-6 " style="word-wrap: break-word;">
                    <?php echo $data['nm_cmhs'] ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <h4 style="font-weight: 700" align="left" class="text-left">MATERI</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-9 col-sm-9 ">
                    <ul class="">
                        <li class="">Tes Kemampuan Akademik (TKA)</li>
                        <li class="">Interview</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <h4 style="font-weight: 700" align="left" class="text-left">JADWAL UJIAN</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-sm-4 ">
                    <strong>
                            Hari/Tanggal:
                            </strong>
                </div>
                <div class="col-xs-8 col-sm-8 ">
                    <?php echo isset($detail['date_seleksi_start'])?tanggalindo($detail['date_seleksi_start'],true):''; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-sm-4 ">
                    <strong>
                            Waktu:
                            </strong>
                </div>
                <div class="col-xs-8 col-sm-8 ">
                    Jam 08.00 WIB s/d Selesai
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-sm-4 ">
                    <strong>
                    Pengumuman:
                    </strong>
                </div>
                <div class="col-xs-8 col-sm-8 ">
                    <?php echo isset($detail['date_pengumuman'])?tanggalindo($detail['date_pengumuman']):''; ?>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <p><i>Dapat dilihat melalui website:
                    <strong>www.stiedewantara.ac.id</strong></i></p>
               
                    <p><i><strong>Catatan: Saat tes membawa alat tulis (ballpoint, pensil, penggaris, dsb)</strong></i></p>
                </div>
            </div>
            <div class="row" style="margin-top: 0px;">
                <div class="col-xs-6 col-sm-6  text-center" align="center">
                   
                </div>
                <div class="col-xs-6 col-sm-6  text-center" align="center" style="margin-top: -25px">
                    Jombang,
                        <?php echo tanggalindo($data['tgl_reg_pmb'])?>
                         <p style="margin-left: -85px">Panitia PMB</p>
                </div>
            </div>
            <div class="row" style="margin-top:0mm;">
                <div class="col-xs-6 col-sm-6  text-center" align="center">
                   
                </div>
                <div class="col-xs-6 col-sm-6 " style="margin-top: 25px">
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
   
</body>

</html>