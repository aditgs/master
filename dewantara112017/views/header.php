<?php if ($this->ion_auth->logged_in()): ?>

<div class="top-navigation">

    <nav class="navbar navbar-static-top" role="navigation">

        <div class="navbar-header">

            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">

                <i class="fa fa-reorder"></i>

            </button>

            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-minimalize minimalize-styl-2 btn btn-success" type="button">

                <i class="fa fa-reorder"></i>

            </button>

            <!--                     <a class="navbar-minimalize minimalize-styl-2 btn btn-success " href="#"><i class="fa fa-bars"></i> </a>



 -->

        </div>

        <div style="height: 1px;" aria-expanded="false" class="navbar-collapse collapse" id="navbar">

            <?php if($this->ion_auth->in_group(array(1,2,3))): ?>

           

            <?php endif; ?>

            <ul class="nav navbar-top-links navbar-right">

                <?php if ($this->ion_auth->logged_in()):?>

                <li>

                    <a href="<?php echo base_url('auth/logout') ?>">

                        <i class="fa fa-sign-out"></i> Log out

                    </a>

                </li>

                <?php elseif(!$this->ion_auth->logged_in()): ?>

                <li>

                    <a href="<?php echo base_url('auth/login') ?>">

                        <i class="fa fa-sign-in"></i> Login

                    </a>

                </li>

                <?php endif; ?>

            </ul>

        </div>

    </nav>

</div>

<?php endif; ?>

