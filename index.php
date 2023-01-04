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
    <link rel="shortcut icon" href="assets/img/favicon2.PNG" type="image/x-icon">
    <style>
        <?php
            // memasukkan custom css
            include "assets/css/css.php";
        ?>
    </style>
</head>
<body class="bg-badan">
    <?php
        // memasukkan navbar dan isi halaman
        include "inc/header.php";
        include "inc/main.php";
        // include "inc/footer.php";
        include "inc/backToTop.php";
    ?>
    <script type="text/javascript">
        <?php
            // memasukkan custom javascript
            include "assets/js/js.php"; 
        ?>
    </script>
</body>
</html>