<?php
    $data = tampilkan("SELECT * FROM produk ORDER BY id_produk ASC");
    if(isset($_POST["cari"])){
        $data = cari2($_POST["keyword"]);
    }
?>
<div class="container">
    <div class="card col-12 marAdmin p-0">
        <div class="card-header bg-warning">
            <h4 class="card-title text-center mb-0 text-light">Halaman Admin Produk</h4>
        </div>
        <div class="card-body">
        <form method="POST" action="">
            <input autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
            <button type="submit" name="cari">
                Cari
            </button>
        </form>
        <br>
        <table class="table table-bordered text-center">
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
                <th>
                    Harga
                </th>
                <th>
                    Kategori
                </th>
                <th>
                    Merek
                </th>
                <th>
                    Spesifikasi
                </th>
                <th width="129px">
                    Aksi
                </th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($data as $row) : ?>
            <tr>
                <td><p class="isiAdmin"><?= $i; ?></p></td>
                <td><img src="assets/img/<?= $row["img"] ?>" alt="" width="150px"></td>
                <td><p class="isiAdmin"><?= $row["img"] ?></p></td>
                <td><p class="isiAdmin"><?= $row["nama_produk"] ?></p></td>
                <td><p class="isiAdmin"><?= $row["harga_produk"] ?></p></td>
                <td><p class="isiAdmin"><?= $row["kategori_produk"] ?></p></td>
                <td><p class="isiAdmin"><?= $row["merek_produk"] ?></p></td>
                <td><p class="isiAdmin"><?= $row["spesifikasi_produk"] ?></p></td>
                <td>
                    <p class="isiAdmin">
                        <a href="?p=ubahDataProduk&id=<?= $row["id_produk"] ?>" class="btn btn-sm btn-success">ubah</a>
                        <a href="?p=hapus&i=2&id=<?= $row["id_produk"] ?>" onclick="return confirm('Yakin?')" class="btn btn-sm btn-danger">hapus</a>
                    </p>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
        </div>
    </div>
</div>