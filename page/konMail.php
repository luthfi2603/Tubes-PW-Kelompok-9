<?php
    if(isset($_POST["reset"])){
        rreset($_POST);
    }
?>
<div class="container mtNav">
    <div class="form">
        <div class="card col-md-4 regDanLog22 p-0">
            <div class="card-header bg-warning">
                <h4 class="card-title text-center mb-0 text-white">Konfirmasi Email</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="konMail" class="text-primary">Email</label>
                        <input id="konMail" type="email" class="form-control" name="konMail" placeholder="Masukkan email" required>
                    </div>
                    <div class="d-grip gap-2">
                        <p>Masukkan email anda</p>
                        <button class="btn btn-warning tombol" type="submit" name="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>