<?php
    ob_start();

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
    <script>
        <?php
            // memasukkan jquery
            include "assets/js/jquery.php";
        ?>
    </script>
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
            // scroll logic
            if(@$_GET){
                if(isset($_GET['p'])){
                    switch($_GET['p']){
                        case"adminProduk":
                            
                            break;
                        case"":
                            if(isset($_GET['hal'])){
                                echo"
                                    document.getElementById('scroll').scrollIntoView();
                                ";
                            }
                            break;
                    }
                }else{
                    echo"
                        document.getElementById('scroll').scrollIntoView();
                    ";
                }
            }
        ?>

        // ambil elemen-elemen yang dibutuhkan
        var keyword = document.getElementById('keyword');
        var tombolCari = document.getElementById('tombol-cari');
        var bungkus = document.getElementById('bungkus');

        // tambahkan event ketika keyword ditulis
        keyword.addEventListener('keyup', function(){
            // buat objek ajax (asynchronus javascript and xml)
            var xhr = new XMLHttpRequest();

            // cek kesiapan ajax
            xhr.onreadystatechange = function(){
                if(xhr.readyState == 4 && xhr.status == 200){
                    bungkus.innerHTML = xhr.responseText;
                }
            }

            // eksekusi ajax
            xhr.open('GET', './assets/ajax/hasilSearch.php?keyword=' + keyword.value, true); /*parameter 1 metode nya post atau get, parameter 2 sumber
            datanya dari mana, parameter 3 true atau false, true untuk asinkornus dan false untuk sinkronus*/
            xhr.send();
        });

        <?php
            // memasukkan custom javascript
            include "assets/js/js.php";
        ?>
    </script>
</body>
</html>