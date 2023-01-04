<?php
    $data = tampilkan("SELECT * FROM produk ORDER BY id_produk ASC");
    if(isset($_POST["cari"])){
        $data = cari2($_POST["keyword"]);
    }
?>
<div class="container mtNav">
    <div class="card col-12 marAdmin p-0">
        <div class="card-header bg-ijo2">
            <h4 class="card-title text-center mb-0 text-white">Halaman Admin Produk</h4>
        </div>
        <div class="card-body">
        <form method="POST" action="">
            <input autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
            <button type="submit" name="cari">
                Cari
            </button>
        </form>
        <br>
        <table class="table table-bordered text-center align-middle">
            <tr>
                <th>
                    No.
                </th>
                <th>
                    Gambar
                </th>
                <th>
                    Source Gambar
                </th>
                <th>
                    Nama Produk
                </th>
                <th width="110px">
                    Harga
                </th>
                <th>
                    Kategori
                </th>
                <th>
                    Merek
                </th>
                <th>
                    Deskripsi
                </th>
                <th width="129px">
                    Aksi
                </th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($data as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><img src="assets/img/<?= $row["img"] ?>" alt="" width="100px"></td>
                <td><?= $row["img"] ?></td>
                <td><?= $row["nama_produk"] ?></td>
                <td>Rp <?= number_format($row["harga_produk"],0,".",".") ?></td>
                <td><?= $row["kategori_produk"] ?></td>
                <td><?= $row["merek_produk"] ?></td>
                <td class="deskAdminProduk"><?= $row["spesifikasi_produk"] ?></td>
                <td>
                    <a href="?p=ubahDataProduk&id=<?= $row["id_produk"] ?>" class="btn btn-sm btn-success">ubah</a>
                    <a href="?p=hapus&i=2&id=<?= $row["id_produk"] ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger">hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
        </div>
    </div>
</div>