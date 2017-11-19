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

<body>
	  <?php echo $body; ?>
    
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo assets_url() ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo assets_url() ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo assets_url() ?>css/style.css" rel="stylesheet">
    <link href="<?php echo assets_url() ?>css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo assets_url() ?>css/custom.css" rel="stylesheet">

     <?php echo $css; ?>


    <!-- Mainly scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.2.0/metisMenu.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.7/jquery.slimscroll.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.10/css/dataTables.bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.10/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.10/js/dataTables.bootstrap.min.js"></script>

   
      
 
    <script src="<?php echo assets_url() ?>js/inspinia.js"></script>
 


   
	 <!-- Extra javascript -->
        <?php echo $js; ?>
        <?php echo $assets; ?>
        
        <!-- / -->    
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-72573380-1', 'auto');
  ga('send', 'pageview');

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
