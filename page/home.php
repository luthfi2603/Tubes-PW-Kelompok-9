<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h2 class="text-center">
                Selamat Datang
            </h2>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <?php
            $data = tampilkan("SELECT * FROM produk");
            if(isset($_GET["cari"])){
                $data = cari2($_GET["keyword"]);
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
                                <div style="margin-bottom:1.5rem;height:100px;overflow:hidden;" ><?= $row["spesifikasi_produk"]; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><?php
            }
        ?>
    </div>
</div>