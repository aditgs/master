<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
            <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Tambah</a>
                            <a href="<?php echo base_url('rekeningmhs/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Rekening Baru </a>
                            <a href="<?php echo base_url('rekeningmhs') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Rekening</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data Rekening</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="width:100%">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Kode</th>
                                                        <th>Kode mahasiswa</th>
                                                        <th>Kode jurnal</th>
                                                        <th>Tanggal</th>
                                                        <th>Saldo awal</th>
                                                        <th>Debet</th>
                                                        <th>Kredit</th>
                                                        <th>Saldo</th>
                                                  
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