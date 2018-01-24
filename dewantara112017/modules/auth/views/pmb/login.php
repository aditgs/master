<div class="container">
    

<div class="row" style="margin-top:40px;">
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="text-center"> </p>
            <p class="text-center"><img width="150px" src="<?= assets_url('images/logo.png')?>"> </p>
            <h1 class="text-center">SISTEM PENERIMAAN MAHASISWA BARU</h1>
            <h3 class="text-center">STIE PGRI DEWANTARA JOMBANG</h3>
            <p class="text-center"><a class="btn btn-lg btn-warning" href="<?php echo base_url('pmb/register') ?>">DAFTAR</a></p>
            <h3>Informasi PMB</h3>
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading">List group item heading</h4>
                    <p class="list-group-item-text">Content goes here</p>
                </a>
            </div>
            <div class="list-group">
                <a href="#" class="list-group-item active">Pengumuman Penerimaan Mahasiswa Baru<label class="pull-right">11/01/2018</label></a>
                <a href="#" class="list-group-item">Item 2</a>
                <a href="#" class="list-group-item">Item 3</a>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    
    <div class="panel panel-default" style="">
        <div class="panel-body">
            
            <h1><?php echo lang('login_heading');?></h1>
    <p><?php echo lang('login_subheading');?></p>

    <div <?php ( ! empty($message)) && print('class="alert alert-info"'); ?> id="infoMessage"><?php echo $message;?></div>

          
    <?php echo form_open("auth/login");?>

        <p>
            <?php echo lang('login_identity_label', 'identity');?>
            <?php echo bs_form_input($identity);?>
        </p>

        <p>
            <?php echo lang('login_password_label', 'password');?>
            <?php echo bs_form_input($password);?>
        </p>

        <p>
            <?php echo lang('login_remember_label', 'remember');?>
            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
        </p>

        <p><?php echo bs_form_submit('submit', lang('login_submit_btn'));?></p>

    <?php echo form_close();?>


    <p><a href="auth/forgot_password" rel="async" ajaxify="<?php echo site_url('auth/auth_ajax/ion_auth_dialog/forgot_password'); ?>"><?php echo lang('login_forgot_password');?></a></p>
        
        </div>
    </div>
    </div>

</div>
</div>