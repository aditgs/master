<style type="text/css">
	thead{
       /*width:100%;*/
       /*position:fixed;*/
       /*height:109px;*/
       font-weight:bold; 
    }
    th{
        background: #ddd;
        padding:10px;
    }

</style>
<hr>
<div class="text-center">
	<h2><?php echo !empty($judul)?$judul:'' ?></h2>	
    <?php //print_r($data); ?>
    <?php //print_r($detail); ?>
	<?php if(count($data['vendor'])==1):?>
                <?php if(!empty($data['kdvendor'])||$data['kdvendor']!=null): ?>
                <h3><?php echo !empty($data['vendor'])?$data['vendor'][0]['Nama']." (".$data['vendor'][0]['Kode'].')':'' ?></h3>    
                <?php else: ?>
                <h3><?php echo !empty($data['vendor'])?$data['vendor'][0]['nama']." (".$data['vendor'][0]['kode'].')':'' ?></h3>    
                <?php endif; ?>	
    <?php else: ?>
	<h3>Semua Vendor</h3>
	<?php endif; ?>
	<h3>Periode: <?php echo !empty($data['start'])?thedate($data['start']):'' ?> - <?php echo !empty($data['end'])?thedate($data['end']):'' ?></h3>
</div>
<div class="clear-fix">
<table class="tabelvendor table table-hover table-striped table-condensed" style="width:100%">
	 <thead class="">
                                        <tr>
                                            <th style="width:10%;display: table-cell;text-align: center;vertical-align: middle;">Rekening</th>
                                            <th style="width:20%;display: table-cell;text-align: center;vertical-align: middle;">Kode</th>
                                            <th style="width:40%;display: table-cell;text-align: center;vertical-align: middle;">Pendapatan</th>
                                            <th style="width:30%;display: table-cell;text-align: center;vertical-align: middle;">Total</th>
                                         
                                           
                                        </tr>
                                       
                                       
                                    </thead>
	<tbody class="">
        <?php foreach ($detail as $key => $value): ?>
            <tr>
                <td><?php echo ($value['rekening']); ?></td>
                <td class="text-center" style="text-align:center"><?php echo ($value['kode']); ?></td>
                <td><?php echo ($value['keterangan']); ?></td>
                <td class="text-right" style="text-align:right"><?php echo ($value['totalx']); ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
</div>
