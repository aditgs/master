
<nav class="navbar-default navbar-static-side animated slideInLeft" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element text-center"> <span class="">
                            <img alt="image" style="width:50px;" class="img-circle" src="<?= assets_url('images/fikri.jpeg') ?>" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                           <?php if ($this->ion_auth->logged_in()): ?>
                                 <?php $user = $this->ion_auth->user()->row(); ?>
                                    <?php if ( ! empty($user)): ?>
                            <span class="clear"> <span class="text-muted text-xs block m-t-xs"><strong class="font-bold"><?php echo $user->first_name." ".$user->last_name; ?></strong><b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                
                                <li><a href="<?php echo base_url('auth/logout') ?>">Logout</a></li>
                            </ul>
                        <?php endif;endif; ?>
                        </div>
                        <div class="logo-element">
                            <img alt="image" style="width:50px;" class="img-circle" src="<?= assets_url('images/logo.png') ?>" />
                        </div>
                    </li>
                  
                    <li class="active">
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                             <li class="active"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
                        </ul>
                    </li>
                    
                    
                </ul>
               
            </div>
        </nav>
  