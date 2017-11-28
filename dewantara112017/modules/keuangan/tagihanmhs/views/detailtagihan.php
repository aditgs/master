<?php 
if(isset($data)){ $detail=$this->tagihdb->gettagihan($data['id']); print_r($detail)?>
<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>No. Tagihan</th>
			<td>#<?php echo $data['kode'] ?></td>
			<th>Tanggal</th>
			<th><?php echo thedate($data['tanggal']) ?></th>
		</tr>
		<tr>
			<th>Nama/NIM</th>
			<td><?php echo $detail['nmmhs']." (".$detail['nimmhs'].")" ?></td>
			<th>Tempo</th>
			<th><?php echo thedate($data['tgltempo']) ?></th>
		</tr>

	</thead>
	<tbody>
		<tr>
			<th colspan="2">Keterangan Detail Tagihan</th>
			<th colspan="2" >Total Tagihan</th>
		</tr>
		<tr>
			<td colspan="2"><?php echo getmultipaket($data['id']); ?></td>
			<td colspan="2" class="text-right"><?php echo getmultipaket($data['id']); ?></td>
		</tr>
	</tbody>
</table>
<?php

}else{
	echo "<h1>Data tidak ditemukan</h1>";
}
?>

