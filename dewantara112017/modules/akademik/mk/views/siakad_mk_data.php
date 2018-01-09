<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('mk/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka siakad_mk Baru </a>
                            <a href="<?php echo base_url('mk') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data siakad_mk</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data siakad_mk</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Id Kurikulum</th>
                                                        <th>Kode Prodi</th>
                                                        <th>Nama Mata Kuliah</th>
                                                        <th>Jenis Mata Kuliah</th>
                                                        <th>Kurikulum Mata Kuliah</th>
                                                        <th>Kelompok Mata Kuliah</th>
                                                        <th>SKS Mata Kuliah</th>
                                                        <th>SKS Tatap Muka</th>
                                                        <th>SKS Praktikum</th>
                                                        <th>Minimal MK Lulus</th>
                                                        <th>Status MK</th>
                                                        <th>Upload Silabus MK</th>
                                                        <th>Upload SAP MK</th>
                                                        <th>Upload Bahan MK</th>
                                                        <th>Upload DIktat MK</th>
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