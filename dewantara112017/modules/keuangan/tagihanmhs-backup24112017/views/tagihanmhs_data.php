<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                           <a data-toggle="modal" href='#modal-form' class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Tagihan Baru  </a>
                            <a href="<?php echo base_url('tagihanmhs/data') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data tagihanmhs</a>
                            <a href="<?php echo base_url('tagihanmhs/validasi') ?>" class="btn btn-lg btn-primary"><i class="fa fa-check"></i> Validasi Pembayaran</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data tagihanmhs</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>kode</th>
                                                        <th>tanggal</th>
                                                        <th>mhs</th>
                                                        <th>kodebank</th>
                                                        <th>refbank</th>
                                                        <th>isbayar</th>
                                                        <th>tglbayar</th>
                                                        <th>isvalidasi</th>
                                                        <th>tglvalidasi</th>
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
                                            <td colspan="15" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>