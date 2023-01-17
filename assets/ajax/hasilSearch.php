<?php
    require "../../includes/functions.php";

    // pagination, konfigurasi
    if(!isset($_GET["keyword"])){
        $jumlahDataPerHalaman = 15;
        $jumlahSemuaData = count(tampilkan("SELECT * FROM produk"));
        $jumlahHalaman = ceil($jumlahSemuaData / $jumlahDataPerHalaman);
        $halamanAktif = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
        $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
    }else{
        $jumlahDataPerHalaman = 15;
        $jumlahSemuaData = count(cari2($_GET["keyword"]));
        $jumlahHalaman = ceil($jumlahSemuaData / $jumlahDataPerHalaman);
        $halamanAktif = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
        $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
    }
?>
<div class="row">
    <?php
        $data = cari3($_GET["keyword"], $awalData, $jumlahDataPerHalaman);
        if(empty($data)){
            echo"
                <div class='text-center'>
                    <h5 class='text-huruf mb-4'>tidak ditemukan!</h5>
                </div>
            ";
        }
        foreach($data as $row){?>
            <div class="col mb-4">
                <div class="card keTengah bg-ijo2 text-white gambarProduk">
                    <div class="card-header text-center bg-ijo">
                        <div class="namaProduk">
                            <?= $row["nama_produk"]; ?>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <img src="assets/img/<?= $row["img"]; ?>" alt="" width="196px" class="bg-white">
                        <div class="row">
                            <div class="col-8 keTengah">
                                <br>
                                <span>harga : </span>
                                <?php
                                    echo"
                                        <p>
                                            <span>Rp ".number_format($row["harga_produk"],0,".",".")."</span>
                                        </p>
                                    ";
                                ?>
                                <span>Deskripsi : </span>
                                <div class="deskripsi"><?= $row["spesifikasi_produk"]; ?></div>
                                <a href="?p=detail&id=<?= $row["id_produk"]; ?>" class="btn btn-outline-light mb-4">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><?php
        }
    ?>
</div>