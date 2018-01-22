<table id="datatables" class="tabeldetail table table-striped" style="width:100%">
        <thead class="">
            <tr>
                <th style="width:5%" class="text-center">No</th>
            
                <th style="width:40%" class="text-center">Kode Tarif</th>
                <th style="width:10%" class="text-center">SubTotal</th>
               
            
            </tr>
        </thead>
        <?php if(isset($detail)):$i=1; ?>
            <?php //print_r($detail); ?>
            <?php foreach ($detail as $key => $value): ?>
                <tr>
                    <td class="text-center"><?= $i ?></td>
                    <td class="text-left"><?= "(".$value['kodetarif'].") ".(bacatarif($value['kodetarif'])) ?></td>
                    <td class="text-right"><?= rp($value['tarif']) ?></td>
               
                    
                </tr>
                
            <?php $i++;endforeach; ?>
        <?php else: ?>
        <tbody class="table-bordered">
            <tr>
                <td colspan="3" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
            </tr>
        </tbody>
    <?php endif; ?>
    </table>
