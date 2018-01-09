<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('kelas/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Kelas Baru </a>
                            <a href="<?php echo base_url('kelas') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Kelas</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data Kelas</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Tahun Akademik</th>
                                                        <th>Kelas</th>
                                                        <th>Nama Kelas</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="4" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>