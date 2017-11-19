<div id="wrapper">
        <?php $this->load->view('sidebar'); ?>

        <div id="page-wrapper" class="gray-bg dashbard-1">

	       	<?php echo $header; ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-6">
                   
                    <h2><?php echo !empty($title)?$title:'' ?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url() ?>">Home</a>
                        </li>
                        <li class="active">
                            <strong><?php echo !empty($title)?$title:'' ?></strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-6">
                    <div class="title-action">
                        <a class="btn btn-white" href="#"><i class="fa fa-pencil"></i> Edit </a>
                        <!-- <a class="btn btn-white" href="#"><i class="fa fa-check "></i> Save </a> -->
                        <a class="btn btn-info" target="_blank" href="invoice_print.html"><i class="fa fa-print"></i> Cetak PO </a>
                        <a class="btn btn-primary" target="_blank" href="invoice_print.html"><i class="fa fa-check"></i> Buka Tagihan/Invoice </a>
                    </div>
                </div>
            </div>
	        <!-- Content -->
	        <div class="row">

	            <?php echo $main_content; ?>
	        </div>
	        <!-- End Content -->
        </div>
        <!-- End Page Wrapper -->


        <?php //$this->load->view('right-sidebar') ?>
    </div>
<?php echo $footer; ?>