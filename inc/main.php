<?php
    if(@$_GET){
        if(isset($_GET["cari"])){
            switch($_GET["cari"]){
                case"":
                    include "page/home.php";
                    ;
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
            }
        }
    }else{
        include "page/home.php";
    }
?>