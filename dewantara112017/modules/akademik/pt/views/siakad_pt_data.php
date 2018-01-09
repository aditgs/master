<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('pt/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Perguruan Tinggi Baru </a>
                            <a href="<?php echo base_url('pt') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Perguruan Tinggi</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data Perguruan Tinggi</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Nama Perguruan Tinggi</th>
                                                        <th>Tanggal Perguruan Tinggi</th>
                                                        <th>SK Perguruan Tinggi</th>
                                                        <th>Tanggal SK Perguruan Tinggi</th>
                                                        <th>Alamat Perguruan Tinggi</th>
                                                        <th>Kota Perguruan Tinggi</th>
                                                        <th>Kodepos Perguruan Tinggi</th>
                                                        <th>Telp Perguruan Tinggi</th>
                                                        <th>Fax Perguruan Tinggi</th>
                                                        <th>Email Perguruan Tinggi</th>
                                                        <th>Web Perguruan Tinggi</th>
                                                        <th>Logo Perguruan Tinggi</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="13" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>