<?php
    if(isset($_POST["login"])){
        masuk($_POST);
    }
?>
<div class="container">
    <div class="form">
        <div class="card col-md-4 regDanLog2 p-0">
            <div class="card-header bg-warning">
                <h4 class="card-title text-center mb-0 text-light">Login</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="username" class="text-primary">Username / Email</label>
                        <input autofocus id="username" type="text" class="form-control" name="user" placeholder="Masukkan username/ email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="text-primary">Password</label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Masukkan password" required>
                        <div class="form-text"><span id="btn1" onclick="change(1)" class="btn btn-primary btn-sm">lihat</span></div>
                    </div>
                    <div class="d-grip gap-2">
                        <button class="btn btn-dark tombol" type="submit" name="login">Login</button>
                    </div>
                    <div class="d-grip gap-2">
                        <a href="?p=konMail" class="btn btn-warning tombol mt-2" type="submit">Lupa Password</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>