<?php
    // memasukkan file fungsi
    require "includes/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KyuuDent_Store</title>
    <link rel="shortcut icon" href="assets/img/favicon3.ico" type="image/x-icon">
    <style>
        <?php
            // memasukkan custom css
            include "assets/css/css.php";
        ?>
    </style>
</head>
<body class="bg-badan font-mars">
    <?php
        // memasukkan navbar dan isi halaman
        include "inc/header.php";
        include "inc/main.php";
        include "inc/footer.php";
        include "inc/backToTop.php";
    ?>
    <script type="text/javascript">
        <?php
            // memasukkan custom javascript
            include "assets/js/js.php";
            if(@$_GET){
                if(isset($_GET["cari"]) or isset($_GET["hal"])){
                    echo"
                        window.scrollTo(0, 680);
                    ";
                }
            }
        ?>
    </script>
</body>
</html>