<div class="navbar bg-primary">
    <div class="container-fluid">
        <!--<?php
            $i = 0;
            if(@$_GET){
                switch($_GET['p']){
                    case "registrasi";
        ?>
                    <a href="inc/../" class="navbar-brand h1 mb-0 text-white">ZeeroXc</a>
                    <ul class="nav justify-content-end">
                        <span class="text-primary">Register</span>
                        <span class="text-primary">Login</span>
                    </ul>
        <?php
                    $i = 1;
                        break;
                    case "login";
        ?>
                    <a href="inc/../" class="navbar-brand h1 mb-0 text-white">ZeeroXc</a>
                    <ul class="nav justify-content-end">
                        <span class="text-primary">Register</span>
                        <span class="text-primary">Login</span>
                    </ul>
        <?php
                    $i = 2;
                        break;
                }
            }
            if($i == 0){
        ?>
                <span class="navbar-brand h1 mb-0">ZeeroXc</span>
                <ul class="nav justify-content-end">
                    <a href="?p=registrasi" class="nav-link text-light">Register</a>
                    <a href="?p=login" class="nav-link text-light">Login</a>
                </ul>
        <?php
            }
        ?>-->
        <?php
            if(@$_GET){
                switch($_GET["p"]){
                    case"registrasi":
        ?>
                        <a href="inc/.." class="navbar-brand h1 mb-0 text-white">ZeeroXc</a>
                        <ul class="nav justify-content-end">
                            <span class="text-primary">Register</span>
                            <a href="?p=login" class="text-white">Login</a>
                        </ul>
        <?php
                        break;
                    case"login":
        ?>
                        <a href="inc/.." class="navbar-brand h1 mb-0 text-white">ZeeroXc</a>
                        <ul class="nav justify-content-end">
                            <a href="?p=registrasi" class="text-white">Register</a>
                            <span class="text-primary">Login</span>
                        </ul>
        <?php
                        break;
                    case"admin":
        ?>
                        <a href="inc/.." class="navbar-brand h1 mb-0 text-white">ZeeroXc</a>
                        <ul class="nav justify-content-end">
                            <span class="text-white"><?= $_SESSION['username']; ?></span>
                            &nbsp;&nbsp;
                            <a href="?p=registrasi" class="text-white">Tambah Data</a>
                            &nbsp;&nbsp;
                            <a href="assets/includes/logout.php" class="text-white">Logout</a>
                        </ul>
        <?php
                        break;
                    case"user":
        ?>
                        <a href="inc/.." class="navbar-brand h1 mb-0 text-white">ZeeroXc</a>
                        <ul class="nav justify-content-end">
                            <span class="text-white"><?= $_SESSION['username']; ?></span>
                            &nbsp;&nbsp;
                            <a href="assets/includes/logout.php" class="text-white">Logout</a>
                        </ul>
        <?php
                        break;
                }
            }else{
        ?>
                <span class="navbar-brand h1 mb-0 text-light">ZeeroXc</span>
                <ul class="nav justify-content-end">
                    <a href="?p=registrasi" class="nav-link text-light">Register</a>
                    <a href="?p=login" class="nav-link text-light">Login</a>
                </ul>
        <?php
            }
        ?>
    </div>
</div>