<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('pendapatan') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka pendapatan Baru </a>
                            <a href="<?php echo base_url('pendapatan/data') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data pendapatan</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data pendapatan</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Faktur</th>
                                                        <th>Tgl</th>
                                                        <th>Jthtmp</th>
                                                        <th>Customer</th>
                                                        <th>NmCustomer</th>
                                                        <th>StCust</th>
                                                        <th>Alamat</th>
                                                        <th>NoAccCust</th>
                                                        <th>Total</th>
                                                        <th>Tunai</th>
                                                        <th>Piutang</th>
                                                        <th>Lunas</th>
                                                        <th>DiscLunas</th>
                                                        <th>Sisa</th>
                                                        <th>SLunas</th>
                                                        <th>SDiscLunas</th>
                                                        <th>Status</th>
                                                        <th>Kas</th>
                                                        <th>Bank</th>
                                                        <th>KodeBank</th>
                                                        <th>NoAccBank</th>
                                                        <th>JenisBayar</th>
                                                        <th>NoBukti</th>
                                                        <th>JthTmpGiro</th>
                                                        <th>cNoJrn</th>
                                                        <th>lVoid</th>
                                                        <th>lPosted</th>
                                                        <th>isdeleted</th>
                                                        <th>datedeleted</th>
                                                        <th>islocked</th>
                                                        <th>isactive</th>
                                                        <th>userid</th>
                                                        <th>User</th>
                                                        <th>datetime</th>
                                                        <th>Time</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="36" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>