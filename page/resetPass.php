<?php
    if(isset($_POST["reset2"])){
        rrreset($_POST);
    }
?>
<div class="container">
    <div class="form">
        <div class="card col-md-4 offset-md-4 mt-3 p-0">
            <div class="card-header bg-warning">
                <h4 class="card-title text-center mb-0 text-light">Reset Password</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <input hidden type="text" name="ngamEmail" id="" value="<?= $email; ?>">
                    <div class="mb-3">
                        <label for="password" class="text-primary">Password</label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Masukkan password" required>
                    </div>
                    <div class="mb-3">
                        <label for="konPass" class="text-primary">Konfirmasi Password</label>
                        <input id="konPass" type="password" class="form-control" name="konPass" placeholder="Masukkan konfirmasi password" required>
                    </div>
                    <div class="d-grip gap-2">
                        <button class="btn btn-dark tombol" type="submit" name="reset2">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>