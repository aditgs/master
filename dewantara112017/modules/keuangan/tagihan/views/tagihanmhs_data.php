<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('tagihanmhs/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka tagihanmhs Baru </a>
                            <a href="<?php echo base_url('tagihanmhs') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data tagihanmhs</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data tagihanmhs</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>kode</th>
                                                        <th>tanggal</th>
                                                        <th>tgltempo</th>
                                                        <th>mhs</th>
                                                        <th>kodebank</th>
                                                        <th>idpaket</th>
                                                        <th>status</th>
                                                        <th>dateopen</th>
                                                        <th>dateclosed</th>
                                                        <th>refbank</th>
                                                        <th>isbayar</th>
                                                        <th>tglbayar</th>
                                                        <th>isvalidasi</th>
                                                        <th>tglvalidasi</th>
                                                        <th>isactive</th>
                                                        <th>islocked</th>
                                                        <th>isdeleted</th>
                                                        <th>datedeleted</th>
                                                        <th>userid</th>
                                                        <th>datetime</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="21" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>