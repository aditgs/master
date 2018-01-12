    <div class="row">
            <div class="tabbable page-tabs">
                <ul class="nav nav-tabs">
                    <li class="daftar active"><a href="#inside" data-toggle="tab"><i class="icon-checkbox-partial"></i> Daftar files</a></li>
                    <li class="baru"><a href="#outside" data-toggle="tab"><i class="icon-plus"></i> Tambah files Baru</a></li>
                </ul>
                <div class="tab-content">
                    
                    <!-- First tab content -->
                    <div class="tab-pane active fade in" id="inside">
                        <!-- AJAX source -->
                        <div class="panel panel-default">
                            <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Daftar files</h6></div>
                            <div class="datatable-ajax-source">
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="font-size:11px;">
                                    <thead class="">
                                        <tr>
                                                        <th>ID</th>
                                                        <th>Nama File</th>
                                                        <th>Gambar</th>
                                                        <th>URL</th>
                                                        <th>Album</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="6" class="dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data...</td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /saving state -->

                    </div>
                    <!-- /first tab content -->


                    <!-- Second tab content -->
                    <div class="tab-pane fade" id="outside">


                     <?php $this->load->view('files_form'); ?>
                        

                    </div>
                    <!-- /second tab content -->


                    

                </div>

            </div>
    </div>
</div>


        <div class="row clearfix">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

               
                
            
            </div>
        </div>
        
<!--     </div>
</div> -->
