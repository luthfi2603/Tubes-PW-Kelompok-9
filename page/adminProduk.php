<?php
    // pagination
    // konfigurasi
    if(!isset($_GET["keyword"])){
        $jumlahDataPerHalaman = 10;
        $jumlahSemuaData = count(tampilkan("SELECT * FROM produk"));
        $jumlahHalaman = ceil($jumlahSemuaData / $jumlahDataPerHalaman);
        $halamanAktif = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
        $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
    }else{
        $jumlahDataPerHalaman = 10;
        $jumlahSemuaData = count(cari2($_GET["keyword"]));
        $jumlahHalaman = ceil($jumlahSemuaData / $jumlahDataPerHalaman);
        $halamanAktif = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
        $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
    }
    $data = tampilkan("SELECT * FROM produk LIMIT $awalData, $jumlahDataPerHalaman");
    if(isset($_GET["cari2"])){
        $data = cari3($_GET["keyword"], $awalData, $jumlahDataPerHalaman);
    }
    if(isset($_POST['cari2'])){
        $keyword = $_POST['keyword'];
        echo"
            <script>
                document.location.href = '?p=adminProduk&keyword=".$keyword."&cari2=';
            </script>
        ";
    }
?>
<div class="container mtNav">
    <div class="card col-12 marAdmin p-0">
        <div class="card-header bg-ijo2">
            <h4 class="card-title text-center mb-0 text-white">Halaman Admin Produk</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <input autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Cari...">
                <button type="submit" name="cari2">
                    cari
                </button>
            </form>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle mb-4">
                    <tr>
                        <th>
                            No.
                        </th>
                        <th>
                            Gambar
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
                    <?php
                        if(empty($data)){
                            echo"
                                <tr>
                                    <td colspan='8'>
                                        <h5 class='text-huruf mb-0'>tidak ditemukan!</h5>
                                    </td>
                                </tr>
                            ";
                        }
                    ?>
                </table>
            </div>
            <!-- navigasi -->
            <nav aria-label="...">
                <ul class="pagination justify-content-center mb-2">
                    <!-- tombol awal -->
                    <li class="page-item">
                        <a href="
                        <?php
                            if(!isset($_GET["keyword"])){
                                echo"?p=adminProduk&hal=1";
                            }else{
                                echo"?p=adminProduk&keyword=".($_GET['keyword'])."&cari2=&hal=1";
                            }
                        ?>
                        " class="page-link">awal</a>
                    </li>
                    <!-- tombol kurang -->
                    <li class="page-item">
                        <a href="
                        <?php
                            if(!isset($_GET["keyword"])){
                                echo"?p=adminProduk&hal=".($halamanAktif - 1)."";
                            }else{
                                echo"?p=adminProduk&keyword=".($_GET['keyword'])."&cari2=&hal=".($halamanAktif - 1)."";
                            }
                        ?>
                        " class="page-link
                        <?php
                            if($halamanAktif == 1){
                                echo"disabled";
                            }
                        ?>
                        ">&laquo;</a>
                    </li>
                    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                        <?php if($i == $halamanAktif) : ?>
                            <!-- halaman aktif -->
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="
                                <?php
                                    if(!isset($_GET["keyword"])){
                                        echo"?p=adminProduk&hal=".$i."";
                                    }else{
                                        echo"?p=adminProduk&keyword=".($_GET['keyword'])."&cari2=&hal=".$i."";
                                    }
                                ?>
                                "><?= $i; ?></a>
                            </li>
                        <?php else : ?>
                            <!-- halaman biasa -->
                            <li class="page-item">
                                <a class="page-link" href="
                                <?php
                                    if(!isset($_GET["keyword"])){
                                        echo"?p=adminProduk&hal=".$i."";
                                    }else{
                                        echo"?p=adminProduk&keyword=".($_GET['keyword'])."&cari2=&hal=".$i."";
                                    }
                                ?>
                                "><?= $i; ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <!-- tombol tambah -->
                    <li class="page-item">
                        <a href="
                        <?php
                            if(!isset($_GET["keyword"])){
                                echo"?p=adminProduk&hal=".($halamanAktif + 1)."";
                            }else{
                                echo"?p=adminProduk&keyword=".($_GET['keyword'])."&cari2=&hal=".($halamanAktif + 1)."";
                            }
                        ?>
                        " class="page-link
                        <?php
                            if($halamanAktif == $jumlahHalaman){
                                echo"disabled";
                            }else if(empty($data)){
                                echo"disabled";
                            }
                        ?>
                        ">&raquo;</a>
                    </li>
                    <!-- tombol akhir -->
                    <li class="page-item">
                        <a href="
                        <?php
                            if(!isset($_GET["keyword"])){
                                echo"?p=adminProduk&hal=".$jumlahHalaman."";
                            }else if(empty($data)){
                                echo"?p=adminProduk&keyword=".($_GET['keyword'])."&cari2=&hal=1";
                            }else{
                                echo"?p=adminProduk&keyword=".($_GET['keyword'])."&cari2=&hal=".$jumlahHalaman."";
                            }
                        ?>
                        " class="page-link">akhir</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>