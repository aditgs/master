<div class="tabbable page-tabs">
    <ul class="nav nav-tabs">
        <li class="daftar active"><a href="#inside" data-toggle="tab"><i class="icon-checkbox-partial"></i> Daftar Calon Mahasiswa</a></li>
        <li class="baru"><a href="#outside" data-toggle="tab"><i class="icon-plus"></i> Tambah Calon Mahasiswa Baru</a></li>
    </ul>
    <div class="tab-content">
        
        <!-- First tab content -->
        <div class="tab-pane active fade in" id="inside">
            <!-- AJAX source -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-table"></i> Daftar Calon Mahasiswa</h6>
                </div>
                <div class="panel-body">
                  
                    <?php $this->load->view('datacalonmhs') ?>
                </div>
            </div>
            <!-- /saving state -->
        </div>
        <!-- /first tab content -->
        <?php $this->load->view('siakad_mhs_pmb_form') ?>
    </div>
</div>
