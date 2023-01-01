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
        .deskripsi {
            margin-bottom: 0.5rem;
            height:100px;
            overflow:hidden;
        }
        .deskAdminProduk {
            text-align:justify;
        }
        .mtNav {
            margin-top:80px;
        }
        .back-to-top {
            position: fixed;
            right: 20px;
            bottom: -40px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            background-color: #17a2b8;
            opacity: 0;
            border-radius: 50%;
            transition: .2s ease-in-out;
            z-index: 20px;
        }
        /* Untuk memunculkan tombol */
        .back-to-top.show {
            bottom: 20px;
            opacity: 1;
        }
        .back-to-top svg {
            width: 20px;
            height: 20px;
            fill: none;
            stroke: #ffffff;
            stroke-width: 1px;
            stroke-linejoin: round;
            stroke-linecap: round;
        }
        .detail {
            margin: 80px auto 1.5rem auto;
        }
    </style>
</head>
<body>
    <!-- memasukkan navbar dan isi halaman -->
    <?php
        include "inc/header.php";
        include "inc/main.php";
    ?>
    <div class='back-to-top'>
        <svg viewBox="0 0 20 20">
            <polyline points="4 13 10 7 16 13"></polyline>
        </svg>
    </div>
    <script type="text/javascript">
        // untuk tombol lihat dan tutup password
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

        // untuk tombol back to the top
        var backToTop = document.querySelector('.back-to-top');
        window.addEventListener('scroll', () => {
            if (this.scrollY >= 100) {
                backToTop.classList.add('show');

                backToTop.addEventListener('click', () => {
                    window.scrollTo({ top: 0 });
                })
            } else {
                backToTop.classList.remove('show');
            }
        });
        function PrintDiv(divName){
            var printContents = document.getElementById(divName).innerHTML;
            var orginialContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = orginialContents;
        }
    </script>
</body>
</html>