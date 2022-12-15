<div class="navbar bg-primary">
    <div class="container-fluid">
        <?php
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
        ?>
    </div>
</div>