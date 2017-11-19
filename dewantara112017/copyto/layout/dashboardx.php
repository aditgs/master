<div id="wrapper">
        <?php $this->load->view('sidebar'); ?>

        <div id="page-wrapper" class="gray-bg dashbard-1">
                 <div class="top-navigation">

        <nav class="navbar navbar-static-top" role="navigation">
          
            <div style="height: 1px;" aria-expanded="false" class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a aria-expanded="false" role="button" href="layouts.html"> Back to main Layout page</a>
                    </li>
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Menu item <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="#">Menu item</a></li>
                            <li><a href="#">Menu item</a></li>
                            <li><a href="#">Menu item</a></li>
                            <li><a href="#">Menu item</a></li>
                        </ul>
                    </li>
                    <li class="dropdown open">
                        <a aria-expanded="true" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Menu item <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="#">Menu item</a></li>
                            <li><a href="#">Menu item</a></li>
                            <li><a href="#">Menu item</a></li>
                            <li><a href="#">Menu item</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Menu item <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="#">Menu item</a></li>
                            <li><a href="#">Menu item</a></li>
                            <li><a href="#">Menu item</a></li>
                            <li><a href="#">Menu item</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Menu item <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="#">Menu item</a></li>
                            <li><a href="#">Menu item</a></li>
                            <li><a href="#">Menu item</a></li>
                            <li><a href="#">Menu item</a></li>
                        </ul>
                    </li>

                </ul>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="login.html">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        
            </div>
	       	<?php echo $header; ?>
	       	<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                   
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