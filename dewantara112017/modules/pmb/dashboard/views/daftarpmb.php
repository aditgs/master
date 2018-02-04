<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Data Pendaftar Terbaru</h5>
            <div class="ibox-tools">
                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                <a class="close-link"><i class="fa fa-times"></i></a>
            </div>
        </div>

        <div class="ibox-content">
            <table class="table table-hover no-margins">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Date</th>
                        <th>Memo/Rekom</th>
                      
                    </tr>
                </thead>
                       
        
                <tbody>
                   <?php if(!empty($lastpmb)):foreach ($lastpmb as $key => $value):?>
                    <tr>
                        <td><?php echo $value['nm_cmhs'] ?></td>
                        <td><i class="fa fa-calendar"></i> <?php echo thedate($value['tgl_reg_pmb']) ?></td>
                        <td><?php echo $value['memo'] ?></td>
                        
                        
                    </tr>
                   <?php endforeach;?>

               <?php else:?>
                <tr><td colspan="3" class="text-center">
                    
                    <h3>Data belum tersedia</h3>
                </td></tr>
               <?php endif;?>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>