<?php
    if(isset($_POST["registrasi"])){
        // kalau belum login
        if(empty($_SESSION)){
            if(tambah($_POST) > 0){
                echo"
                    <script>
                        alert('registrasi berhasil!');
                        document.location.href = 'inc/..';
                    </script>
                ";
            }else{
                echo"
                    <script>
                        alert('registrasi gagal!');
                    </script>
                ";
            }
        // kalau login sebagai admin
        }else{
            if(tambah($_POST) > 0){
                echo"
                    <script>
                        alert('registrasi berhasil!');
                        document.location.href = '?p=adminAkun';
                    </script>
                ";
            }else{
                echo"
                    <script>
                        alert('registrasi gagal!');
                    </script>
                ";
            }
        }
    }
?>
<div class="container mtNav">
    <div class="form">
        <div class="card col-md-4 regDanLog p-0">
            <div class="card-header bg-info">
                <h4 class="card-title text-center text-white mb-0">Pendaftaran Akun</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="text-primary">Nama</label>
                        <input autofocus id="nama" type="text" class="form-control" name="nama" placeholder="Masukkan nama anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="text-primary">Jenis Kelamin</label><br>
                        <select name="gender" id="gender" class="form-control">
                            <option value="blank">Pilih Jenis Kelamin</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="text-primary">Alamat</label>
                        <input id="alamat" type="text" class="form-control" name="alamat" placeholder="Masukkan alamat anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="text-primary">Kota</label>
                        <input id="kota" type="text" class="form-control" name="kota" placeholder="Masukkan nama Kota atau Kabupaten" required>
                    </div>
                    <div class="mb-3">
                        <label for="provinsi" class="text-primary">Provinsi</label>
                        <input id="provinsi" type="text" class="form-control" name="provinsi" placeholder="Masukkan Provinsi anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="kodePos" class="text-primary">Kode Pos</label>
                        <input id="kodePos" type="number" class="form-control" name="kodePos" placeholder="Masukkan kode pos anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="noHp" class="text-primary">No. Handphone</label>
                        <input id="noHp" type="number" class="form-control" name="noHp" placeholder="Masukkan no HP anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="text-primary">Username</label>
                        <input id="username" type="text" class="form-control" name="username" placeholder="Masukkan username anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="text-primary">Password</label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Masukkan password anda" required minlength="8">
                        <div class="form-text"><span id="btn1" onclick="change(1)" class="btn btn-primary btn-sm">lihat</span></div>
                    </div>
                    <div class="mb-3">
                        <label for="konPass" class="text-primary">Konfirmasi Password</label>
                        <input id="konPass" type="password" class="form-control" name="konPass" placeholder="Masukkan konfirmasi password" required minlength="8">
                        <div class="form-text"><span id="btn2" onclick="change(2)" class="btn btn-primary btn-sm">lihat</span></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="text-primary">Email</label>
                        <input id="email" type="email" class="form-control" name="email" placeholder="Masukkan email anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="text-primary">Foto Profil</label>
                        <input id="img" type="file" class="form-control" name="img" placeholder="Masukkan source gambar">
                        <div class="form-text">rasio gambar 1:1, ukuran kurang dari 2 MB</div>
                    </div>
                    <div class="d-grip gap-2">
                        <button class="btn btn-dark tombol" type="submit" name="registrasi">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>