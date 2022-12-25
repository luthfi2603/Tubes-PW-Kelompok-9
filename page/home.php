<div class="container mt-5">
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
            $query = "SELECT * FROM produk";
            $hasil = mysqli_query($conn, $query);
            foreach($hasil as $row){
            ?><div class="col mb-4">
                <div class="card keTengah" style="width: 261px;">
                    <div class="card-header text-center">
                        <?= $row["nama_produk"]; ?>
                    </div>
                    <div class="card-body p-0">
                        <img src="assets/img/<?= $row["img"]; ?>" alt="" width="258px">
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
                                <p><?= $row["spesifikasi_produk"]; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><?php
            }
        ?>
    </div>
</div>