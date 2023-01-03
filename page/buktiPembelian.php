<div id="divToPrint">
	<div class="container mtNav">
		<div class="row">
			<div class="col">
				<img src="assets/img/d41a6_x-chan.jpg" width="90px">
			</div>
			<div class="col text-end">
				<address>
					Jl. Universitas No. 9 Pintu 1 USU <br>
					Telepon : 021 23456789 <br>
					Email : bagindaharahap355@gmail.com
				</address>
			</div>
			<?php
				if(isset($_SESSION['id_pembelian'])){
					$tanggal_detail = '';
					$pelanggan_detail = '';
					$bayar_detail = '';
					$total = 0;
					$query = "SELECT * FROM pembelian
								INNER JOIN akun ON 
							akun.id = pembelian.id_pelanggan
								WHERE pembelian.id_pembelian = '".$_SESSION['id_pembelian']."'";
					$result = mysqli_query($conn, $query);
					while($row = mysqli_fetch_array($result)){
						$tanggal = ''.$row['tanggal_pembelian'].'';
						$tanggal_detail = date('Y-m-d', strtotime($tanggal));
						$pelanggan_detail = '
							Nama :     '.$row['nama'].' <br>
							Alamat :   '.$row['alamat'].' <br>
							Kota :     '.$row['kota'].' <br>
							Provinsi : '.$row['provinsi'].' <br>
							Kode Pos : '.$row['kode_pos'].' <br>
							No. HP :   '.$row['no_hp'].'
						';
						$bayar_detail = '
							'.$row['nama'].' <br>
							'.$row['e-money'].' <br>
							'.$row['e-money_number'].' <br>
						';
					}
				}
			?>
			<div class="col-12 text-center">
				<h3>Bukti Pembelian</h3>
                <h5>Nomor Pemesanan : <?= $_SESSION['id_pembelian'] ?></h5>
			</div>
			<hr>
		</div>
		<div class="row">
			<div class="col-6">
				<strong>Detail Pemesan</strong>
				<address>
					<?= $pelanggan_detail ?>
				</address>
			</div>
			<div class="col-6 text-end">
				<strong>Tanggal Pemesanan</strong> <br>
					<?= $tanggal_detail ?> <br>
				<strong>Detail Pembayaran</strong> <br>
					<?= $bayar_detail ?>
			</div>
		</div>
		<div class="col-lg-12">
			<table width="100%" class="table table-bordered text-center align-middle border-dark">
				<thead>
					<tr class="bg-info">
						<th>No</th>
						<th colspan="2">Produk</th>
						<th>Jumlah</th>
						<th>Harga</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<?php
					$query = mysqli_query($conn, "SELECT * FROM pembelian_produk WHERE id_pembelian = '".$_SESSION['id_pembelian']."'");
					$no = 1;
					while($row = mysqli_fetch_array($query)){
						$harga = $row['harga'];
						$subtotal = $row['jumlah'] * $harga;
						$total = $total + $subtotal;
				?>
					<tr class="bg-white">
						<td><?= $no ?></td>
						<td>
                            <img src="assets/img/<?= $row['img'] ?>" width="80px">
						</td>
                        <td class="text-start">
                            Kode : <?= $row['id_produk'] ?> <br>
                            Nama : <?= $row['nama'] ?>
                        </td>
						<td><?= $row['jumlah'] ?></td>
						<td><?= 'Rp '.number_format($row['harga'],0,".",".") ?></td>
						<td><?= 'Rp '.number_format($subtotal,0,".",".") ?></td>
					</tr>
				<?php
					$no++;
					}
				?>
					<tr class="bg-white">
						<td colspan="5">T  o  t  a  l</td>
						<td><?= 'Rp '.number_format($total,0,".",".") ?></td>
					</tr>
			</table>
		<div class="col-lg-12">
			<p style="font-size:18px;">
				Silahkan Melakukan Pembayaran sebesar <?= 'Rp '.number_format($total,0,".",".") ?>,- ke <br>
				<strong>
					DANA 08983874300 A/N KyuuDent_Store. <br>
					Jika sudah, kirim bukti pembayaran ke email KyuuDent_Store supaya kami akan kirim resi pengiriman.
				</strong> <br>
				jika ada keluhan, kritik, dan saran hubungi Customer service KyuuDent_Store di nomor : 08983874300
			</p>
			<p>
				<strong style="font-size:15px;"> NB:</strong>
				simpan bukti pembelian ini sampai barang sudah terkirim kepada anda.
			</p>
		</div>
	</div>
</div>
</div>
</div>
<div class="container mb-4">
	<div class="row text-end">
		<form action="?p=buktiPembelian" method="POST">
			<input type="button" value="Print" class="btn btn-warning text-white" onclick="PrintDiv('divToPrint')">
			<input type="submit" name="finish" value="Selesai" class="btn btn-dark">
		</form>
	</div>
	<?php
		if(isset($_POST['finish'])){
			unset($_SESSION['id_pembelian']);
			echo"
				<script>
					alert('terima kasih telah belanja di KyuuDent_Store');
					document.location.href = 'inc/..';
				</script>
			";
		}
	?>
</div>