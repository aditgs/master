<table id="datatables" class="table table-bordered table-condensed table-striped" style="width:100%">
        <thead class="">
            <tr>
                <th style="width:5%" class="text-center">No</th>
            
                <th style="width:30%" class="text-center">Mahasiswa/NIM</th>
                <th style="width:10%" class="text-center">Total</th>
                <th style="width:10%" class="text-center">Tervalidasi</th>
                <th style="width:10%" class="text-center">Selisih</th>
            
            </tr>
        </thead>
        <?php if(isset($data)):$i=1; ?>
            <?php //print_r($data); ?>
            <?php foreach ($data as $key => $value): ?>
                <tr>
                    <th class="text-center"><?= $i ?></th>
                    <th class="text-left"><?= "(".$value['nimmhs'].") ".$value['nmmhs'] ?></th>
                    <th class="text-right"><?= rp($value['totalmhs']) ?></th>
                    <th class="text-right"><?= rp($value['totalmhs']) ?></th>
                    <th class="text-right"><?= rp($value['totalmhs']) ?></th>
                    
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
