<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('rekeningmhs/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka rekeningmhs Baru </a>
                            <a href="<?php echo base_url('rekeningmhs') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data rekeningmhs</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data rekeningmhs</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>kode</th>
                                                        <th>kodemhs</th>
                                                        <th>kodejurnal</th>
                                                        <th>tanggal</th>
                                                        <th>saldoawal</th>
                                                        <th>debet</th>
                                                        <th>kredit</th>
                                                        <th>saldo</th>
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
                                            <td colspan="14" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>