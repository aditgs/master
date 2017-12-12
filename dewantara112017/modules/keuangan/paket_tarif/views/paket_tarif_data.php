<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('paket_tarif/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka paket_tarif Baru </a>
                            <a href="<?php echo base_url('paket_tarif') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data paket_tarif</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data paket_tarif</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>kodepaket</th>
                                                        <th>kodetarif</th>
                                                        <th>isactive</th>
                                                        <th>isdeleted</th>
                                                        <th>datedeleted</th>
                                                        <th>userid</th>
                                                        <th>datetime</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="8" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>