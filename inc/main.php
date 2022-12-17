<?php
    if(@$_GET){
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
            case"user":
                include "page/user.php";
                break;
            case"hapus":
                include "page/hapus.php";
                break;
            case"edit":
                include "page/edit.php";
                break;
        }
    }else{
        include "page/home.php";
    }
?>