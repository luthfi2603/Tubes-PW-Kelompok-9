<?php
    require "assets/includes/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZeeroXc</title>
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
        .isiAdmin {
            margin-top: 30px;
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
        function change(){
            var x = document.getElementById('mypass').type;

            if(x == 'password'){
                document.getElementById('mypass').type = 'text';
                document.getElementById('mybutton').innerHTML = 'lihat';
            }else{
                document.getElementById('mypass').type = 'password';
                document.getElementById('mybutton').innerHTML = 'tutup';
            }
        }
    </script>
</body>
</html>