<div class="navbar bg-primary">
    <div class="container-fluid">
        <?php
            // ketika belum login
            if(empty($_SESSION["username"])){
                if(@$_GET){
                    switch($_GET["p"]){
                        // belum login di halaman registrasi
                        case"registrasi":?>
                            <a href="inc/.." class="navbar-brand h1 mb-0 text-white">ZeeroXc</a>
                            <ul class="nav justify-content-end">
                                <a href="?p=login" class="nav-link text-white">Login</a>
                            </ul><?php
                            break;
                        // belum login di halaman login
                        case"login":?>
                            <a href="inc/.." class="navbar-brand h1 mb-0 text-white">ZeeroXc</a>
                            <ul class="nav justify-content-end">
                                <a href="?p=registrasi" class="nav-link text-white">Register</a>
                            </ul><?php
                            break;
                        // belum login mau ke halaman admin
                        case"admin":
                            header("Location: inc/..");
                            break;
                        case"konMail":?>
                            <a href="inc/.." class="navbar-brand h1 mb-0 text-white">ZeeroXc</a>
                            <ul class="nav justify-content-end">
                                <a href="?p=registrasi" class="nav-link text-light">Register</a>
                                <a href="?p=login" class="nav-link text-light">Login</a>
                            </ul><?php
                            break;
                        // belum login di halaman reset password
                        case"resetPass":
                            // belum memasukkan email yang sesuai
                            if(empty($_GET["email"])){
                                header("Location: ?p=konMail");
                            // kembali ke halaman konfirmasi password
                            }else{?>
                                <a href="?p=konMail" class="navbar-brand h1 mb-0 text-light">ZeeroXc</a>
                                <ul class="nav justify-content-end">
                                    <span href="?p=registrasi" class="nav-link text-primary">Register</span>
                                </ul><?php
                                break;
                            }
                    }
                }else{?>
                    <span class="navbar-brand h1 mb-0 text-light">ZeeroXc</span>
                    <ul class="nav justify-content-end">
                        <a href="?p=registrasi" class="nav-link text-light">Register</a>
                        <a href="?p=login" class="nav-link text-light">Login</a>
                    </ul>
                    <?php
                }
            // ketika sudah login
            }else{
                // header ketika session admin
                if($_SESSION["username"] == 'ZeeroXc'){
                    if(@$_GET){
                        switch($_GET["p"]){
                            // sudah login sesi admin ketika di halaman admin
                            case"admin":?>
                                <span class="navbar-brand h1 mb-0 text-white">ZeeroXc</span>
                                <ul class="nav justify-content-end">
                                    <span class="nav-link text-white"><?= $_SESSION['username']; ?></span>
                                    <a href="inc/.." class="nav-link text-white">User</a>
                                    <a onclick="return confirm('Apakah anda yakin?')" href="assets/includes/logout.php" class="nav-link text-white">Logout</a>
                                </ul><?php
                                break;
                            // sudah login sesi admin ketika di halaman registrasi
                            case"registrasi":?>
                                <span class="navbar-brand h1 mb-0 text-white">ZeeroXc</span>
                                <ul class="nav justify-content-end">
                                    <a href="?p=adminAkun" class="nav-link text-white">Admin Akun</a>
                                </ul><?php
                                break;
                            // sudah login sesi admin ketika di halaman edit
                            case"ubah":?>
                                <span class="navbar-brand h1 mb-0 text-white">ZeeroXc</span>
                                <ul class="nav justify-content-end">
                                    <span class="text-primary">Register</span>
                                    <a href="?p=adminAkun" class="nav-link text-white">Admin Akun</a>
                                </ul><?php
                                break;
                            // sudah login sesi admin ketika di halaman data akun
                            case"adminAkun":?>
                                <span class="navbar-brand h1 mb-0 text-white">ZeeroXc</span>
                                <ul class="nav justify-content-end">
                                    <a href="?p=registrasi" class="nav-link text-white">Tambah Data</a>
                                    <a href="?p=admin" class="nav-link text-white">Admin</a>
                                </ul><?php
                                break;
                            // sudah login sesi ketika admin di halaman data produk
                            case"adminProduk":?>
                                <span class="navbar-brand h1 mb-0 text-white">ZeeroXc</span>
                                <ul class="nav justify-content-end">
                                    <a href="?p=tambahDataProduk" class="nav-link text-white">Tambah Produk</a>
                                    <a href="?p=admin" class="nav-link text-white">Admin</a>
                                </ul><?php
                                break;
                            // sudah login sesi admin ketika di halaman tambah data produk
                            case"tambahDataProduk":?>
                                <span class="navbar-brand h1 mb-0 text-white">ZeeroXc</span>
                                <ul class="nav justify-content-end">
                                    <a href="?p=adminProduk" class="nav-link text-white">Admin Produk</a>
                                </ul><?php
                                break;
                            // sudah login sesi admin ketika di halaman ubah data produk
                            case"ubahDataProduk":?>
                                <span class="navbar-brand h1 mb-0 text-white">ZeeroXc</span>
                                <ul class="nav justify-content-end">
                                    <a href="?p=adminProduk" class="nav-link text-white">Admin Akun</a>
                                </ul><?php
                                break;
                        }
                    // session admin ketika di home
                    }else{?>
                        <span class="navbar-brand h1 mb-0 text-light">ZeeroXc</span>
                        <ul class="nav justify-content-end">
                            <a href="?p=admin" class="nav-link text-light">Admin</a>
                            <a onclick="return confirm('Apakah anda yakin?')" href="assets/includes/logout.php" class="nav-link text-white">Logout</a>
                        </ul><?php
                    }
                // header ketika session user
                }else{
                    if(@$_GET){
                        if(isset($_GET["cari"])){
                            switch($_GET["cari"]){
                                case"":?>
                                    <span class="navbar-brand h1 mb-0 text-white">ZeeroXc</span>
                                    <ul class="nav justify-content-end">
                                        <form method="GET">
                                            <input style="margin-top: 5px;" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
                                            <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                                Cari
                                            </button>
                                        </form>
                                        <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                                        <a href="?p=profil" class="text-white nav-link">Profil</a>
                                        <a onclick="return confirm('Apakah anda yakin?')" href="assets/includes/logout.php" class="text-white nav-link">Logout</a>
                                    </ul><?php
                                    break;
                            }
                        }else{
                            switch($_GET["p"]){
                                // sesi user jika ke halaman admin
                                case"admin":
                                    header("Location: inc/..");
                                    break;
                                // sesi user jika ke halaman admin akun
                                case"adminAkun":
                                    header("Location: inc/..");
                                    break;
                                // sesi user jika ke halaman admin produk
                                case"adminProduk":
                                    header("Location: inc/..");
                                    break;
                                // sesi user jika ke halaman tambah data produk
                                case"tambahDataProduk":
                                    header("Location: inc/..");
                                    break;
                                // sesi user jika ke halaman reset password
                                case"resetPass":
                                    header("Location: inc/..");
                                    break;
                                // sesi user jika ke halaman konfirmasi email
                                case"konMail":
                                    header("Location: inc/..");
                                    break;
                                // sesi user jika ke halaman registrasi
                                case"registrasi":
                                    header("Location: inc/..");
                                    break;
                                // sesi user ketika ke halaman profil
                                case"profil":?>
                                    <a href="../ZeeroXc" class="navbar-brand h1 mb-0 text-white">ZeeroXc</a>
                                    <ul class="nav justify-content-end">
                                        <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                                        <a onclick="return confirm('Apakah anda yakin?')" href="assets/includes/logout.php" class="text-white nav-link">Logout</a>
                                    </ul><?php
                                    break;
                            }
                        }
                    // sesi user ketika tidak ada apa-apa di url (home)
                    }else{?>
                        <span class="navbar-brand h1 mb-0 text-white">ZeeroXc</span>
                        <ul class="nav justify-content-end">
                            <form method="GET">
                                <input style="margin-top: 5px;" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
                                <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                    Cari
                                </button>
                            </form>
                            <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                            <a href="?p=profil" class="text-white nav-link">Profil</a>
                            <a onclick="return confirm('Apakah anda yakin?')" href="assets/includes/logout.php" class="text-white nav-link">Logout</a>
                        </ul><?php
                    }
                }
            }?>
    </div>
</div>