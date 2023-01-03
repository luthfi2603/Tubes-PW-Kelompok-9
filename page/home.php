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
<div class="container mtNav">
    <div class="row">
        <div class="col">
            <h2 class="text-center text-ijo">
                Selamat Datang
            </h2>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <?php
            $data = tampilkan("SELECT * FROM produk LIMIT $awalData, $jumlahDataPerHalaman");
            if(isset($_GET["cari"])){
                $data = cari3($_GET["keyword"], $awalData, $jumlahDataPerHalaman);
            }
            foreach($data as $row){
            ?><div class="col mb-4">
                <div class="card keTengah" style="width: 198px;">
                    <div class="card-header text-center">
                        <?= $row["nama_produk"]; ?>
                    </div>
                    <div class="card-body p-0">
                        <img src="assets/img/<?= $row["img"]; ?>" alt="" width="196px">
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
                                <a href="?p=detail&id=<?= $row["id_produk"]; ?>" class="btn btn-outline-secondary mb-4">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><?php
            }
        ?>
    </div>
    <!-- navigasi -->
    <nav aria-label="...">
        <ul class="pagination mb-4">
            <li class="page-item">
                <a href="
                <?php
                    if(!isset($_GET["keyword"])){
                        echo"inc/..";
                    }else{
                        echo"?keyword=".($_GET['keyword'])."&cari=&p=&hal=1";
                    }
                ?>
                " class="page-link">awal</a>
            </li>
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
                    }
                ?>
                ">&raquo;</a>
            </li>
            <li class="page-item">
                <a href="
                <?php
                    if(!isset($_GET["keyword"])){
                        echo"?p=&hal=".$jumlahHalaman."";
                    }else{
                        echo"?keyword=".($_GET['keyword'])."&cari=&p=&hal=".$jumlahHalaman."";
                    }
                ?>
                " class="page-link">akhir</a>
            </li>
        </ul>
    </nav>
</div>