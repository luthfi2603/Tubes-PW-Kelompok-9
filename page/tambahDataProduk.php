<?php
    if(isset($_POST["tambah"])){
        if(tambah2($_POST) > 0){
            echo"
                <script>
                    alert('tambah produk berhasil!');
                    document.location.href = '?p=adminProduk';
                </script>
            ";
        }else{
            echo"
                <script>
                    alert('tambah produk gagal!');
                </script>
            ";
        }
    }
?>
<div class="container mtNav">
    <div class="form">
        <div class="card col-md-4 regDanLog p-0">
            <div class="card-header bg-info">
                <h4 class="card-title text-center text-white mb-0">Tambah Data Produk</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="text-primary">Nama Produk</label>
                        <input autofocus id="nama" type="text" class="form-control" name="nama" placeholder="Masukkan nama produk" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="text-primary">Harga</label>
                        <input  id="harga" type="text" class="form-control" name="harga" placeholder="Masukkan harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="text-primary">Kategori</label>
                        <input  id="kategori" type="text" class="form-control" name="kategori" placeholder="Masukkan kategori" required>
                    </div>
                    <div class="mb-3">
                        <label for="merek" class="text-primary">Merek</label>
                        <input  id="merek" type="text" class="form-control" name="merek" placeholder="Masukkan merek" required>
                    </div>
                    <div class="mb-3">
                        <label for="spesifikasi" class="text-primary">Spesifikasi</label>
                        <textarea class="form-control" name="spesifikasi"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="text-primary">Gambar</label>
                        <input  id="img" type="file" class="form-control" name="img" placeholder="Masukkan source gambar">
                        <div class="form-text">rasio gambar 1:1, ukuran kurang dari 2 MB</div>
                    </div>
                    <div class="d-grip gap-2">
                        <button class="btn btn-dark tombol" type="submit" name="tambah">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>