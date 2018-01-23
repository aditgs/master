 <div class="container">
     

 
 <div class="row" style="margin-top:20px;margin-bottom:100px;">
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
        <div class="col-xs-12 col-sm-12 col-md-4">

        <!--     <div class="middle-box text-center loginscreen  animated fadeInDown">
                <div> -->
                    <div class="panel panel-default" style="">
                    <div class="panel-body">
                 
                    <h3><?= isset($title)?$title:'' ?></h3>
                    <p><?= isset($desc)?$desc:'' ?></p>
                    <p><? //= isset($token)?$token:'' ?></p>
                    <?php if(isset($post)||!empty($post)): ?>
                         <?php if(!empty($msg)||isset($msg)): ?>
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Information:</strong> <?php echo base64_decode($msg);?>
                        </div>
                        <?php endif; ?>
                    <form class="m-t" role="form" method="POST" action="<?php echo !empty($post)?$post:'' ?>">
                        <div class="form-group">
                            <input type="hidden" value="<?php echo !empty($token)?$token:'' ?>" name="token">
                            <input type="text" class="form-control" placeholder="Username" name="username" required="">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" name="email" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password" required="">
                        </div>
                     
                
                        <!-- <input type="submit" name="submit" class="btn btn-primary block full-width m-b" value"Submit"> -->
                        <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg" value="submit">
                        <p class="text-muted text-center"><small>Already have an account?</small></p>
                        <a class="btn btn-sm btn-success btn-block" href="<?php echo !empty($loginurl)?$loginurl:'' ?>">Login</a> 
                    </form>
                <?php else: ?>
                        <?php if(!empty($msg)||isset($msg)): ?>
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Information:</strong> <?php echo base64_decode($msg);?>
                        </div>
                        <?php endif; ?>
                        <p class="text-muted text-center"><small>Already have an account?</small></p>
                        <a class="btn btn-sm btn-success btn-block" href="<?php echo !empty($loginurl)?$loginurl:'' ?>">Login</a>
            <?php endif; ?>
                </div>
            </div>
        </div> 
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        
        </div>
</div>
</div>