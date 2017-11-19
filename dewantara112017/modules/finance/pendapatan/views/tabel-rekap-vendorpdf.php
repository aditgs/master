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
<?php //print_r($data); ?>
	<?php 
    $detail=$this->earndb->getvendor($data['kdvendor']);
echo "<pre>";
	print_r($detail); 
	// print_r($data);	
echo "</pre>";
	?>
<div class="text-center">
	<h2><?php echo !empty($judul)?$judul:'' ?></h2>	

	<?php if(count($data['vendor'])==1):?>
	<h3><?php echo !empty($data['vendor'])?"(".$data['vendor'][0]['Nama'].") ".$data['vendor'][0]['Nama']:'' ?></h3>	
	<?php else: ?>
	<h3>Semua Vendor</h3>
	<?php endif; ?>
	<h3>Periode: <?php echo !empty($data['start'])?thedate($data['start']):'' ?> - <?php echo !empty($data['end'])?thedate($data['end']):'' ?></h3>
</div>
<div class="clear-fix">
<table class="tabelvendor table table-hover table-striped table-condensed">
	 <thead class="">
                                        <tr>
                                            <th style="width:10%;display: table-cell;text-align: center;vertical-align: middle;">Tipe</th>
                                            <th style="width:40px;display: table-cell;text-align: center;vertical-align: middle;">Kode/Nama Vendor</th>
                                            <th style="width:20px;display: table-cell;text-align: center;vertical-align: middle;">Rekening</th>
                                            <th style="width:30px;display: table-cell;text-align: center;vertical-align: middle;">Total</th>
                                         
                                           
                                        </tr>
                                       
                                       
                                    </thead>
	<tbody class="table-bordered">
        <?php if(array_key_exists('id',$detail)):
        $rekap=$this->earndb->getrekap_vendor($data);
         ?>
         <tr>
            <td colspan="4"><?php print_r($rekap); ?></td>
         </tr>
        <tr>
            <td><?php echo ($detail['nmtipe']) ?></td>
            <td><?php echo $detail['Nama']." (".$detail['Kode'].")" ?></td>
            <td><?php echo ($rekap[0]['noacc']) ?></td>
            <td><?php echo rp($rekap[0]['totalx']) ?></td>
        </tr>
        <?php else: ?>
        
        <?php 
        print_r($detail);
        // foreach ($detail as $key => $value):

        // $datax=$data
        $rekap=$this->earndb->getrekap_vendor($data);
            // print_r($rekap);
        ?><tr>
            <td colspan="4"><?php print_r($rekap); ?></td>
         </tr>
            <tr>
                <td><?php //echo ($value['nmtipe']) ?></td>
                <td><?php //echo $value['Nama']." (".$value['Kode'].")" ?></td>
                <td><?php //echo ($rekap['noacc']) ?></td>
                <td><?php //echo ($rekap['totalx']) ?></td>
            </tr>
        <?php //endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
</div>

<script type="text/javascript">
	$('.tabelvendor').DataTable();
	
</script>