<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('siakad_mk/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka siakad_mk Baru </a>
                            <a href="<?php echo base_url('siakad_mk') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data siakad_mk</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data siakad_mk</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>id_siakad_kurikulum</th>
                                                        <th>kode_prodi</th>
                                                        <th>nm_mk</th>
                                                        <th>jns_mk</th>
                                                        <th>kurikulum_mk</th>
                                                        <th>kelompok_mk</th>
                                                        <th>sks_mk</th>
                                                        <th>sks_tatapmuka</th>
                                                        <th>sks_praktikum</th>
                                                        <th>min_mk_lulus</th>
                                                        <th>status_mk</th>
                                                        <th>upload_silabus_mk</th>
                                                        <th>upload_sap_mk</th>
                                                        <th>upload_bahan_mk</th>
                                                        <th>upload_diktat_mk</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="16" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>