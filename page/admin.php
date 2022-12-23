<?php
    $data = tampilkan("SELECT * FROM akun2 ORDER BY id ASC");
    if(isset($_POST["cari"])){
        $data = cari($_POST["keyword"]);
    }
?>
<div class="container">
    <div class="card col-9 offset-1 mt-3 p-0">
        <div class="card-header bg-warning">
            <h4 class="card-title text-center mb-0 text-light">Halaman Admin</h4>
        </div>
        <div class="card-body">
        <form method="POST" action="">
            <input autocomplete="off" autofocus size="40" type="text" name="keyword" id="" placeholder="Search">
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
            <?php foreach($data as $hadeh) : ?>
            <tr>
                <td><p class="isiAdmin"><?= $i; ?></p></td>
                <td><img src="assets/img/<?= $hadeh["img"] ?>" alt="" width="200px"></td>
                <td><p class="isiAdmin"><?= $hadeh["username"] ?></p></td>
                <td><p class="isiAdmin"><?= $hadeh["email"] ?></p></td>
                <td><p class="isiAdmin"><?= $hadeh["password"] ?></p></td>
                <td>
                    <p class="isiAdmin">
                    <a href="?p=edit&id=<?= $hadeh["id"] ?>" class="btn btn-sm btn-success">ubah</a>
                    <a href="?p=hapus&id=<?= $hadeh["id"] ?>" onclick="return confirm('Yakin?')" class="btn btn-sm btn-danger">hapus</a>
                    </p>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
        </div>
    </div>
</div>