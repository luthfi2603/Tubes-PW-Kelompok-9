<?php
    ob_start();
    $id = $_GET["id"];
    $data = tampilkan("SELECT * FROM produk WHERE id_produk = $id")[0];

    if(isset($_POST["keranjang"])){
        $error = false;
        foreach($_POST as $val){
            if(trim($val) == "" && empty($val)){
                $error = true;
            }
        }
        if($error){
            echo"
                <script>
                    alert('isikan jumlah yang ingin anda beli');
                </script>
            ";
        }else if(!isset($_SESSION['username'])){
            echo"
                <script>
                    alert('anda belum masuk, silahkan masuk terlebih dahulu');
                    document.location.href = '?p=login';
                </script>
            ";
        }else{
            if(isset($_SESSION['keranjang'])){
                $count = count($_SESSION['keranjang']);
                $is_available = 0;
                foreach ($_SESSION["keranjang"] as $keys => $values){
                    if($_SESSION['keranjang'][$keys]['product_id'] == $_GET['id']) {
                        $is_available++;
                        $_SESSION['keranjang'][$keys]['qty'] = $_SESSION['keranjang'][$keys]['qty'] + $_POST['qty'];
                    }
                }
                if($is_available < 1){
                    $item_array = array(
                    'product_id' => $_GET['id'], 
                    'item_img' => $_POST['hidden_img'], 
                    'item_name' => $_POST['hidden_name'], 
                    'qty' => $_POST['qty'],
                    'harga' => $_POST['hidden_harga']
                    );
                    
                    $_SESSION['keranjang'][$count] = $item_array;
                }	
            }else{
                $item_array = array(
                    'product_id' => $_GET['id'], 
                    'item_img' => $_POST['hidden_img'], 
                    'item_name' => $_POST['hidden_name'], 
                    'qty' => $_POST['qty'],
                    'harga' => $_POST['hidden_harga']
                    );
                    $_SESSION['keranjang'][0] = $item_array;
            }
            echo"
                <script>
                    alert('produk berhasil dimasukkan ke keranjang');
                    document.location.href = '?p=keranjang';
                </script>
            ";
        }
    }
?>
<div class="card col-11 p-0 detail">
    <div class="card-header bg-ijo2">
        <h4 class="card-title text-center mb-0 text-white">Detail Produk</h4>
    </div>
    <div class="card-body text-huruf">
        <div class="row mt-3">
            <div class="col col-4">
                <img src="assets/img/<?= $data["img"]; ?>" width="100%">
            </div>
            <div class="col ps-5 ms-2">
                <form method="POST" action="?p=detail&id=<?= $id; ?>">
                    <h3 class="text-center"><?= $data["nama_produk"]; ?></h3>
                    <h4 class="m-0">Harga</h4>
                        <span class="harga">Rp <?= number_format($data["harga_produk"],0,".",".") ?></span>
                    <h4 class="mt-2 mb-0">Deskripsi</h4>
                        <p class="m-0 deskAdminProduk" class="harga"><?= $data["spesifikasi_produk"]; ?></p>
                    <h4 class="mt-2 mb-0">Jumlah</h4>
                        <input class="jumlah" type="number" name="qty" min="1"><br>
                    <input class="btn btn-dark mt-2" type="submit" name="keranjang" value="Tambah Ke keranjang">
                    <input type="hidden" name="hidden_id" value="<?= $id; ?>">
                    <input type="hidden" name="hidden_img" value="<?= $data["img"]; ?>">
                    <input type="hidden" name="hidden_name" value="<?= $data['nama_produk']; ?>">
                    <input type="hidden" name="hidden_harga" value="<?= $data['harga_produk']; ?>">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    ob_end_flush();
?>