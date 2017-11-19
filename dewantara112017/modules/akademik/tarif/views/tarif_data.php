<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a data-toggle="modal" href='#modal-form' class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Tarif Baru </a>
                            
                            <a href="<?php echo base_url('tarif/data') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Tarif</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data tarif</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="width:100%">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <!-- <th>ID</th> -->
                                                        <th>KodeT</th>
                                                        <th>Tarif</th>
                                                        <th>Keterangan</th>
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

