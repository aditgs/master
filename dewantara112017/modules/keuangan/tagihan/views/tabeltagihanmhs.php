<p>Tagihan (T <i class='fa fa-arrow-right'></i> V): T = Tagihan, V = Validasi </p>
<table id="datatables" class="tabletagihanmhs table table-bordered table-condensed table-striped" style="width:100%">
        <thead class="">
            <tr>
                <th style="width:5%" class="text-center">No</th>
            
                <th style="width:30%" class="text-center">Mahasiswa/NIM</th>
                <th style="width:10%" class="text-center">Tagihan (T <i class='fa fa-arrow-right'></i> V)</th>
                <th style="width:10%" class="text-center">Total</th>
                <th style="width:10%" class="text-center">Selisih</th>
            
            </tr>
        </thead>
        <?php if(isset($data)):$i=1; ?>
            <?php //print_r($data); ?>
            <?php foreach ($data as $key => $value): ?>
                <tr>
                    <th class="text-center"><?= $i ?></th>
                    <th class="text-left"><?= "(".$value['nim'].") ".$value['namamhs'] ?></th>
                    <th class="text-center"><?= "<span class='label label-success'>".($value['jtag'])."</span> <i class='fa fa-arrow-right'></i> <span class='label label-primary'>".($value['jval'])."</span> | <span class='label label-danger'>".$value['jnoval']."</span>" ?></th>
                    <th class="text-right"><?= rp($value['totalmhs']) ?></th>
                    <th class="text-right"><?= rp($value['tdethutangdb']) ?></th>
                    
                </tr>
                <?php if(!empty($isdetail)||$isdetail!=false||$isdetail!=null): ?>
                    <tr>
                        <td colspan="6">detail</td>
                    </tr>
                <?php endif; ?>
            <?php $i++;endforeach; ?>
        <?php else: ?>
        <tbody class="table-bordered">
            <tr>
                <td colspan="3" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
            </tr>
        </tbody>
    <?php endif; ?>
    </table>
<script type="text/javascript">
    $(document).ready(function(){

        $('.tabletagihanmhs').DataTable({});
    });
</script>