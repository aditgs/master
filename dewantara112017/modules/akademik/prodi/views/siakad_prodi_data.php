<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">

                            <a href="<?php echo base_url('prodi/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Prodi Baru </a>
                            <a href="<?php echo base_url('prodi') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Prodi</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data Prodi</h2>

    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="width: 100%">
                                    <thead class="">
                                        <tr>
                                                       

                                                       <th>Kode Prodi</th>
                                                       <th>Kode PT</th>
                                                        <!-- <th>kode_prodi_less</th> -->
                                                        <th>Nama Prodi</th>
                                                        <th>Strata</th>
                                                        <th>Tanggal Berdiri</th>
                                                        <th>SK Prodi</th>
                                                        <th>Tgl SK</th>
                                                        <th>SKS Max</th>
                                                        <th>Status</th>
                                                        <!-- <th>sk_banpt_prodi</th> -->
                                                        <!-- <th>thn_banpt_prodi</th> -->
                                                        <!-- <th>akr_banpt_prodi</th> -->
                                                        <!-- <th>ex_banpt_prodi</th> -->
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