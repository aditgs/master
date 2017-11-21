<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('siakad_nilai/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka siakad_nilai Baru </a>
                            <a href="<?php echo base_url('siakad_nilai') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data siakad_nilai</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data siakad_nilai</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>kode_akademik</th>
                                                        <th>kode_prodi</th>
                                                        <th>nilai_huruf</th>
                                                        <th>nilai_bobot</th>
                                                        <th>bts_nilai_awal</th>
                                                        <th>bts_nilai_akhir</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="7" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>