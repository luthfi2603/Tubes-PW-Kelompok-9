<?php
    $data = tampilkan("SELECT * FROM akun ORDER BY id ASC");
    if(isset($_POST["cari"])){
        $data = cari($_POST["keyword"]);
    }
?>
<div class="container">
    <div class="card col-12 p-0 detail">
        <div class="card-header bg-ijo2">
            <h4 class="card-title text-center mb-0 text-white">Halaman Admin Akun</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <input autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Cari...">
                <button type="submit" name="cari">
                    Cari
                </button>
            </form>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle table-responsive">
                    <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Provinsi</th>
                        <th>Kode Pos</th>
                        <th>No. HP</th>
                        <th>level</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                        $i = 1;

                        foreach($data as $row) :
                        $level = $row["level"];
                        $level = ($level == 1) ? "admin" : "user";
                    ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><img src="assets/img/<?= $row["img"] ?>" alt="" width="80px"></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["username"] ?></td>
                        <td><?= $row["email"] ?></td>
                        <td><?= $row["jenis_kelamin"]; ?></td>
                        <td><?= $row["alamat"]; ?></td>
                        <td><?= $row["kota"]; ?></td>
                        <td><?= $row["provinsi"]; ?></td>
                        <td><?= $row["kode_pos"]; ?></td>
                        <td><?= $row["no_hp"]; ?></td>
                        <td><?= $level ?></td>
                        <td>
                            <a href="?p=ubah&id=<?= $row["id"] ?>" class="btn btn-sm btn-success mb-2">ubah</a>
                            <a href="?p=hapus&i=1&id=<?= $row["id"] ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger">hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                    <?php
                        if(empty($data)){
                            echo"
                                <tr>
                                    <td colspan='13'>
                                        <h5 class='text-huruf mb-0'>tidak ditemukan!</h5>
                                    </td>
                                </tr>
                            ";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>