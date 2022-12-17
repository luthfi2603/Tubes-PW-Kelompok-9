<?php
    if(isset($_POST["login"])){
        masuk($_POST);
    }
?>
<div class="container">
    <div class="form">
        <div class="card col-md-4 offset-md-4 mt-3 p-0">
            <div class="card-header bg-warning">
                <h4 class="card-title text-center mb-0 text-light">Login</h4>
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
                    <div class="d-grip gap-2">
                        <button class="btn btn-dark tombol" type="submit" name="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>