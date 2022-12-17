<div class="navbar bg-primary">
    <div class="container-fluid">
        <?php
            if(empty($_SESSION["username"])){
                if(@$_GET){
                    switch($_GET["p"]){
                        case"registrasi":?>
                            <a href="inc/.." class="navbar-brand h1 mb-0 text-white">ZeeroXc</a>
                            <ul class="nav justify-content-end">
                                <a href="?p=login" class="text-white">Login</a>
                            </ul>
                            <?php
                            break;
                        case"login":
                            ?>
                            <a href="inc/.." class="navbar-brand h1 mb-0 text-white">ZeeroXc</a>
                            <ul class="nav justify-content-end">
                                <a href="?p=registrasi" class="text-white">Register</a>
                            </ul><?php
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
            }else{
                if($_SESSION["username"] == 'ZeeroXc'){
                    if(@$_GET){
                        switch($_GET["p"]){
                            case"admin":?>
                                <span class="navbar-brand h1 mb-0 text-white">ZeeroXc</span>
                                <ul class="nav justify-content-end">
                                    <span class="nav-link text-white"><?= $_SESSION['username']; ?></span>
                                    <a href="?p=registrasi" class="nav-link text-white">Tambah Data</a>
                                    <a href="assets/includes/logout.php" class="nav-link text-white">Logout</a>
                                </ul><?php
                                break;
                            case"registrasi":?>
                                <span class="navbar-brand h1 mb-0 text-white">ZeeroXc</span>
                                <ul class="nav justify-content-end">
                                    <span class="text-primary">Register</span>
                                    <a href="?p=admin" class="text-white">Admin</a>
                                </ul><?php
                                break;
                            case"edit":?>
                                <span class="navbar-brand h1 mb-0 text-white">ZeeroXc</span>
                                <ul class="nav justify-content-end">
                                    <span class="text-primary">Register</span>
                                    <a href="?p=admin" class="text-white">Admin</a>
                                </ul><?php
                                break;
                        }
                    }
                }else{
                    if(@$_GET){
                        switch($_GET["p"]){
                            case"user":?>
                                <span class="navbar-brand h1 mb-0 text-white">ZeeroXc</span>
                                <ul class="nav justify-content-end">
                                    <span class="text-white nav-link"><?= $_SESSION['username']; ?></span>
                                    <a href="assets/includes/logout.php" class="text-white nav-link">Logout</a>
                                </ul><?php
                                break;
                        }
                    }
                }
            }
        ?>
    </div>
</div>