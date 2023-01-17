<?php
    // pagination
    // konfigurasi
    if(!isset($_GET["keyword"])){
        // fungsi php: round(keterdekat), floor(ke bawah), ceil(ke atas)
        /*if(isset($_GET["hal"])){
            $halamanAktif = $_GET["hal"];
        }else{
            $halamanAktif = 1;
        }*/
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
<div class="container">
    <div id="carouselExampleControls" class="gambarDepan carousel slide carousel-fade mtNav2" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="4000">
                <img src="assets/img/slide1.jpeg" class="d-block w-100">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img src="assets/img/slide2.jpeg" class="d-block w-100">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img src="assets/img/slide3.jpeg" class="d-block w-100">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <p class="text-center text-huruf col-5 kataKata">
            Selamat datang, selamat berbelanja di KyuuDent_Store. Kami menyediakan beberapa peralatan sekolah dan kuliah anda seperti : pulpen, pensil, dll.
            <br> Kamu bisa mendapatkan barang hanya dengan sekali tekan, dan kami akan <span id="scroll"></span> mengirimkan barang yang kamu pesan dihari yang sama, jangan khawatir, toko kami gratis pengiriman keseluruh Indonesia.
        </p>
    </div>
    <div class="row">
        <?php
            if(@$_GET){
                if(isset($_GET["cari"])){?>
                    <h2 class="text-huruf mb-4 text-center">Hasil Pencarian</h2><?php
                }else{?>
                    <h2 class="text-huruf mb-4 text-center">Semua Produk</h2><?php    
                }
            }else{?>
                <h2 class="text-huruf mb-4 text-center">Semua Produk</h2><?php
            }
        ?>
    </div>
    <div id="bungkus">
        <div class="row">
            <?php
                $data = tampilkan("SELECT * FROM produk LIMIT $awalData, $jumlahDataPerHalaman");
                if(isset($_GET["cari"])){
                    $data = cari3($_GET["keyword"], $awalData, $jumlahDataPerHalaman);
                }
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
    </div>
    <!-- navigasi -->
    <nav aria-label="...">
        <ul class="pagination justify-content-center
            <?php
                if(isset($_SESSION["level"])){
                    if($_SESSION['level'] == 1){
                        echo"mb-5";
                    }
                }
            ?>
        ">
            <!-- tombol awal -->
            <li class="page-item">
                <a href="
                <?php
                    if(!isset($_GET["keyword"])){
                        echo"?p=&hal=1";
                    }else{
                        echo"?keyword=".($_GET['keyword'])."&cari=&p=&hal=1";
                    }
                ?>
                " class="page-link">awal</a>
            </li>
            <!-- tombol kurang -->
            <li class="page-item">
                <a href="
                <?php
                    if(!isset($_GET["keyword"])){
                        echo"?p=&hal=".($halamanAktif - 1)."";
                    }else{
                        echo"?keyword=".($_GET['keyword'])."&cari=&p=&hal=".($halamanAktif - 1)."";
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
                                echo"?p=&hal=".$i."";
                            }else{
                                echo"?keyword=".($_GET['keyword'])."&cari=&p=&hal=".$i."";
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
                                echo"?p=&hal=".$i."";
                            }else{
                                echo"?keyword=".($_GET['keyword'])."&cari=&p=&hal=".$i."";
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
                        echo"?p=&hal=".($halamanAktif + 1)."";
                    }else{
                        echo"?keyword=".($_GET['keyword'])."&cari=&p=&hal=".($halamanAktif + 1)."";
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
                        echo"?p=&hal=".$jumlahHalaman."";
                    }else if(empty($data)){
                        echo"?keyword=".($_GET['keyword'])."&cari=&p=&hal=1";
                    }else{
                        echo"?keyword=".($_GET['keyword'])."&cari=&p=&hal=".$jumlahHalaman."";
                    }
                ?>
                " class="page-link">akhir</a>
            </li>
        </ul>
    </nav>
</div>