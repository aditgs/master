 <!-- Second tab content -->
 
<div class="tab-pane fade" id="outside">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="icon-table"></i> Form Mahasiswa</h3>
            <div class="btn-group pull-right">
                <a href="#inside" data-toggle="tab" class="btn btn-success"><i class="fa fa-database"></i> Data Mahasiswa</a>
                <a class="btn btn-info reset" href="#" ><i class="fa fa-refresh"></i> Reset Form</a>
            </div> 
        </div>
        <div class="panel-body">
            <div class="row clearfix">
                <?php $this->load->view('mhsmaster_form_inside') ?>

                
            </div>
        </div>
    </div>
    <!-- /second tab content -->
</div>
