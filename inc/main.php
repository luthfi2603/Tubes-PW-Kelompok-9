<?php
    if(@$_GET){
        if(isset($_GET["cari"])){
            switch($_GET["cari"]){
                case"":
                    include "page/home.php";
                    break;
            }
        }else{
            switch($_GET["p"]){
                case"registrasi":
                    include "page/registrasi.php";
                    break;
                case"login":
                    include "page/login.php";
                    break;
                case"admin":
                    include "page/admin.php";
                    break;
                case"hapus":
                    include "page/hapus.php";
                    break;
                case"ubah":
                    include "page/ubah.php";
                    break;
                case"konMail":
                    include "page/konMail.php";
                    break;
                case"resetPass":
                    include "page/resetPass.php";
                    break;
                case"profil":
                    include "page/profil.php";
                    break;
                case"adminAkun":
                    include "page/adminAkun.php";
                    break;
                case"adminProduk":
                    include "page/adminProduk.php";
                    break;
                case"tambahDataProduk":
                    include "page/tambahDataProduk.php";
                    break;
                case"ubahDataProduk":
                    include "page/ubahDataProduk.php";
                    break;
                case"logout":
                    include "page/logout.php";
                    break;
                case"":
                    include "page/home.php";
                    break;
                case"detail":
                    include "page/detail.php";
                    break;
                case"keranjang":
                    include "page/keranjang.php";
                    break;
                case"konPembayaran":
                    include "page/konPembayaran.php";
                    break;
                case"buktiPembelian":
                    include "page/buktiPembelian.php";
                    break;
                case"adminPesanan":
                    include "page/adminPesanan.php";
                    break;
                case"editPembelian":
                    include "page/editPembelian.php";
                    break;
                case"printPembelian":
                    include "page/printPembelian.php";
                    break;
                default:
                    echo'
                        <div class="container mtNav">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="text-center">Halaman Tidak Ditemukan</h2>
                                </div>
                            </div>
                        </div>
                    ';
                    break;
            }
        }
    }else{
        // cek cookie
        if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
            $id = $_COOKIE['id'];
            $key = $_COOKIE['key'];

            // ambil username berdasarkan id
            $hasil = mysqli_query($conn, "SELECT * FROM akun WHERE id = $id");
            $isi = mysqli_fetch_assoc($hasil);

            // cek cookie dan username
            if($key === hash('sha256', $isi['username'])){
                $_SESSION['username'] = $isi['username'];
                $_SESSION['email'] = $isi['email'];
                $_SESSION['img'] = $isi['img'];
                $_SESSION['id'] = $isi['id'];
                $_SESSION['level'] = $isi['level'];
                // echo"<meta http-equiv='refresh' content='0; url = index.php'>";
            }
        }
        include "page/home.php";
    }
?>