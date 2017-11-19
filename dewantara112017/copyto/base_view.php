<?php date_default_timezone_set('Asia/Bangkok'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $description; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Extra metadata -->
        <?php echo $metadata; ?>
        <!-- / -->

        
    </head>

<body class="">
     <section id="imgoverlay" style="display:none">
                    <div id="overlay"> 
                        <i class="fa fa-spinner fa-spin spin-big"></i>
                        <!-- <p>Loading...harap menunggu</p> -->
                    </div>
                </section>
    
	  <?php echo $body; ?>
    <script src="<?php echo assets_url() ?>js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo assets_url() ?>js/modules/base.sixfour.js"></script>
    <script type="text/javascript">
        $.post("<?php echo domain().'site/loadmenu' ?>",function(dt,status){
                        data=base64(0,dt);
                        $("ul#side-menu.nav").append(data);

                });
    </script>
    <link href="<?php echo assets_url() ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo assets_url() ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo assets_url() ?>css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo assets_url() ?>css/style.css" rel="stylesheet">
    <link href="<?php echo assets_url() ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo assets_url() ?>css/custom.css" rel="stylesheet">
    <!-- <link href="<?php //echo assets_url() ?>css/plugins/bootstrap-modal/bootstrap-modal.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?php echo assets_url() ?>css/plugins/datatables/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo assets_url() ?>css/plugins/datatables/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo assets_url() ?>css/plugins/datatables/responsive.bootstrap.min.css">

     <?php echo $css; ?>


    <!-- Mainly scripts -->
    
    <script src="<?php echo assets_url() ?>js/bootstrap.min.js"></script>
    <script src="<?php echo assets_url() ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo assets_url() ?>js/plugins/iCheck/icheck.min.js"></script>
    
     <!--<script src="<?php //echo assets_url() ?>js/plugins/bootstrap-modal/bootstrap-modal.min.js"></script>-->
    <script src="<?php echo assets_url() ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script type="text/javascript" src="<?php echo assets_url() ?>js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo assets_url() ?>js/plugins/datatables/dataTables.bootstrap.min.js"></script>
       <script type="text/javascript" src="<?php echo assets_url() ?>js/plugins/datatables/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" src="<?php echo assets_url() ?>js/plugins/datatables/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="<?php echo assets_url() ?>js/plugins/datatables/responsive.bootstrap.min.js"></script>
    <script src="<?php echo assets_url() ?>js/inspinia.min.js"></script>
 
 

    <!-- jQuery UI -->
     <!-- <script src="<?php //echo assets_url() ?>js/plugins/jquery-ui/jquery-ui.min.js"></script>-->


   
	 <!-- Extra javascript -->
        <?php echo $js; ?>
        <?php echo $assets; ?>
        
        <!-- / -->
    <script type="text/javascript">
        $(document).ajaxStart(function(){
            $("#imgoverlay").fadeIn(50);
        });
        $(document).ajaxComplete(function(){
            $("#imgoverlay").fadeOut(200);
        }); 
    </script>
    <script src="<?php echo assets_url() ?>js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
                
            });

        </script> 
    <script type="text/javascript">
        $(document).ready(function() {  
        $('button.print').click(function() {
            window.print();
            return false;
            });
        });
    </script>
   
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
