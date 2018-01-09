<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('jadwal/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Jadwal Baru </a>
                            <a href="<?php echo base_url('jadwal') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Jadwal</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data Jadwal</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Kode Akademik</th>
                                                        <th>Kode Prodi</th>
                                                        <th>Kode Mk</th>
                                                        <th>Hari Jadwal</th>
                                                        <th>Jam Mulai</th>
                                                        <th>Jam Selesai</th>
                                                        <th>Id Ruang</th>
                                                        <th>Kapasitas Ruang</th>
                                                        <th>Tatap muka</th>
                                                        <th>Inisial Jadwal Kelas</th>
                                                        <th>NIP Dosen</th>
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