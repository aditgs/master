 <!-- Second tab content -->
 
<div class="tab-pane fade" id="outside">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="icon-table"></i> Form Calon Mahasiswa</h3>
            <div class="btn-group pull-right">
                <a href="#inside" data-toggle="tab" class="btn btn-success"><i class="icon-checkbox-partial"></i> Daftar Calon Mahasiswa</a>
                <button class="btn btn-info reset" type="reset">Reset Form</button>
            </div> 
        </div>
        <div class="panel-body">
            <div class="">
                    <?php if(isset($form_view)&&!empty($form_view)):
                    $this->load->view($form_view);
                else: ?>
                    <?php
                $this->load->view('siakad_mhs_pmb_form_inside');
                endif;
                ?> 
                
               
                
            </div>
        </div>
    </div>
    <!-- /second tab content -->
</div>
