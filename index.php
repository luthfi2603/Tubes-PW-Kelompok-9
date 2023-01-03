<?php
    require "includes/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KyuuDent_Store</title>
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <!-- memasukkan custom css -->
    <style>
        <?php
            include "assets/css/css.php";
        ?>
    </style>
</head>
<body class="bg-bg-custom">
    <!-- memasukkan navbar dan isi halaman -->
    <?php
        include "inc/header.php";
        include "inc/main.php";
        // include "inc/footer.php";
    ?>
    <!-- tombol back to top -->
    <div class='back-to-top'>
        <svg viewBox="0 0 20 20">
            <polyline points="4 13 10 7 16 13"></polyline>
        </svg>
    </div>
    <!-- memasukkan custom javascript -->
    <script type="text/javascript">
        <?php
            include "assets/js/js.php"; 
        ?>
    </script>
</body>
</html>