<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('prodi/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka prodi Baru </a>
                            <a href="<?php echo base_url('prodi') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data prodi</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data prodi</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="width:100%">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Prodi</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="3" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>