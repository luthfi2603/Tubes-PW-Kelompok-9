<?php
    if(isset($_POST["registrasi"])){
        tambah($_POST);
    }
?>
<div class="container">
    <div class="form">
        <div class="card col-md-4 offset-md-4 mt-3 p-0">
            <div class="card-header bg-info">
                <h4 class="card-title text-center text-white mb-0">Registrasi</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="username" class="text-primary">Username</label>
                        <input id="username" type="text" class="form-control" name="username" placeholder="Masukkan username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="text-primary">Password</label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Masukkan password" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="text-primary">Email</label>
                        <input id="email" type="text" class="form-control" name="email" placeholder="Masukkan email" required>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="text-primary">Gambar</label>
                        <input id="img" type="text" class="form-control" name="img" placeholder="Masukkan source gambar" required>
                    </div>
                    <div class="d-grip gap-2">
                        <button class="btn btn-dark tombol" type="submit" name="registrasi">Registrasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>