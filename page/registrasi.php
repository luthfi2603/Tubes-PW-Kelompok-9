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
<div class="container">
    <div class="form">
        <div class="card col-md-4 regDanLog p-0">
            <div class="card-header bg-info">
                <h4 class="card-title text-center text-white mb-0">Registrasi</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="username" class="text-primary">Username</label>
                        <input autofocus id="username" type="text" class="form-control" name="username" placeholder="Masukkan username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="text-primary">Password</label>
                        <input  id="password" type="password" class="form-control" name="password" placeholder="Masukkan password" required minlength="8">
                        <div class="form-text"><span id="btn1" onclick="change(1)" class="btn btn-primary btn-sm">lihat</span></div>
                    </div>
                    <div class="mb-3">
                        <label for="konPass" class="text-primary">Konfirmasi Password</label>
                        <input  id="konPass" type="password" class="form-control" name="konPass" placeholder="Masukkan konfirmasi password" required minlength="8">
                        <div class="form-text"><span id="btn2" onclick="change(2)" class="btn btn-primary btn-sm">lihat</span></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="text-primary">Email</label>
                        <input  id="email" type="email" class="form-control" name="email" placeholder="Masukkan email" required>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="text-primary">Gambar</label>
                        <input  id="img" type="file" class="form-control" name="img" placeholder="Masukkan source gambar">
                        <div class="form-text">rasio gambar 1:1, ukuran kurang dari 2 MB</div>
                    </div>
                    <div class="d-grip gap-2">
                        <button class="btn btn-dark tombol" type="submit" name="registrasi">Registrasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>