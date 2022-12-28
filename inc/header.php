<div class="navbar bg-primary">
    <div class="container-fluid">
        <?php
            // ketika belum login
            if(empty($_SESSION["username"])){
                // ketika belum login ada url
                if(@$_GET){
                    // ketika belum login ada yang dicari
                    if(isset($_GET["cari"])){
                        switch($_GET["cari"]){
                            case"":?>
                                <a href="inc/.." class="navbar-brand h1 mb-0 text-light">kyuustore</a>
                                <ul class="nav justify-content-end">
                                    <form method="GET">
                                        <input style="margin-top: 5px;" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
                                        <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                            Cari
                                        </button>
                                    </form>
                                    <a href="?p=registrasi" class="nav-link text-light">Register</a>
                                    <a href="?p=login" class="nav-link text-light">Login</a>
                                </ul><?php
                                break;
                        }
                    // ketika belum login tidak ada yang dicari
                    }else{
                        switch($_GET["p"]){
                            // belum login di halaman registrasi
                            case"registrasi":?>
                                <a href="inc/.." class="navbar-brand h1 mb-0 text-white">kyuustore</a>
                                <ul class="nav justify-content-end">
                                    <a href="?p=login" class="nav-link text-white">Login</a>
                                </ul><?php
                                break;
                            // belum login di halaman login
                            case"login":?>
                                <a href="inc/.." class="navbar-brand h1 mb-0 text-white">kyuustore</a>
                                <ul class="nav justify-content-end">
                                    <a href="?p=registrasi" class="nav-link text-white">Register</a>
                                </ul><?php
                                break;
                            // belum login mau ke halaman logout
                            case"logout":
                                header("Location: inc/..");
                                break;
                            // belum login mau ke halaman admin
                            case"admin":
                                header("Location: inc/..");
                                break;
                            // belum login mau ke halaman admin akun
                            case"adminAkun":
                                header("Location: inc/..");
                                break;
                            // belum login mau ke halaman admin produk
                            case"adminProduk":
                                header("Location: inc/..");
                                break;
                            // belum login mau ke halaman hapus
                            case"hapus":
                                header("Location: inc/..");
                                break;
                            // belum login mau ke halaman profil
                            case"profil":
                                header("Location: inc/..");
                                break;
                            // belum login mau ke halaman tambah data produk
                            case"tambahDataProduk":
                                header("Location: inc/..");
                                break;
                            // belum login mau ke halaman ubah di admin
                            case"ubah":
                                header("Location: inc/..");
                                break;
                            // belum login mau ke halaman ubah data produk
                            case"ubahDataProduk":
                                header("Location: inc/..");
                                break;
                            // belum login mau konfirmasi email
                            case"konMail":?>
                                <a href="inc/.." class="navbar-brand h1 mb-0 text-white">kyuustore</a>
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
                                // berada di halaman reset password
                                }else{?>
                                    <a href="?p=konMail" class="navbar-brand h1 mb-0 text-light">kyuustore</a>
                                    <ul class="nav justify-content-end">
                                        <span href="?p=registrasi" class="nav-link text-primary">Register</span>
                                    </ul><?php
                                    break;
                                }
                        }
                    }
                // belum login tidak ada url
                }else{?>
                    <span class="navbar-brand h1 mb-0 text-light">kyuustore</span>
                    <ul class="nav justify-content-end">
                        <form method="GET">
                            <input style="margin-top: 5px;" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
                            <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                Cari
                            </button>
                        </form>
                        <a href="?p=registrasi" class="nav-link text-light">Register</a>
                        <a href="?p=login" class="nav-link text-light">Login</a>
                    </ul><?php
                }
            // ketika sudah login
            }else{
                // header ketika session admin
                if($_SESSION["username"] == 'ZeeroXc'){
                    // udah login sebagai admin ada url
                    if(@$_GET){
                        if(isset($_GET["cari"])){
                            switch($_GET["cari"]){
                                case"":?>
                                    <a href="inc/.." class="navbar-brand h1 mb-0 text-light">kyuustore</a>
                                    <ul class="nav justify-content-end">
                                        <form method="GET">
                                            <input style="margin-top: 5px;" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
                                            <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                                Cari
                                            </button>
                                        </form>
                                        <a href="?p=admin" class="nav-link text-light">Admin</a>
                                        <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="nav-link text-white">Logout</a>
                                    </ul><?php
                                    break;
                            }
                        // ketika sesi admin tidak ada yang dicari
                        }else{
                            switch($_GET["p"]){
                                // sudah login sesi admin ketika di halaman admin
                                case"admin":?>
                                    <span class="navbar-brand h1 mb-0 text-white">kyuustore</span>
                                    <ul class="nav justify-content-end">
                                        <span class="nav-link text-white"><?= $_SESSION['username']; ?></span>
                                        <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                                        <a href="inc/.." class="nav-link text-white">User</a>
                                        <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="nav-link text-white">Logout</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman tambah data akun
                                case"registrasi":?>
                                    <span class="navbar-brand h1 mb-0 text-white">kyuustore</span>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=adminAkun" class="nav-link text-white">Admin Akun</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman ubah data akun
                                case"ubah":?>
                                    <span class="navbar-brand h1 mb-0 text-white">kyuustore</span>
                                    <ul class="nav justify-content-end">
                                        <span class="text-primary">Register</span>
                                        <a href="?p=adminAkun" class="nav-link text-white">Admin Akun</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman data akun
                                case"adminAkun":?>
                                    <span class="navbar-brand h1 mb-0 text-white">kyuustore</span>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=registrasi" class="nav-link text-white">Tambah Data</a>
                                        <a href="?p=admin" class="nav-link text-white">Admin</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi ketika admin di halaman data produk
                                case"adminProduk":?>
                                    <span class="navbar-brand h1 mb-0 text-white">kyuustore</span>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=tambahDataProduk" class="nav-link text-white">Tambah Produk</a>
                                        <a href="?p=admin" class="nav-link text-white">Admin</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman tambah data produk
                                case"tambahDataProduk":?>
                                    <span class="navbar-brand h1 mb-0 text-white">kyuustore</span>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=adminProduk" class="nav-link text-white">Admin Produk</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman ubah data produk
                                case"ubahDataProduk":?>
                                    <span class="navbar-brand h1 mb-0 text-white">kyuustore</span>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=adminProduk" class="nav-link text-white">Admin Akun</a>
                                    </ul><?php
                                    break;
                            }
                        }
                    // session admin ketika di home
                    }else{?>
                        <span class="navbar-brand h1 mb-0 text-light">kyuustore</span>
                        <ul class="nav justify-content-end">
                            <form method="GET">
                                <input style="margin-top: 5px;" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
                                <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                    Cari
                                </button>
                            </form>
                            <a href="?p=admin" class="nav-link text-light">Admin</a>
                            <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="nav-link text-white">Logout</a>
                        </ul><?php
                    }
                // header ketika udah login session user
                }else{
                    // udah login sebagai user ada url
                    if(@$_GET){
                        // session user ketika ada yang dicari
                        if(isset($_GET["cari"])){
                            switch($_GET["cari"]){
                                case"":?>
                                    <a href="inc/.." class="navbar-brand h1 mb-0 text-white">kyuustore</a>
                                    <ul class="nav justify-content-end">
                                        <form method="GET">
                                            <input style="margin-top: 5px;" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
                                            <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                                Cari
                                            </button>
                                        </form>
                                        <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                                        <a href="?p=profil" class="text-white nav-link">Profil</a>
                                        <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                                        <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="text-white nav-link">Logout</a>
                                    </ul><?php
                                    break;
                            }
                        // session user ketika tidak ada yang dicari
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
                                case"resetPass":?>
                                    <a href="inc/.." class="navbar-brand h1 mb-0 text-light">kyuustore</a>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=profil" class="nav-link text-light">Profil</a>
                                    </ul><?php
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
                                    <a href="inc/.." class="navbar-brand h1 mb-0 text-white">kyuustore</a>
                                    <ul class="nav justify-content-end">
                                        <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                                        <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                                        <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="text-white nav-link">Logout</a>
                                    </ul><?php
                                    break;
                            }
                        }
                    // sesi user ketika tidak ada apa-apa di url (home)
                    }else{?>
                        <span class="navbar-brand h1 mb-0 text-white">kyuustore</span>
                        <ul class="nav justify-content-end">
                            <form method="GET">
                                <input style="margin-top: 5px;" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
                                <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                    Cari
                                </button>
                            </form>
                            <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                            <a href="?p=profil" class="text-white nav-link">Profil</a>
                            <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                            <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="text-white nav-link">Logout</a>
                        </ul><?php
                    }
                }
            }?>
    </div>
</div>