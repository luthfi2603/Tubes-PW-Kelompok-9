<?php
    $data = tampilkan("SELECT * FROM akun2 ORDER BY id ASC");
    if(isset($_POST["cari"])){
        $data = cari($_POST["keyword"]);
    }
?>
<div class="container">
    <div class="card col-12 marAdmin p-0">
        <div class="card-header bg-warning">
            <h4 class="card-title text-center mb-0 text-light">Halaman Admin Akun</h4>
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
                    Username
                </th>
                <th>
                    Email
                </th>
                <th>
                    Password
                </th>
                <th>
                    Aksi
                </th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($data as $row) : ?>
            <tr>
                <td><p class="isiAdmin"><?= $i; ?></p></td>
                <td><img src="assets/img/<?= $row["img"] ?>" alt="" width="200px"></td>
                <td><p class="isiAdmin"><?= $row["img"] ?></p></td>
                <td><p class="isiAdmin"><?= $row["username"] ?></p></td>
                <td><p class="isiAdmin"><?= $row["email"] ?></p></td>
                <td><p class="isiAdmin"><?= $row["password"] ?></p></td>
                <td>
                    <p class="isiAdmin">
                        <a href="?p=ubah&id=<?= $row["id"] ?>" class="btn btn-sm btn-success">ubah</a>
                        <a href="?p=hapus&i=1&id=<?= $row["id"] ?>" onclick="return confirm('Yakin?')" class="btn btn-sm btn-danger">hapus</a>
                    </p>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
        </div>
    </div>
</div>