<h2>Detail Tarif</h2>
<table class="table table-hover">
	<thead>
		<tr>
			<th></th>
		</tr>
	</thead>
	<?php if(isset($data)||!empty($data)): ?>
	<tbody>
		 <tr>
		 	<th>Kode Tarif</th><td><?php echo $data['KodeT'];?></td>
		 </tr>
            <tr>
            	<th>Keterangan</th><td><?php echo bacatarif($data['KodeT']);?></td></tr>
            <tr><th>Tarif</th><td><?php echo rp($data['Tarif']);?></td></tr>
	</tbody>
	<?php else: ?>
	<tbody>
		<tr>
			<td>Tidak Ada data</td>
		</tr>
	</tbody>
	<?php endif; ?>
</table>