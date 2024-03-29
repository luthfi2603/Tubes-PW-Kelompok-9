<?php
    $id = $_GET["id"];
    $data = tampilkan("SELECT * FROM produk WHERE id_produk = $id")[0];

    if(isset($_POST["ubahProduk"])){
        if(ubah2($_POST) > 0){
            echo"
                <script>
                    alert('data produk berhasil diubah');
                    document.location.href = '?p=adminProduk';
                </script>
            ";
        }else{
            echo"
                <script>
                    alert('data produk gagal diubah!');
                </script>
            ";
        }
    }
?>
<div class="container mtNav">
    <div class="form">
        <div class="card col-md-4 regDanLog p-0">
            <div class="card-header bg-ijo2">
                <h4 class="card-title text-center text-white mb-0">Ubah Data Produk</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                <input hidden type="text" name="id" value="<?= $data["id_produk"]; ?>">
                <input hidden type="text" name="gambarLama" value="<?= $data["img"]; ?>">
                    <div class="mb-3">
                        <label for="nama" class="text-primary">Nama Produk</label>
                        <input value="<?= $data["nama_produk"]; ?>" autofocus id="nama" type="text" class="form-control" name="nama" placeholder="Masukkan nama produk" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="text-primary">Harga</label>
                        <input value="<?= $data["harga_produk"]; ?>" id="harga" type="text" class="form-control" name="harga" placeholder="Masukkan harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="text-primary">Kategori</label>
                        <input value="<?= $data["kategori_produk"]; ?>" id="kategori" type="text" class="form-control" name="kategori" placeholder="Masukkan kategori" required>
                    </div>
                    <div class="mb-3">
                        <label for="merek" class="text-primary">Merek</label>
                        <input value="<?= $data["merek_produk"]; ?>" id="merek" type="text" class="form-control" name="merek" placeholder="Masukkan merek" required>
                    </div>
                    <div class="mb-3">
                        <label for="spesifikasi" class="text-primary">Spesifikasi</label>
                        <textarea class="form-control" name="spesifikasi"><?= $data["spesifikasi_produk"]; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="text-primary">Gambar</label><br>
                        <img src="assets/img/<?= $data["img"]; ?>" alt="" width="100">
                        <input id="img" type="file" class="form-control mt-2" name="img" placeholder="Masukkan source gambar">
                    </div>
                    <div class="d-grip gap-2">
                        <button class="btn btn-dark tombol" type="submit" name="ubahProduk">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>