<?php
    $user = $_SESSION["username"];
    $data = tampilkan("SELECT * FROM akun WHERE username = '$user'")[0];

    if(isset($_POST["edit"])){
        if(ubah($_POST) > 0){
            echo"
                <script>
                    alert('data berhasil diubah!');
                    alert('silahkan login kembali');
                    document.location.href = '?p=logout';
                </script>
            ";
        }else{
            echo"
                <script>
                    alert('data gagal diubah!');
                </script>
            ";
        }
    }
    if(isset($_POST["hapus"])){
        $id = $_POST["id"];
        if(hapus($id) > 0){
            echo"
                <script>
                    alert('akun berhasil dihapus!');
                    document.location.href = '?p=logout';
                </script>
            ";
        }else{
            echo"
                <script>
                    alert('akun gagal dihapus!');
                </script>
            ";
        }
    }
?>
<div class="container mtNav">
    <div class="form">
        <div class="card col-md-4 offset-md-4 my-4 p-0">
            <div class="card-header bg-info">
                <h4 class="card-title text-center text-white mb-0">Profil Akun</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <input hidden type="text" name="id" value="<?= $data["id"]; ?>">
                    <input hidden type="text" name="gambarLama" value="<?= $data["img"]; ?>">
                    <div class="form-text">dapat mengubah data akun dengan langsung mengetikkan yang mau diubah</div>
                    <div class="mb-3">
                        <label for="nama" class="text-primary">Nama</label>
                        <input value="<?= $data["nama"]; ?>" id="nama" type="text" class="form-control" name="nama" placeholder="Masukkan nama anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="text-primary">Jenis Kelamin</label><br>
                        <select name="gender" id="gender" class="form-control">
                            <option value="blank">Pilih Jenis Kelamin</option>
                            <?php
                                if($data['jenis_kelamin'] == "Pria"){
                                    echo "<option value='Pria' selected>Pria</option>";
                                    echo "<option value='Wanita'>Wanita</option>";
                                }elseif($data['jenis_kelamin'] == "Wanita"){
                                    echo "<option value='Pria'>Pria</option>";
                                    echo "<option value='Wanita' selected>Wanita</option>";
                                }else{
                                    echo "<option value='Pria'>Pria</option>";
                                    echo "<option value='Wanita'>Wanita</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="text-primary">Alamat</label>
                        <input value="<?= $data["alamat"]; ?>" id="alamat" type="text" class="form-control" name="alamat" placeholder="Masukkan alamat anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="text-primary">Kota</label>
                        <input value="<?= $data["kota"]; ?>" id="kota" type="text" class="form-control" name="kota" placeholder="Masukkan nama Kota atau Kabupaten" required>
                    </div>
                    <div class="mb-3">
                        <label for="provinsi" class="text-primary">Provinsi</label>
                        <input value="<?= $data["provinsi"]; ?>" id="provinsi" type="text" class="form-control" name="provinsi" placeholder="Masukkan Provinsi anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="kodePos" class="text-primary">Kode Pos</label>
                        <input value="<?= $data["kode_pos"]; ?>" id="kodePos" type="number" class="form-control" name="kodePos" placeholder="Masukkan kode pos anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="noHp" class="text-primary">No. Telepon</label>
                        <input value="<?= $data["no_hp"]; ?>" id="noHp" type="number" class="form-control" name="noHp" placeholder="Masukkan no HP anda" required min="0">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="text-primary">Username</label>
                        <input value="<?= $data["username"]; ?>" id="username" type="text" class="form-control" name="username" placeholder="Masukkan username anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="text-primary">Email</label>
                        <input value="<?= $data["email"]; ?>" id="email" type="email" class="form-control" name="email" placeholder="Masukkan email anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="text-primary">Foto Profil</label><br>
                        <img src="assets/img/<?= $data["img"]; ?>" alt="" width="100">
                        <input id="img" type="file" class="form-control mt-2" name="img" placeholder="Masukkan source gambar">
                        <div class="form-text">rasio gambar 1:1, ukuran kurang dari 2 MB</div>
                    </div>
                    <div class="d-grip gap-2">
                        <button class="btn btn-dark tombol" type="submit" name="edit">Ubah Profil</button>
                    </div>
                    <div class="d-grip gap-2">
                        <a href="?p=resetPass&email=<?= $_SESSION["email"]; ?>" class="btn btn-primary tombol mt-2">Ubah Password</a>
                    </div>
                    <div class="d-grip gap-2">
                        <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger tombol mt-2" type="submit" name="hapus">Hapus Akun</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>