<div class="navbar bg-primary fixed-top">
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
                                <a href="inc/.." class="navbar-brand h1 mb-0 text-light">KyuuDent_Store</a>
                                <ul class="nav justify-content-end">
                                    <form method="GET">
                                        <input style="margin-top: 5px;" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
                                        <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                            Cari
                                        </button>
                                    </form>
                                    <a href="?p=registrasi" class="nav-link text-light">Daftar</a>
                                    <a href="?p=login" class="nav-link text-light">Masuk</a>
                                </ul><?php
                                break;
                        }
                    // ketika belum login tidak ada yang dicari
                    }else{
                        switch($_GET["p"]){
                            // belum login pindah ke halaman lain (pagination)
                            case"":?>
                                <a href="inc/.." class="navbar-brand h1 mb-0 text-light">KyuuDent_Store</a>
                                <ul class="nav justify-content-end">
                                    <form method="GET">
                                        <input style="margin-top: 5px;" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
                                        <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                            Cari
                                        </button>
                                    </form>
                                    <a href="?p=registrasi" class="nav-link text-light">Daftar</a>
                                    <a href="?p=login" class="nav-link text-light">Masuk</a>
                                </ul><?php
                                break;
                            // belum login di halaman registrasi
                            case"registrasi":?>
                                <a href="inc/.." class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</a>
                                <ul class="nav justify-content-end">
                                    <a href="?p=login" class="nav-link text-white">Masuk</a>
                                </ul><?php
                                break;
                            // belum login di halaman login
                            case"login":?>
                                <a href="inc/.." class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</a>
                                <ul class="nav justify-content-end">
                                    <a href="?p=registrasi" class="nav-link text-white">Daftar</a>
                                </ul><?php
                                break;
                            // belum login di halaman reset password
                            case"resetPass":
                                // belum memasukkan email yang sesuai
                                if(empty($_GET["email"])){
                                    header("Location: ?p=konMail");
                                // berada di halaman reset password
                                }else{?>
                                    <a href="?p=konMail" class="navbar-brand h1 mb-0 text-light">KyuuDent_Store</a>
                                    <ul class="nav justify-content-end">
                                        <span href="?p=registrasi" class="nav-link text-primary">Daftar</span>
                                    </ul><?php
                                    break;
                                }
                            // belum login mau konfirmasi email
                            case"konMail":?>
                                <a href="inc/.." class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</a>
                                <ul class="nav justify-content-end">
                                    <a href="?p=registrasi" class="nav-link text-light">Daftar</a>
                                    <a href="?p=login" class="nav-link text-light">Masuk</a>
                                </ul><?php
                                break;
                            // belum login ke halaman detail produk
                            // &quot;javascript:history.go(-1)&quot;
                            case"detail":?>
                                <a href="inc/.." class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</a>
                                <ul class="nav justify-content-end">
                                    <a href="?p=registrasi" class="nav-link text-light">Daftar</a>
                                    <a href="?p=login" class="nav-link text-light">Masuk</a>
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
                            // jika halaman tidak ada
                            default:?>
                                <a href="inc/.." class="navbar-brand h1 mb-0 text-light">KyuuDent_Store</a>
                                <ul class="nav justify-content-end">
                                    <form method="GET">
                                        <input style="margin-top: 5px;" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
                                        <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                            Cari
                                        </button>
                                    </form>
                                    <a href="?p=registrasi" class="nav-link text-light">Daftar</a>
                                    <a href="?p=login" class="nav-link text-light">Masuk</a>
                                </ul><?php
                                break;
                        }
                    }
                // belum login tidak ada url
                }else{?>
                    <span class="navbar-brand h1 mb-0 text-light">KyuuDent_Store</span>
                    <ul class="nav justify-content-end">
                        <form method="GET">
                            <input style="margin-top: 5px;" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
                            <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                Cari
                            </button>
                        </form>
                        <a href="?p=registrasi" class="nav-link text-light">Daftar</a>
                        <a href="?p=login" class="nav-link text-light">Masuk</a>
                    </ul><?php
                }
            // ketika sudah login
            }else{
                // header ketika sesi admin
                if($_SESSION["username"] == 'zeeroxc'){
                    // udah login sebagai admin ada url
                    if(@$_GET){
                        // sesi admin di home ada yang dicari
                        if(isset($_GET["cari"])){
                            switch($_GET["cari"]){
                                case"":?>
                                    <a href="inc/.." class="navbar-brand h1 mb-0 text-light">KyuuDent_Store</a>
                                    <ul class="nav justify-content-end">
                                        <form method="GET">
                                            <input style="margin-top: 5px;" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
                                            <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                                Cari
                                            </button>
                                        </form>
                                        <a href="?p=admin" class="nav-link text-light">Admin</a>
                                        <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="nav-link text-white">Keluar</a>
                                    </ul><?php
                                    break;
                            }
                        // ketika sesi admin tidak ada yang dicari
                        }else{
                            switch($_GET["p"]){
                                // sudah login sesi admin pindah ke halaman lain (pagination)
                                case"":?>
                                    <a href="inc/.." class="navbar-brand h1 mb-0 text-light">KyuuDent_Store</a>
                                    <ul class="nav justify-content-end">
                                        <form method="GET">
                                            <input style="margin-top: 5px;" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
                                            <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                                Cari
                                            </button>
                                        </form>
                                        <a href="?p=admin" class="nav-link text-light">Admin</a>
                                        <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="nav-link text-white">Keluar</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman admin
                                case"admin":?>
                                    <span class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</span>
                                    <ul class="nav justify-content-end">
                                        <span class="nav-link text-white"><?= $_SESSION['username']; ?></span>
                                        <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                                        <a href="inc/.." class="nav-link text-white">User</a>
                                        <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="nav-link text-white">Keluar</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman tambah data akun
                                case"registrasi":?>
                                    <span class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</span>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=adminAkun" class="nav-link text-white">Admin Akun</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman ubah data akun
                                case"ubah":?>
                                    <span class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</span>
                                    <ul class="nav justify-content-end">
                                        <span class="text-primary">Daftar</span>
                                        <a href="?p=adminAkun" class="nav-link text-white">Admin Akun</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman data akun
                                case"adminAkun":?>
                                    <a href="?p=adminAkun" class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</a>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=registrasi" class="nav-link text-white">Tambah Data</a>
                                        <a href="?p=admin" class="nav-link text-white">Admin</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi ketika admin di halaman data produk
                                case"adminProduk":?>
                                    <a href="?p=adminProduk" class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</a>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=tambahDataProduk" class="nav-link text-white">Tambah Produk</a>
                                        <a href="?p=admin" class="nav-link text-white">Admin</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman tambah data produk
                                case"tambahDataProduk":?>
                                    <span class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</span>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=adminProduk" class="nav-link text-white">Admin Produk</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman ubah data produk
                                case"ubahDataProduk":?>
                                    <span class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</span>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=adminProduk" class="nav-link text-white">Admin Akun</a>
                                    </ul><?php
                                    break;
                                // jika halaman tidak ada
                                default:?>
                                    <a href="?p=admin" class="navbar-brand h1 mb-0 text-light">KyuuDent_Store</a>
                                    <ul class="nav justify-content-end">
                                        <span class="nav-link text-white"><?= $_SESSION['username']; ?></span>
                                        <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                                        <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="nav-link text-white">Keluar</a>
                                    </ul><?php
                                    break;
                            }
                        }
                    // sesi admin ketika di home
                    }else{?>
                        <span class="navbar-brand h1 mb-0 text-light">KyuuDent_Store</span>
                        <ul class="nav justify-content-end">
                            <form method="GET">
                                <input style="margin-top: 5px;" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
                                <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                    Cari
                                </button>
                            </form>
                            <a href="?p=admin" class="nav-link text-light">Admin</a>
                            <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="nav-link text-white">Keluar</a>
                        </ul><?php
                    }
                // header ketika udah login sesi user
                }else{
                    // udah login sesi user ada url
                    if(@$_GET){
                        // sesi user ketika ada yang dicari
                        if(isset($_GET["cari"])){
                            switch($_GET["cari"]){
                                case"":?>
                                    <a href="inc/.." class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</a>
                                    <ul class="nav justify-content-end">
                                        <form method="GET">
                                            <input style="margin-top: 5px;" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
                                            <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                                Cari
                                            </button>
                                        </form>
                                        <a href="?p=keranjang" class="text-white nav-link">Keranjang</a>
                                        <a href="?p=profil" class="text-white nav-link">Profil</a>
                                        <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                                        <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                                        <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="text-white nav-link">Keluar</a>
                                    </ul><?php
                                    break;
                            }
                        // sesi user ketika tidak ada yang dicari
                        }else{
                            switch($_GET["p"]){
                                // sudah login sesi user pindah ke halaman lain (pagination)
                                case"":?>
                                    <a href="inc/.." class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</a>
                                    <ul class="nav justify-content-end">
                                    <form method="GET">
                                        <input style="margin-top: 5px;" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
                                        <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                            Cari
                                        </button>
                                    </form>
                                    <a href="?p=keranjang" class="text-white nav-link">Keranjang</a>
                                    <a href="?p=profil" class="text-white nav-link">Profil</a>
                                    <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                                    <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                                    <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="text-white nav-link">Keluar</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi user ke halaman keranjang
                                case"keranjang":?>
                                    <a href="inc/.." class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</a>
                                    <ul class="nav justify-content-end">
                                        <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                                        <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                                    </ul><?php
                                    break;
                                // sudah login sesi user ke halaman detail produk
                                case"detail":?>
                                    <a href="inc/.." class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</a>
                                    <ul class="nav justify-content-end">
                                        <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                                        <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                                    </ul><?php
                                    break;
                                // sudah login sesi user ke halaman konfirmasi pembayaran
                                case"konPembayaran":?>
                                    <a href="?p=keranjang" class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</a>
                                    <ul class="nav justify-content-end">
                                        <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                                        <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                                    </ul><?php
                                    break;
                                // sudah login sesi user ke halaman bukti pembelian
                                case"buktiPembelian":?>
                                    <a href="?p=konPembayaran" class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</a>
                                    <ul class="nav justify-content-end">
                                        <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                                        <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                                    </ul><?php
                                    break;
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
                                    <a href="inc/.." class="navbar-brand h1 mb-0 text-light">KyuuDent_Store</a>
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
                                    <a href="inc/.." class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</a>
                                    <ul class="nav justify-content-end">
                                        <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                                        <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                                        <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="text-white nav-link">Keluar</a>
                                    </ul><?php
                                    break;
                                // jika halaman tidak ada
                                default:?>
                                    <a href="inc/.." class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</a>
                                    <ul class="nav justify-content-end">
                                        <form method="GET">
                                            <input style="margin-top: 5px;" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
                                            <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                                Cari
                                            </button>
                                        </form>
                                        <a href="?p=keranjang" class="text-white nav-link">Keranjang</a>
                                        <a href="?p=profil" class="text-white nav-link">Profil</a>
                                        <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                                        <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                                        <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="text-white nav-link">Keluar</a>
                                    </ul><?php
                                    break;
                            }
                        }
                    // sesi user ketika tidak ada apa-apa di url (home)
                    }else{?>
                        <span class="navbar-brand h1 mb-0 text-white">KyuuDent_Store</span>
                        <ul class="nav justify-content-end">
                            <form method="GET">
                                <input style="margin-top: 5px;" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Search">
                                <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                    Cari
                                </button>
                            </form>
                            <a href="?p=keranjang" class="text-white nav-link">Keranjang</a>
                            <a href="?p=profil" class="text-white nav-link">Profil</a>
                            <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                            <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                            <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="text-white nav-link">Keluar</a>
                        </ul><?php
                    }
                }
            }?>
    </div>
</div>