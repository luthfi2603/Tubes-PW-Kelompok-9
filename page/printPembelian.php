<div class="container mtNav">
    <div class="row">
        <div class="text-end">
            <button class="btn btn-info" onclick="PrintDiv('divToPrint')">Print</button>
        </div>
        <div id="divToPrint">
            <div class="row mt-4">
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
                        $tanggal_detail = '';
                        $pelanggan_detail = '';
                        $bayar_detail = '';
                        $total = 0;
                        $query = "SELECT * FROM pembelian INNER JOIN akun ON akun.id = pembelian.id_pelanggan WHERE pembelian.id_pembelian = '".$_GET['id']."'";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result)){
                            $tanggal = ''.$row['tanggal_pembelian'].'';
                            $tanggal_detail = date('Y-m-d', strtotime($tanggal));
                            $pelanggan_detail = '
                                Nama :      '.$row['nama'].'<br/>
                                Alamat :	'.$row['alamat'].'<br/>
                                Kota :		'.$row['kota'].'<br/>
                                Provinsi :	'.$row['provinsi'].'<br/>
                                Kode Pos :	'.$row['kode_pos'].'<br/>
                                No. HP :	'.$row['no_hp'].'
                            ';
                            $bayar_detail = '
                                '.$row['nama'].'<br/>
                                '.$row['e-money'].'<br/>
                                '.$row['e-money_number'].'<br/>
                            ';
                        }
                    ?>
                <div class="col-12 text-center">
                    <h3>Faktur Pemesanan</h3>
                    <h5>Nomor Pemesanan : <?= $_GET['id']; ?></h5>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="col-6">
                    <strong>Detail Pemesan</strong>
                    <address>
                        <?= $pelanggan_detail; ?>
                    </address>
                </div>
                <div class="col-6 text-end">
                    <strong>Tanggal Pemesanan</strong> <br>
                        <?= $tanggal_detail; ?> <br>
                    <strong>Detail Pembayaran</strong> <br>
                        <?= $bayar_detail; ?>
                </div>
            </div>
            <div class="col-12">
                <table width="100%" class="table table-bordered text-center align-middle border-dark mb-5">
                    <thead>
                        <tr class="bg-ijo">
                            <th>No</th>
                            <th colspan="2">Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <?php
                        $query = mysqli_query($conn, "SELECT * FROM pembelian_produk WHERE id_pembelian = '".$_GET['id']."'");
                        $no = 1;
                        while($row = mysqli_fetch_array($query)){
                            $harga = $row['harga'];
                            $subtotal = $row['jumlah'] * $harga;
                            $total = $total + $subtotal;
                    ?>
                        <tr class="bg-white">
                            <td><?= $no; ?></td>
                            <td>
                                <img src="assets/img/<?= $row['img'] ?>" width="80px">
                            </td>
                            <td class="text-start">
                                Kode : <?= $row['id_produk']; ?><br/>
                                Nama : <?= $row['nama']; ?><br/>
                            </td>
                            <td><?= $row['jumlah']; ?></td>
                            <td><?= 'Rp '.number_format($row['harga'],0,".","."); ?></td>
                            <td><?= 'Rp '.number_format($subtotal,0,".","."); ?></td>
                        </tr>
                    <?php
                        $no++;
                        }
                    ?>
                    <tr class="bg-white">
                        <td colspan="5">T  o  t  a  l</td>
                        <td><?= 'Rp '.number_format($total,0,".","."); ?></td>
                    </tr>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>