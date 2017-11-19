<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <!-- <img alt="image" style="width:100px;" class="img-circle" src="<?php //echo assets_url() ?>/images/pemkot.png" /> -->
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                           <?php if ($this->ion_auth->logged_in()): ?>
                                 <?php $user = $this->ion_auth->user()->row(); ?>
                                    <?php if ( ! empty($user)): ?>
                            <span class="clear"> <span class="text-muted text-xs block m-t-xs"><strong class="font-bold"><?php echo $user->id." ".$user->first_name." ".$user->last_name; ?></strong><b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                
                                <li><a href="<?php echo base_url('auth/logout') ?>">Logout</a></li>
                            </ul>
                        <?php endif;endif; ?>
                        </div>
                        <div class="logo-element">
                            SIM MURIA
                        </div>
                    </li>
                    <li >
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                             <li class="active"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
                            <!--<li ><a href="dashboard_2.html">Dashboard v.2</a></li>
                            <li ><a href="dashboard_3.html">Dashboard v.3</a></li>
                            <li ><a href="dashboard_4_1.html">Dashboard v.4</a></li> -->
                        </ul>
                    </li>
                    <?php if($this->ion_auth->in_group(1)): ?>

                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Super Administrator </span><span class="fa arrow"></span></a>
                        
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Kelola User<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <!-- <li><a href="#remote-ajax" data-load-remote="<?php //echo base_url('supplier/') ?>" data-remote-target="#remote-ajax">Kelola User</a></li> -->
                                    <li><a href="<?php echo base_url('auth') ?>">Manajemen User</a></li>
                                    <li><a href="<?php echo base_url('auth/register') ?>">Tambah User Baru</a></li>

                                </ul>
                            </li>
                        </ul>    
                    </li>
                    <?php endif; ?>

                    <?php 
                        $mainmenu=$this->menu_model->getmenus(0);
                        if(!empty($mainmenu)): 
                            // echo domain();
                            foreach ($mainmenu as $key => $value) {
                                    # code...
                                $child=$this->menu_model->getchild($value['id']);
                                echo "<li><a href='".domain().$value['module']."/".$value['url']."'><span class='nav-label'>".$value['title'];
                                if(empty($child)){
                                    echo "</span></a></li>";
  
                                }elseif(!empty($child)||$child!=null){
                                    echo "</span><span class='fa arrow  '></span></a>";
                                    echo "<ul class='nav nav-first-level'>";
                                    foreach ($child as $k => $v){
                                        // echo "<li><a href='".$v['url']."'>".$v['title']."</a>";
                                        $grandchild=$this->menu_model->getchild($v['id']);
                                            echo "<li><a href='".domain().$v['module']."/".$v['url']."'><span class='nav-label'>".$v['title'];
                                            if(empty($grandchild)){
                                                echo "</span></a></li>";
              
                                            }elseif(!empty($grandchild)||$grandchild!=null){
                                                echo "</span><span class='fa arrow  '></span></a>";
                                                echo "<ul class='nav nav-second-level'>";
                                                foreach ($grandchild as $kunci => $val){
                                                    echo "<li><a href='#'   data-remote-target='#ajax-remote' data-load-remote='".domain().$val['module']."/".$val['url']."/getdatatables'>".$val['title']."</a>";
                
                                                }
                                                echo "</ul>";
                                                echo "</li>";

                                            }   
                                    }
                                    echo "</ul>";
                                    echo "</li>";

                                }
                            }    
                        endif; ?>
                </ul>

            </div>
        </nav>