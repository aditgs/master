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
<?php //echo count($data['vendor']); ?>
	<?php 
// echo "<pre>";
	// print_r($detail); 
	// print_r($data['vendor']);	
// echo "</pre>";
	?>
<div class="text-center">
	<h2><?php echo !empty($judul)?$judul:'' ?></h2>	

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
<table class="tabelvendor table table-hover table-striped table-condensed">
	 <thead class="">
                                        <tr>
                                            <th style="width:10%;display: table-cell;text-align: center;vertical-align: middle;">Tipe</th>
                                            <th style="width:40%;display: table-cell;text-align: center;vertical-align: middle;">Kode/Nama Vendor</th>
                                            <th style="width:20%;display: table-cell;text-align: center;vertical-align: middle;">Rekening</th>
                                            <th style="width:30%;display: table-cell;text-align: center;vertical-align: middle;">Total</th>
                                         
                                           
                                        </tr>
                                       
                                       
                                    </thead>
	<tbody class="table-bordered">
                                        <tr>
                                            <td colspan="4" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
</table>
</div>
<?php 
$data['mulai']=$data['start'];
$data['akhir']=$data['end'];
unset($data['vendor']); 
unset($data['start']); 
unset($data['end']); 
?>
<script type="text/javascript">
	
		var dtx=<?php echo json_encode($data); ?>;
		
		$(".tabelvendor").DataTable({
                "ajax": {
                    "url": baseurl + 'laporan/getdatarekap/',
                    "dataType": "json",
                    "data": dtx
                    ,
                },
                'iDisplayLength':50,
                "sServerMethod": "POST",
                "bServerSide": true,
                "bAutoWidth": true,
                "SortClasses": true,
                "bscrollCollapse": true,
                "paging": true,
                "deferRender": true,
                "bFilter": true,
                "ordering": true,
              
            });
</script>