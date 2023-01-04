<?php
    if(empty($_SESSION)){?>
        <div class="bg-ijo text-white text-center mt-5">
            <div class="container">
                <div class="row">
                    <div class="col my-4">
                        <h3 class="mb-4">Tentang Kami</h3>
                        <img src="assets/img/logo_footer.png" style="width:250px" class="mb-4">
                        <div style="padding: 0 50px 0 50px;text-align:justify;">
                            KyuuDent_Store adalah sebuah web e-commerce yang menjual keperluan 
                            alat tulis bagi siapa saja, jika anda ingin melihat barang apa 
                            aja yang ada, anda bisa mengunjungi website kami hanya ada di KyuuDent_Store
                        </div>
                    </div>
                    <div class="col my-4">
                        <h3 class="mb-4">Kontak Kami</h3>
                        <div style="padding-left:100px;">
                            <div class="row text-start">
                                <h6>Alamat</h6>
                                <p>Jalan Makmur Gang Bakti No. 16b</p>
                            </div>
                            <div class="row text-start">
                                <h6>Telpon</h6>
                                <p>0898 3874 300</p>
                            </div>
                            <div class="row text-start">
                                <h6>Email</h6>
                                <p>luthfim904@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark text-white">
            <div class="col"></div>
            <div class="col text-end pe-4">
                &copy; 2022 KyuuDent_Store. All Rights Reserved | Design by KELOMPOK 9 TUBES PW KOM C TI USU '22
            </div>
        </div><?php
    }else{
        if($_SESSION["level"] == 1){
            
        }else{?>
            <div class="bg-ijo text-white text-center mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col my-4">
                            <h3 class="mb-4">Tentang Kami</h3>
                            <img src="assets/img/logo_footer.png" style="width:250px" class="mb-4">
                            <div style="padding: 0 50px 0 50px;text-align:justify;">
                                KyuuDent_Store adalah sebuah web e-commerce yang menjual keperluan 
                                alat tulis bagi siapa saja, jika anda ingin melihat barang apa 
                                aja yang ada, anda bisa mengunjungi website kami hanya ada di KyuuDent_Store
                            </div>
                        </div>
                        <div class="col my-4">
                            <h3 class="mb-4">Kontak Kami</h3>
                            <div style="padding-left:100px;">
                                <div class="row text-start">
                                    <h6>Alamat</h6>
                                    <p>Jalan Makmur Gang Bakti No. 16b</p>
                                </div>
                                <div class="row text-start">
                                    <h6>Telpon</h6>
                                    <p>0898 3874 300</p>
                                </div>
                                <div class="row text-start">
                                    <h6>Email</h6>
                                    <p>luthfim904@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-dark text-white">
                <div class="col"></div>
                <div class="col text-end pe-4">
                    &copy; 2022 KyuuDent_Store. All Rights Reserved | Design by KELOMPOK 9 TUBES PW KOM C TI USU '22
                </div>
            </div><?php    
        }
    }
?>