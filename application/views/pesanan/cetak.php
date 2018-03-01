<script src=<?= base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
    function cetak(){
        window.print();
    }
</script>
<button onclick="cetak()">Cetak</button>
<a>Kode Pesan : <?= $this->uri->segment(3) ?></a>
<table border="1">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Menu</th>
			<th>Harga</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$no =1;
			foreach ($detail as $key => $d){
		?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $d->nama_menu ?></td>
			<td><?= $d->harga ?></td>
		</tr>
		<?php 
			$no++;
			}
		?>
		<tr>
			<td colspan=2>Sub Total</td>
			<?php 
				foreach ($bayar as $key => $b){
			?>
			<td><?= $b->amount_paid ?></td>
			<?php } ?>
		</tr>
	</tbody>
</table>
<a>Terimakasih, Have a nice day :)</a>