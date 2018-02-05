<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak Kartu</title>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="ibox-content p-xxs table-responsive m-xxs">
                            <?php if(isset($data)){ $detail=$this->pmbdb->getpmb($data['id']); //print_r($detail)?>
                            <!-- <table class="table table-striped table-hover table-bordered"> -->
                            <table border="1">
                              <tr>
                                <th><img alt="image" style="width:110px;" src="<?= assets_url('images/logo.png') ?>" /></th>
                                <th colspan="4">KARTU PESERTA<br>
                                                SELEKSI PMB GELOMBANG I<br>
                                                STIE PGRI DEWANTARA JOMBANG TA. 2018/2019<br></th>
                              </tr>
                              <tr>
                                <td colspan="5"><br> ============================================================================================== </td>
                              </tr>
                              <tr>
                                <td></td>
                                <td colspan="2"><br>No. Kwitansi</td>
                                <td><br>:</td>
                                <td><br># <?php echo $data['id'] ?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td colspan="2">Terima dari</td>
                                <td>:</td>
                                <td><?php echo $data['nm_cmhs'] ?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td colspan="2">Terbilang</td>
                                <td>:</td>
                                <td><?php echo terbilang($data['noreg_pmb']) ?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td colspan="2">Untuk Pembayaran</td>
                                <td>:</td>
                                <td>PENDAFTARAN MAHASISWA BARU</td>
                              </tr>
                              <tr>
                                <td colspan="5"> <br><br> </td>
                              </tr>
                              <tr>
                                <td></td>
                                <td colspan="3"></td>
                                <td>Jombang, <?php echo thedate($data['tgl_reg_pmb']) ?><br>
                                Penerima,</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td colspan="3">Rp. <?php echo $data['noreg_pmb'] ?><br><br></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td colspan="3"></td>
                                <td>FITRI</td>
                              </tr>
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
    
    @media print {
        .no-print,.no-print * {display: none !important;}
    }
    </style>
    
</body>

</html>