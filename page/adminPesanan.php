<div class="container">
    <div class="card col-12 p-0 detail">
        <div class="card-header bg-ijo2">
            <h4 class="card-title text-center mb-0 text-white">Pesanan</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered align-middle text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pembelian</th>
                        <th>Kode Pembelian</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Status Pembayaran</th>
                        <th>Status Pengiriman</th>
                        <th>Edit</th>
                        <th>Print</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $nomor = 1;
                        $ambil = $conn -> query("SELECT * FROM pembelian");
                        while($pisah = $ambil -> fetch_assoc()){?>
                        <tr>
                            <td><?= $nomor; ?></td>
                            <td><?= $pisah['tanggal_pembelian']; ?></td>
                            <td><?= $pisah['id_pembelian']; ?></td>
                            <td><?= 'Rp '.number_format($pisah['total_pembelian'],0,".",".").''; ?></td>
                            <td><?= $pisah['status_pembayaran']; ?></td>
                            <td><?= $pisah['status_pembelian']; ?></td>
                            <td>
                                <a href="?p=editPembelian&id=<?= $pisah['id_pembelian']; ?>" class="btn btn-warning btn-sm">ubah</a>
                            </td>
                            <td>
                               <a href="?p=printPembelian&id=<?= $pisah['id_pembelian']; ?>"  class="btn btn-success btn-sm">print</a>
                            </td>
                        </tr><?php
                        $nomor++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>