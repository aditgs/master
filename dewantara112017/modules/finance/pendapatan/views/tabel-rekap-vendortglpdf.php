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
    // $detail=$this->costdb->getvendor($data['kdvendor']);
// echo "<pre>";
	    // print_r($detail); 
	// print_r($data);	
// echo "</pre>";
	?>
<div class="text-center">
	<h2><?php echo !empty($judul)?$judul:'' ?></h2>	

	<?php if(count($data['vendor'])==1):?>
	<h3><?php echo !empty($data['vendor'])?"(".$data['vendor'][0]['Nama'].") ".$data['vendor'][0]['Nama']:'' ?></h3>	
	<?php else: ?>
	<h3>Semua Vendor</h3>
	<?php endif; ?>
	<h3>Periode: <?php echo !empty($data['mulai'])?thedate($data['mulai']):'' ?> - <?php echo !empty($data['akhir'])?thedate($data['akhir']):'' ?></h3>
</div>
<div class="clear-fix">
<table class="tabelvendor table table-hover table-striped table-condensed" style="100%">
	 <thead class="">
                                        <tr>
                                            <th style="width:10%;display: table-cell;text-align: center;vertical-align: middle;">Tipe</th>

                                            <th style="width:30%;display: table-cell;text-align: center;vertical-align: middle;">Total</th>
                                         
                                           
                                        </tr>
                                       
                                       
                                    </thead>
	<tbody class="table-bordered">
        <?php foreach ($detail as $key => $value): ?>
            
        <tr>
            <td><?php echo $value['Tanggal'] ?> </td>
            <td class="text-right" style="text-align:right"><?php echo ($value['totalx']) ?> </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
</div>

<script type="text/javascript">
	$('.tabelvendor').DataTable();
	
</script>