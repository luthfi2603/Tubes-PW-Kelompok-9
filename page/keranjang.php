<?php
    error_reporting(E_ALL ^ E_NOTICE);
	if(empty($_SESSION['keranjang']) OR !isset($_SESSION["keranjang"])){
        echo"
            <script>
                alert('anda tidak memiliki isi keranjang, silahkan berbelanja terlebih dahulu');
                document.location.href = 'inc/..';
            </script>
        ";
    }
?>
<div class="container mtNav">
    <div class="card col-12 marAdmin p-0">
        <div class="card-header bg-ijo2">
            <h4 class="card-title text-center mb-0 text-white">Keranjang Belanja</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center align-middle text-huruf">
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Hapus</th>
                </tr>
                <?php
                    if(!empty($_SESSION["keranjang"])){
                        $total = "";
                        foreach ($_SESSION["keranjang"] as $keys => $values) {
                            $harga = $values['harga'];
                            $subtotal = $values['qty'] * $harga;
                            $total = ((int)$total + (int)$subtotal);
                ?>
                <tr>
                    <td class="text-start">
                        <img src="assets/img/<?= $values['item_img']; ?>" width="80px">
                        Nama : <?= $values['item_name']; ?>
                    </td>
                    <td><?= $values['qty']; ?></td>
                    <td><?= 'Rp '.number_format($values['harga'],0,".","."); ?></td>
                    <td><?= 'Rp '.number_format($subtotal,0,".","."); ?></td>
                    <td>
                        <a class="btn btn-sm btn-danger" href="?p=keranjang&item=<?= $values['product_id'] ?>">
                            Hapus
                        </a>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>
                <?php
                    if(isset($_GET['item'])){
                        foreach ($_SESSION["keranjang"] as $keys => $values) {
                            if($values['product_id'] == $_GET['item'] ){
                                unset($_SESSION['keranjang'][$keys]);
                            }
                        }
                        echo"
                            <script>
                                document.location = '?p=keranjang';
                            </script>
                        ";
                    }
                ?>
            <div class="card mb-3 text-huruf">
                <div class="row">
                    <div class="col ms-4 col-4">
                        Total semua:
                    </div>
                    <div class="col text-end me-4">
                        <span><?= 'Rp '.number_format($total,0,",","."); ?></span>
                    </div>
                </div>
            </div>
            <a class="btn btn-dark" href="inc/..">Lanjut Belanja</a>
            <a class="btn btn-dark" href="?p=keranjang&act=clear">Hapus Semua</a>
                <?php
                    if(isset($_SESSION['username'])){
                        echo'
                            <a class="btn btn-dark" href="?p=konPembayaran">Berikutnya</a>
                        ';
                    }else{
                        echo'
                            <a class="btn btn-dark" href="?p=login">Berikutnya</a>
                        ';
                    }

                    if(isset($_GET['act'])){
                        if($_GET['act'] == "clear"){
                            unset($_SESSION['keranjang']);
                            echo"
                                <script>
                                    document.location.href = '?p=keranjang';
                                </script>
                            ";
                        }
                    }
                ?>
        </div>
    </div>
</div>