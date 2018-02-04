    <?php //print_r($stat) ?>
<div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">Gelombang 1</span>
                    <h5>Total Pendaftar</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">
                    <?php echo (!empty($stat[0]['jmltotal'])||isset($stat[0]['jmltotal']))?$stat[0]['jmltotal']:'0';?> Orang
                    </h1>
                    <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                    <small>Total Calon Mahasiswa</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">Gelombang 1</span>
                    <h5>Prodi Akuntansi</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">
                    <?php echo (!empty($stat[0]['prodi_ak'])||isset($stat[0]['prodi_ak']))?$stat[0]['prodi_ak']:'0';?> Orang
                    </h1>
                   <div class="stat-percent font-bold text-navy"><?php echo (!empty($stat[0]['pmb_ak_prosen'])||isset($stat[0]['pmb_ak_prosen']))?$stat[0]['pmb_ak_prosen']:'0';?>% <i class="fa fa-level-up"></i></div>
                     <small>Calon Mahasiswa</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">Gelombang 1</span>
                    <h5>Prodi Manajemen</h5>
                </div>
                <div class="ibox-content">
                <h1 class="no-margins">
                    <?php echo (!empty($stat[0]['prodi_man'])||isset($stat[0]['prodi_man']))?$stat[0]['prodi_man']:'0';?> Orang
                    </h1>                    
                    <div class="stat-percent font-bold text-navy"><?php echo (!empty($stat[0]['pmb_man_prosen'])||isset($stat[0]['pmb_man_prosen']))?$stat[0]['pmb_man_prosen']:'0';?>% <i class="fa fa-level-up"></i></div>
                     <small>Calon Mahasiswa</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">Low value</span>
                    <h5>User activity</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">80,600</h1>
                    <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                    <small>In first month</small>
                </div>
            </div>
        </div>