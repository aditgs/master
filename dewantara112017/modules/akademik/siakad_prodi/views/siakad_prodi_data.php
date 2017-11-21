<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('siakad_prodi/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka siakad_prodi Baru </a>
                            <a href="<?php echo base_url('siakad_prodi') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data siakad_prodi</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data siakad_prodi</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>kode_pt</th>
                                                        <th>kode_prodi_less</th>
                                                        <th>nm_prodi</th>
                                                        <th>strata_prodi</th>
                                                        <th>tgl_prodi</th>
                                                        <th>sk_prodi</th>
                                                        <th>tgl_sk_prodi</th>
                                                        <th>sks_prodi</th>
                                                        <th>status_prodi</th>
                                                        <th>sk_banpt_prodi</th>
                                                        <th>thn_banpt_prodi</th>
                                                        <th>akr_banpt_prodi</th>
                                                        <th>ex_banpt_prodi</th>
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