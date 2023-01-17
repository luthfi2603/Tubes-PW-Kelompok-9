<div class="navbar bg-ijo fixed-top">
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
                                <a href="inc/.." class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                <ul class="nav justify-content-end">
                                    <form method="GET">
                                        <input class="cari" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Cari...">
                                        <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                            Cari
                                        </button>
                                    </form>
                                    <a href="?p=registrasi" class="nav-link text-white">Daftar</a>
                                    <a href="?p=login" class="nav-link text-white">Masuk</a>
                                </ul><?php
                                break;
                        }
                    // ketika belum login tidak ada yang dicari
                    }else{
                        switch($_GET["p"]){
                            // belum login pindah ke halaman lain (pagination)
                            case"":?>
                                <a href="inc/.." class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                <ul class="nav justify-content-end">
                                    <form method="GET">
                                        <input class="cari" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Cari...">
                                        <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                            Cari
                                        </button>
                                    </form>
                                    <a href="?p=registrasi" class="nav-link text-white">Daftar</a>
                                    <a href="?p=login" class="nav-link text-white">Masuk</a>
                                </ul><?php
                                break;
                            // belum login di halaman registrasi
                            case"registrasi":?>
                                <a href="inc/.." class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                <ul class="nav justify-content-end">
                                    <a href="?p=login" class="nav-link text-white">Masuk</a>
                                </ul><?php
                                break;
                            // belum login di halaman login
                            case"login":?>
                                <a href="inc/.." class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                <ul class="nav justify-content-end">
                                    <a href="?p=registrasi" class="nav-link text-white">Daftar</a>
                                </ul><?php
                                break;
                            // belum login di halaman reset password
                            case"resetPass":
                                // belum memasukkan email yang sesuai
                                if(empty($_GET["email"])){
                                    echo"
                                        <script>
                                            document.location.href = '?p=konMail';
                                        </script>
                                    ";
                                // berada di halaman reset password
                                }else{?>
                                    <a href="?p=konMail" class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                    <ul class="nav justify-content-end">
                                        <span class="nav-link text-ijo">invisible</span>
                                    </ul><?php
                                    break;
                                }
                            // belum login mau konfirmasi email
                            case"konMail":?>
                                <a href="inc/.." class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                <ul class="nav justify-content-end">
                                    <a href="?p=registrasi" class="nav-link text-white">Daftar</a>
                                    <a href="?p=login" class="nav-link text-white">Masuk</a>
                                </ul><?php
                                break;
                            // belum login ke halaman detail produk
                            // &quot;javascript:history.go(-1)&quot;
                            case"detail":?>
                                <a href="inc/.." class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                <ul class="nav justify-content-end">
                                    <a href="?p=registrasi" class="nav-link text-white">Daftar</a>
                                    <a href="?p=login" class="nav-link text-white">Masuk</a>
                                </ul><?php
                                break;
                            // belum login mau ke halaman logout
                            case"logout":
                                echo"
                                    <script>
                                        document.location.href = 'inc/..';
                                    </script>
                                ";
                                break;
                            // belum login mau ke halaman admin
                            case"admin":
                                echo"
                                    <script>
                                        document.location.href = 'inc/..';
                                    </script>
                                ";
                                break;
                            // belum login mau ke halaman admin akun
                            case"adminAkun":
                                echo"
                                    <script>
                                        document.location.href = 'inc/..';
                                    </script>
                                ";
                                break;
                            // belum login mau ke halaman admin pesanan
                            case"adminPesanan":
                                echo"
                                    <script>
                                        document.location.href = 'inc/..';
                                    </script>
                                ";
                                break;
                            // belum login mau ke halaman admin produk
                            case"adminProduk":
                                echo"
                                    <script>
                                        document.location.href = 'inc/..';
                                    </script>
                                ";
                                break;
                            // belum login mau ke halaman bukti pembelian
                            case"buktiPembelian":
                                echo"
                                    <script>
                                        document.location.href = 'inc/..';
                                    </script>
                                ";
                                break;
                            // belum login mau ke halaman edit pembelian
                            case"editPembelian":
                                echo"
                                    <script>
                                        document.location.href = 'inc/..';
                                    </script>
                                ";
                                break;
                            // belum login mau ke halaman hapus
                            case"hapus":
                                echo"
                                    <script>
                                        document.location.href = 'inc/..';
                                    </script>
                                ";
                                break;
                            // belum login mau ke halaman konfirmasi pembayaran
                            case"konPembayaran":
                                echo"
                                    <script>
                                        document.location.href = 'inc/..';
                                    </script>
                                ";
                                break;
                            // belum login mau ke halaman print pembelian
                            case"printPembelian":
                                echo"
                                    <script>
                                        document.location.href = 'inc/..';
                                    </script>
                                ";
                                break;
                            // belum login mau ke halaman profil
                            case"profil":
                                echo"
                                    <script>
                                        document.location.href = 'inc/..';
                                    </script>
                                ";
                                break;
                            // belum login mau ke halaman tambah data produk
                            case"tambahDataProduk":
                                echo"
                                    <script>
                                        document.location.href = 'inc/..';
                                    </script>
                                ";
                                break;
                            // belum login mau ke halaman ubah di admin
                            case"ubah":
                                echo"
                                    <script>
                                        document.location.href = 'inc/..';
                                    </script>
                                ";
                                break;
                            // belum login mau ke halaman ubah data produk
                            case"ubahDataProduk":
                                echo"
                                    <script>
                                        document.location.href = 'inc/..';
                                    </script>
                                ";
                                break;
                            // jika halaman tidak ada
                            default:?>
                                <a href="inc/.." class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                <ul class="nav justify-content-end">
                                    <form method="GET">
                                        <input class="cari" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Cari...">
                                        <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                            Cari
                                        </button>
                                    </form>
                                    <a href="?p=registrasi" class="nav-link text-white">Daftar</a>
                                    <a href="?p=login" class="nav-link text-white">Masuk</a>
                                </ul><?php
                                break;
                        }
                    }
                // belum login tidak ada url
                }else{?>
                    <span class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></span>
                    <ul class="nav justify-content-end">
                        <form method="GET">
                            <input class="cari" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Cari...">
                            <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                Cari
                            </button>
                        </form>
                        <a href="?p=registrasi" class="nav-link text-white">Daftar</a>
                        <a href="?p=login" class="nav-link text-white">Masuk</a>
                    </ul><?php
                }
            // ketika sudah login
            }else{
                // header ketika sesi admin
                if($_SESSION["level"] == 1){
                    // udah login sebagai admin ada url
                    if(@$_GET){
                        // sesi admin di home ada yang dicari
                        if(isset($_GET["cari"])){
                            switch($_GET["cari"]){
                                case"":?>
                                    <a href="inc/.." class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                    <ul class="nav justify-content-end">
                                        <form method="GET">
                                            <input class="cari" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Cari...">
                                            <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                                Cari
                                            </button>
                                        </form>
                                        <a href="?p=admin" class="nav-link text-white">Admin</a>
                                        <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="nav-link text-white">Keluar</a>
                                    </ul><?php
                                    break;
                            }
                        // ketika sesi admin tidak ada yang dicari
                        }else{
                            switch($_GET["p"]){
                                // sudah login sesi admin pindah ke halaman lain (pagination)
                                case"":?>
                                    <a href="inc/.." class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                    <ul class="nav justify-content-end">
                                        <form method="GET">
                                            <input class="cari" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Cari...">
                                            <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                                Cari
                                            </button>
                                        </form>
                                        <a href="?p=admin" class="nav-link text-white">Admin</a>
                                        <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="nav-link text-white">Keluar</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman admin
                                case"admin":?>
                                    <a href="inc/.." class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                    <ul class="nav justify-content-end">
                                        <span class="nav-link text-white"><?= $_SESSION['username']; ?></span>
                                        <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                                        <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="nav-link text-white">Keluar</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman tambah data akun
                                case"registrasi":?>
                                    <span class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></span>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=adminAkun" class="nav-link text-white">Admin Akun</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman ubah data akun
                                case"ubah":?>
                                    <span class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></span>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=adminAkun" class="nav-link text-white">Admin Akun</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman data akun
                                case"adminAkun":?>
                                    <a href="?p=adminAkun" class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=registrasi" class="nav-link text-white">Tambah Data</a>
                                        <a href="?p=admin" class="nav-link text-white">Admin</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi ketika admin di halaman data produk
                                case"adminProduk":?>
                                    <a href="?p=adminProduk" class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=tambahDataProduk" class="nav-link text-white">Tambah Produk</a>
                                        <a href="?p=admin" class="nav-link text-white">Admin</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman tambah data produk
                                case"tambahDataProduk":?>
                                    <span class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></span>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=adminProduk" class="nav-link text-white">Admin Produk</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman ubah data produk
                                case"ubahDataProduk":?>
                                    <span class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></span>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=adminProduk" class="nav-link text-white">Admin Produk</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman pesanan
                                case"adminPesanan":?>
                                    <span class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></span>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=admin" class="nav-link text-white">Admin</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman edit pembelian
                                case"editPembelian":?>
                                    <span class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></span>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=adminPesanan" class="nav-link text-white">Admin Pesanan</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman print pembelian
                                case"printPembelian":?>
                                    <span class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></span>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=adminPesanan" class="nav-link text-white">Admin Pesanan</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman detail
                                case"detail":?>
                                    <a href="inc/.." class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=admin" class="nav-link text-white">Admin</a>
                                    </ul><?php
                                    break;
                                // sudah login sesi admin ketika di halaman bukti pembelian
                                case"buktiPembelian":
                                    echo"
                                        <script>
                                            document.location.href = '?p=admin';
                                        </script>
                                    ";
                                    break;
                                // sudah login sesi admin ketika di halaman keranjang
                                case"keranjang":
                                    echo"
                                        <script>
                                            document.location.href = '?p=admin';
                                        </script>
                                    ";
                                    break;
                                // sudah login sesi admin ketika di halaman konfirmasi email
                                case"konMail":
                                    echo"
                                        <script>
                                            document.location.href = '?p=admin';
                                        </script>
                                    ";
                                    break;
                                // sudah login sesi admin ketika di halaman konfirmasi pembayaran
                                case"konPembayaran":
                                    echo"
                                        <script>
                                            document.location.href = '?p=admin';
                                        </script>
                                    ";
                                    break;
                                // sudah login sesi admin ketika di halaman login
                                case"login":
                                    echo"
                                        <script>
                                            document.location.href = '?p=admin';
                                        </script>
                                    ";
                                    break;
                                // sudah login sesi admin ketika di halaman login
                                case"profil":
                                    echo"
                                        <script>
                                            document.location.href = '?p=admin';
                                        </script>
                                    ";
                                    break;
                                // sudah login sesi admin ketika di halaman reset password
                                case"resetPass":
                                    echo"
                                        <script>
                                            document.location.href = '?p=admin';
                                        </script>
                                    ";
                                    break;
                                // jika halaman tidak ada
                                default:?>
                                    <a href="?p=admin" class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
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
                        <span class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></span>
                        <ul class="nav justify-content-end">
                            <form method="GET">
                                <input class="cari" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Cari...">
                                <button type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
                                    Cari
                                </button>
                            </form>
                            <a href="?p=admin" class="nav-link text-white">Admin</a>
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
                                    <a href="inc/.." class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                    <ul class="nav justify-content-end">
                                        <form method="GET">
                                            <input class="cari" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Cari...">
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
                                    <a href="inc/.." class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                    <ul class="nav justify-content-end">
                                    <form method="GET">
                                        <input 
                                            class="cari"
                                            autocomplete="off"
                                            size="40"
                                            type="text"
                                            name="keyword"
                                            placeholder="Cari..."
                                        >
                                        <button 
                                            type="submit"
                                            name="cari"
                                            class="btn btn-sm btn-outline-light mb-1"
                                        >
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
                                    <a href="inc/.." class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                    <ul class="nav justify-content-end">
                                        <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                                        <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                                    </ul><?php
                                    break;
                                // sudah login sesi user ke halaman detail produk
                                case"detail":?>
                                    <a href="inc/.." class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                    <ul class="nav justify-content-end">
                                        <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                                        <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                                    </ul><?php
                                    break;
                                // sudah login sesi user ke halaman konfirmasi pembayaran
                                case"konPembayaran":
                                    if(!isset($_SESSION["keranjang"])){
                                        echo"
                                            <script>
                                                document.location.href = 'inc/..';
                                            </script>
                                        ";
                                    }else{?>
                                        <a href="?p=keranjang" class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                        <ul class="nav justify-content-end">
                                            <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                                            <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                                        </ul><?php
                                    }
                                    break;
                                // sudah login sesi user ke halaman bukti pembelian
                                case"buktiPembelian":
                                    if(!isset($_SESSION["id_pembelian"])){
                                        echo"
                                            <script>
                                                document.location.href = 'inc/..';
                                            </script>
                                        ";
                                    }else{?>
                                        <a href="?p=konPembayaran" class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                        <ul class="nav justify-content-end">
                                            <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                                            <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                                        </ul><?php
                                    }
                                    break;
                                // sesi user jika ke halaman admin
                                case"admin":
                                    echo"
                                        <script>
                                            document.location.href = 'inc/..';
                                        </script>
                                    ";
                                    break;
                                // sesi user jika ke halaman admin akun
                                case"adminAkun":
                                    echo"
                                        <script>
                                            document.location.href = 'inc/..';
                                        </script>
                                    ";
                                    break;
                                // sesi user jika ke halaman admin pesanan
                                case"adminPesanan":
                                    echo"
                                        <script>
                                            document.location.href = 'inc/..';
                                        </script>
                                    ";
                                    break;
                                // sesi user jika ke halaman admin produk
                                case"adminProduk":
                                    echo"
                                        <script>
                                            document.location.href = 'inc/..';
                                        </script>
                                    ";
                                    break;
                                // sesi user jika ke halaman edit pembelian
                                case"editPembelian":
                                    echo"
                                        <script>
                                            document.location.href = 'inc/..';
                                        </script>
                                    ";
                                    break;
                                // sesi user jika ke halaman hapus
                                case"hapus":
                                    echo"
                                        <script>
                                            document.location.href = 'inc/..';
                                        </script>
                                    ";
                                    break;
                                // sesi user jika ke halaman tambah data produk
                                case"tambahDataProduk":
                                    echo"
                                        <script>
                                            document.location.href = 'inc/..';
                                        </script>
                                    ";
                                    break;
                                // sesi user jika ke halaman reset password
                                case"resetPass":?>
                                    <a href="inc/.." class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                    <ul class="nav justify-content-end">
                                        <a href="?p=profil" class="nav-link text-white">Profil</a>
                                    </ul><?php
                                    break;
                                // sesi user jika ke halaman konfirmasi email
                                case"konMail":
                                    echo"
                                        <script>
                                            document.location.href = 'inc/..';
                                        </script>
                                    ";
                                    break;
                                // sesi user jika ke halaman registrasi
                                case"registrasi":
                                    echo"
                                        <script>
                                            document.location.href = 'inc/..';
                                        </script>
                                    ";
                                    break;
                                // sesi user jika ke halaman login
                                case"login":
                                    echo"
                                        <script>
                                            document.location.href = 'inc/..';
                                        </script>
                                    ";
                                    break;
                                // sesi user jika ke halaman print pembelian
                                case"printPembelian":
                                    echo"
                                        <script>
                                            document.location.href = 'inc/..';
                                        </script>
                                    ";
                                    break;
                                // sesi user jika ke halaman ubah
                                case"ubah":
                                    echo"
                                        <script>
                                            document.location.href = 'inc/..';
                                        </script>
                                    ";
                                    break;
                                // sesi user jika ke halaman ubah data produk
                                case"ubahDataProduk":
                                    echo"
                                        <script>
                                            document.location.href = 'inc/..';
                                        </script>
                                    ";
                                    break;
                                // sesi user ketika ke halaman profil
                                case"profil":?>
                                    <a href="inc/.." class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                    <ul class="nav justify-content-end">
                                        <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                                        <img src="assets/img/<?= $_SESSION["img"]; ?>" alt="" class="rounded-circle avatarProfil">
                                        <a onclick="return confirm('Apakah anda yakin?')" href="?p=logout" class="text-white nav-link">Keluar</a>
                                    </ul><?php
                                    break;
                                // jika halaman tidak ada
                                default:?>
                                    <a href="inc/.." class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></a>
                                    <ul class="nav justify-content-end">
                                        <form method="GET">
                                            <input class="cari" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Cari...">
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
                        <span class="navbar-brand ms-3 h1 mb-0 text-white"><img src="assets/img/logo4.png" height="50px"></span>
                        <ul class="nav justify-content-end">
                            <form method="GET">
                                <input id="keyword" class="cari" autocomplete="off" size="40" type="text" name="keyword" id="" placeholder="Cari...">
                                <button id="tombol-cari" type="submit" name="cari" class="btn btn-sm btn-outline-light mb-1">
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