<?php
    if(@$_GET){
        switch($_GET["p"]){
            case 'registrasi':
                include "page/registrasi.php";
                break;
            
            default:
                # code...
                break;
        }
    }else{
        include "page/home.php";
    }
?>