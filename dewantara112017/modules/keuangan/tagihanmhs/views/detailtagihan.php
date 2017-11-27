<?php 
if(isset($data)){?>
<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>No. Tagihan</th>
			<td>#<?php echo $data['kode'] ?></td>
			<th>sat</th>
			<th>sat</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td></td>
		</tr>
	</tbody>
</table>
<?php

}else{
	echo "<h1>Data tidak ditemukan</h1>";
}
?>

