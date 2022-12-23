<?php
    $id = $_GET["id"];

    $data = tampilkan("SELECT * FROM akun2 WHERE id = $id")[0];

    if(isset($_POST["edit"])){
        if(ubah($_POST) > 0){
            echo"
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = '?p=admin';
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
?>
<div class="container">
    <div class="form">
        <div class="card col-md-4 offset-md-4 mt-3 p-0">
            <div class="card-header bg-info">
                <h4 class="card-title text-center text-white mb-0">Edit</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <input hidden type="text" name="id" value="<?= $data["id"]; ?>">
                    <div class="mb-3">
                        <label for="username" class="text-primary">Username</label>
                        <input id="username" type="text" class="form-control" name="username" placeholder="Masukkan username" required value="<?= $data["username"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="text-primary">Password</label>
                        <input id="password" type="text" class="form-control" name="password" placeholder="Masukkan password" required value="<?= $data["password"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="text-primary">Email</label>
                        <input id="email" type="email" class="form-control" name="email" placeholder="Masukkan username" required value="<?= $data["email"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="img" class="text-primary">Gambar</label>
                        <input id="img" type="text" class="form-control" name="img" placeholder="Masukkan source gambar" required value="<?= $data["img"]; ?>">
                    </div>
                    <div class="d-grip gap-2">
                        <button class="btn btn-dark tombol" type="submit" name="edit">Registrasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>