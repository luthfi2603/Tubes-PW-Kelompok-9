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
    ?>
    <div class='back-to-top'>
        <svg viewBox="0 0 20 20">
            <polyline points="4 13 10 7 16 13"></polyline>
        </svg>
    </div>
    <script type="text/javascript">
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

        // validasi form
        $(document).ready(function() {
            // ketika disubmit, mengambil dari class form
            $('.validasiForm').submit(function() {
                // deklarasi variabel nama dan panjang nya
                var username = $('#username').val().length;	
                var password = $('#password').val().length;	
                // cek jika tidak diisi
                if(username == 0){
                    $(".pesan-username").css('display','block');
                    return false;
                }if(password == 0){
                    $(".pesan-password").css('display','block');
                    return false;
                }
            });
        });

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

                if(isset($_GET['hal'])){
                    echo"
                        var keyword2 = document.getElementById('keyword2');
                        keyword2.addEventListener('mouseover', function(){
                            document.location.href = 'inc/..';
                        });
                    ";
                }
            }else{
                /* echo"
                    // ambil elemen-elemen yang dibutuhkan
                    var keyword = document.getElementById('keyword');
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
                        datanya dari mana, parameter 3 true atau false, true untuk asinkornus dan false untuk sinkronus
                        xhr.send();
        
                        // scroll
                        document.getElementById('scroll').scrollIntoView();
                    });
                "; */

                // jQuery tolong carikan saya elemen yang id nya keyword
                echo"
                    $('#keyword').on('keyup', () => {
                        // memunculkan elemen
                        // $(.loader).show();

                        // ajax dengan load
                        // $('#bungkus').load('./assets/ajax/hasilSearch.php?keyword=' + $('#keyword').val());

                        // ajax dengan get()
                        $.get('./assets/ajax/hasilSearch.php?keyword=' + $('#keyword').val(), (data) => {
                            $('#bungkus').html(data);
                        });

                        document.getElementById('scroll').scrollIntoView();
                    });

                ";
            }

            // memasukkan custom javascript
            include "assets/js/js.php";
        ?>
    </script>
</body>
</html>
<?php ob_end_flush(); ?>