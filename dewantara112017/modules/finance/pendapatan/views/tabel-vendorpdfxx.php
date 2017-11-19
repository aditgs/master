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
	<?php //print_r($data) ?>
	<?php  ?>
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
<pre>
	<?php //print_r($data['detail']); ?>
</pre>
</div>
<div class="clear-fix">
<table class="tabelvendor table table-hover table-striped table-condensed display compact" style="width:100%">
	<thead class="">
	 	<tr>
        	<th style="width:5%;display: table-cell;text-align:center;vertical-align: middle;">No</th>
            <th style="width:20%;display: table-cell;text-align:center;vertical-align: middle;">Kode/Nama Vendor</th>
            <th style="width:20%;display: table-cell;text-align:center;vertical-align: middle;"></th>
            <th style="width:20%;display: table-cell;text-align:center;vertical-align: middle;"></th>
            <th style="width:20%;display: table-cell;text-align:center;vertical-align: middle;"></th>
            <th style="width:20%;display: table-cell;text-align:center;vertical-align: middle;"></th>
        </tr>
    </thead>
	<tbody class="table-bordered">
		<?php $i=1;foreach ($data['vendor'] as $key => $value):?>
		
		<tr style="">
			<td class="" style="text-align:center;vertical-align:middle"><?php echo $i ?></td>
		<?php if(!empty($data['kdvendor'])||$data['kdvendor']!=null): ?>
		<!-- <h3><?php //echo !empty($data['vendor'])?$data['vendor'][0]['Nama']." (".$data['vendor'][0]['Kode'].')':'' ?></h3>	 -->
			<td colspan="5"><h4><?php echo "(".$value['Kode'].") ".$value['Nama'] ?></h4>
				<?php $kdx=$value['Kode']; ?>
		<?php else: ?>
		<!-- <h3><?php //echo !empty($data['vendor'])?$data['vendor'][0]['nama']." (".$data['vendor'][0]['kode'].')':'' ?></h3>	 -->
			<td colspan="5"><h4><?php echo "(".$value['kode'].") ".$value['nama'] ?></h4>
				<?php $kdx=$value['kode']; ?>
		<?php endif; ?>
		<?php 
					
		 ?>
				<table class="table table-hover table-bordered table-striped table-condensed display compact" style="width:100%">
					<thead class="compact">
						<tr>
							<td style="width:10%;display: table-cell;text-align:center;vertical-align: middle;">Tanggal</td>
							<td style="width:10%;display: table-cell;text-align:center;vertical-align: middle;">Tempo</td>
							<td style="width:20%;display: table-cell;text-align:center;vertical-align: middle;">Faktur</td>
							<td style="width:30%;display: table-cell;text-align:center;vertical-align: middle;"></td>
							<td style="width:15%;display: table-cell;text-align:center;vertical-align: middle;"></td>
							<td style="width:15%;display: table-cell;text-align:center;vertical-align: middle;"></td>
						</tr>
						<tr style="font-weight:bold">
							<td></td>
							<td >Kode Biaya</td>
							<td>Biaya</td>
							<td>Keterangan</td>
							<td>Rekening</td>
							<td class="text-right" style="text-right">Jumlah</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							$dtx['start']=$data['start'];
							$dtx['end']=$data['end'];
							$dtx['kdvendor']=$kdx;
							$datanya=$this->earndb->getdetail($dtx);
							//print_r($datanya); 
						?>
						<?php foreach ($datanya as $k => $v): ?>
							
						<tr>
							<th class="text-center" style="text-align:center"><?php echo thedate($v['tanggal']) ?></th>
							<th class="text-center" style="text-align:center"><?php echo thedate($v['jthtempo']) ?></th>
							<th class="text-center" style="text-align:center"><?php echo $v['faktur'] ?></th>
							<th class="text-center" style="text-align:center"></th>
							<th></th>
							<th class="text-right" style="text-align:right"><?php echo rp($v['total']) ?></th>
						</tr>
						<?php 
							$dt['start']=$data['start'];
							$dt['end']=$data['end'];
							$dt['faktur']=$v['faktur'];
							$detailx=$this->earndb->getdetailpendapatan($dt);
							// print_r($detailx);
						?>
						
								<?php //echo count($detailx); ?>
							<?php foreach ($detailx as $ky => $val): ?>
							<tr>
								<td></td>	
								<td><?php echo !empty($val['kode'])?$val['kode']:'-' ?></td>
								<td><?php echo !empty($val['keterangan'])?$val['keterangan']:'-' ?></td>
								<td><?php echo !empty($val['ket'])?$val['ket']:'-' ?></td>
								<td><?php echo !empty($val['rekening'])?$val['rekening']:'-' ?></td>
								<td class="text-right" style="text-align:right"><?php echo !empty($val['jumlah'])?rp($val['jumlah']):'-' ?></td>
								
							</tr>
							<?php endforeach ?>
						<?php endforeach ?>
					</tbody>
					<?php  $rekap=$this->earndb->getrekap_vendor($data) ?>
					<tfoot>
						<tr>
							<td colspan="5" class="text-right" style="text-align:right"><h4>Total Biaya Vendor:</h4></td>
							<?php if(!empty($data['kdvendor'])||$data['kdvendor']!=null): ?>
								<td class="text-right" style="text-align:right"><h4>
									<?php //print_r($rekap);
									echo !empty($rekap[0]['totalx'])?rp($rekap[0]['totalx']):0; 
									?></h4>
								</td>
							<?php else: ?>
								<td class="text-right" style="text-align:right"><h4><?php echo rp($value['totalx']);?></h4></td>
							<?php endif; ?>
						</tr>
					</tfoot>
				</table>
			</td>
			<td style="display:none"></td>
			<td style="display:none"></td>
			<td style="display:none"></td>
			<td style="display:none"></td>
			
		</tr>
		
		<?php $i++;endforeach?>
    </tbody>
</table>
</div>
