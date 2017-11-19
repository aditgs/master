<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('pendapatan_detail/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka pendapatan_detail Baru </a>
                            <a href="<?php echo base_url('pendapatan_detail') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data pendapatan_detail</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data pendapatan_detail</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>faktur</th>
                                                        <th>tanggal</th>
                                                        <th>kode</th>
                                                        <th>keterangan</th>
                                                        <th>rekening</th>
                                                        <th>ket</th>
                                                        <th>jumlah</th>
                                                        <th>status</th>
                                                        <th>isdeleted</th>
                                                        <th>datedeleted</th>
                                                        <th>islocked</th>
                                                        <th>isactive</th>
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