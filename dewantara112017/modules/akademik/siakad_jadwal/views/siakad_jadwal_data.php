<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('siakad_jadwal/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka siakad_jadwal Baru </a>
                            <a href="<?php echo base_url('siakad_jadwal') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data siakad_jadwal</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data siakad_jadwal</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>kode_akademik</th>
                                                        <th>kode_prodi</th>
                                                        <th>kode_mk</th>
                                                        <th>hari_jadwal</th>
                                                        <th>jam_mulai</th>
                                                        <th>jam_selesai</th>
                                                        <th>id_siakad_ruang</th>
                                                        <th>kapasitas_ruang</th>
                                                        <th>tatap_muka</th>
                                                        <th>inisial_kelas_jadwal</th>
                                                        <th>nip_dosen</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="12" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>