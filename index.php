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
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            background-color: lightblue;
            color: while;
        }
        .tombol {
            width: 100% !important;
        }
        .keTengah {
            margin: 0 auto !important;
        }
        .regDanLog {
            margin: 1.5rem auto !important;
        }
        .regDanLog2 {
            margin-left: 364px !important;
            margin-top: 1.5rem !important;
        }
        .marAdmin {
            margin: 1.5rem auto!important;
        }
        .avatarProfil {
            width:40px;
            height:40px;
        }
    </style>
</head>
<body>
    <?php
        include "inc/header.php";
        include "inc/main.php";
    ?>
    <script type="text/javascript">
        function change(i){
            if(i == 1){
                var x = document.getElementById('password').type;
                if(x == 'password'){
                    document.getElementById('password').type = 'text';
                    document.getElementById('btn1').innerHTML = 'tutup';
                }else{
                    document.getElementById('password').type = 'password';
                    document.getElementById('btn1').innerHTML = 'lihat';
                }
            }else{
                var x = document.getElementById('konPass').type;
                if(x == 'password'){
                    document.getElementById('konPass').type = 'text';
                    document.getElementById('btn2').innerHTML = 'tutup';
                }else{
                    document.getElementById('konPass').type = 'password';
                    document.getElementById('btn2').innerHTML = 'lihat';
                }
            }
        }
    </script>
</body>
</html>