 <!-- Second tab content -->
 
<div class="tab-pane fade" id="outside">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="icon-table"></i> Form Prodi Struktur Jabatan</h3>
            <div class="btn-group pull-right">
                <a href="#inside" data-toggle="tab" class="btn btn-success"><i class="icon-checkbox-partial"></i> Daftar Prodi Struktur Jabatan</a>
                <button class="btn btn-info reset" type="reset">Reset Form</button>
            </div> 
        </div>
        <div class="panel-body">
            <div class="row clearfix">
                <?php $this->load->view('siakad_prodi_struk_jbt_form_inside') ?>

                
            </div>
        </div>
    </div>
    <!-- /second tab content -->
</div>
