<div class="container">
    

<div class="row" style="margin-top:40px;">
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
    <div class="panel panel-primary">
        <div class="panel-body">
                <p class="text-center"> </p>
            <p class="text-center"><img width="150px" src="<?= assets_url('images/logo.png')?>"> </p>
            <h1 class="text-center">SIM PMB </h1>
            <h2 class="text-center">STIE PGRI DEWANTARA</h2>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    
    <div class="panel panel-default" style="">
        <div class="panel-body">
        
            <h1><?php echo lang('login_heading');?></h1>
    <p><?php echo lang('login_subheading');?></p>

    <div <?php ( ! empty($message)) && print('class="alert alert-info"'); ?> id="infoMessage"><?php echo $message;?></div>

          
    <?php echo form_open("auth/pmb/login");?>

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


    <p><a href="auth/pmb/forgot_password" rel="async" ajaxify="<?php echo site_url('auth/auth_ajax/ion_auth_dialog/forgot_password'); ?>"><?php echo lang('login_forgot_password');?></a></p>
        
        </div>
    </div>
    </div>

</div>
</div>