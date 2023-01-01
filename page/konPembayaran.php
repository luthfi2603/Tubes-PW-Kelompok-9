<?php
	error_reporting(E_ALL ^ E_NOTICE);
    $idAkunTangkapan = $_SESSION["id"];
    $query = mysqli_query($conn, "SELECT * FROM akun WHERE id = $idAkunTangkapan");
    $data = mysqli_fetch_array($query);

    if(isset($_POST['checkout'])){
        $bayar = $_POST["bayar"];
        $tujuan = $_POST["tujuan"];
        if($tujuan == 'blank'){
            echo"
                <script>
                    alert('silahkan pilih tujuan pembayaran');
                    document.location.href = '?p=konPembayaran';
                </script>
            ";
            die;
        }
        $noHpPembayaran = $_POST["noHpPembayaran"];
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $kota = $_POST["kota"];
        $provinsi = $_POST["provinsi"];
        $kodePos = $_POST["kodePos"];
        $noHp = $_POST["noHp"];
        $email = $_POST["email"];
        $namaPembeli = $_POST["namaPembeli"];

        if($_POST['bayar'] != $_POST['hidden_total']){
            echo"
                <script>
                    alert('Isi total tersebut tidak boleh di kurangi. Mohon bayar sesuai dengan total pembayaran.');
                    document.location.href = '?p=konPembayaran';
                </script>
            ";
        }else{
            $id = autoNumber('id_pembelian','pembelian');
            $regdate = date('Y-m-d');
            
            $sql1 = "INSERT INTO pembelian 
                        VALUES (
                    '".$id."',
                    '".$idAkunTangkapan."',
                    '".$namaPembeli."',
                    '".$regdate."',
                    '".$bayar."',
                    '".$tujuan."',
                    '".$noHpPembayaran."',
                    'PAID',
                    'PENDING')";
            $result = mysqli_query($conn, $sql1);
            if(!$result){
                die('Invalid query:'.mysqli_error($conn));
            }

            $id_pembelian = $id;
            $pembelian_produk = '';
            $_SESSION["id_pembelian"] = $id_pembelian;
            foreach($_SESSION["keranjang"] as $keys => $values){
                $pembelian_produk = "INSERT INTO pembelian_produk VALUES (NULL,'".$id_pembelian."','".$values['item_img']."','".$values['product_id']."','".$values['item_name']."','".$values['qty']."','".$values['harga']."')";
                if(mysqli_query($conn, $pembelian_produk)){
                    unset($_SESSION['keranjang']);
                    echo"
                        <script>
                            document.location.href = '?p=buktiPembelian';
                        </script>
                    ";
                }
                
            }
            $sql2 = "UPDATE akun
                        SET 
                    nama = '".$nama."',
                    alamat = '".$alamat."',
                    kota = '".$kota."',
                    provinsi = '".$provinsi."',
                    kode_pos = '".$kodePos."',
                    no_hp = '".$noHp."',
                    email = '".$email."'
                    WHERE id = '".$idAkunTangkapan."'";
            $query = mysqli_query($conn, $sql2);
            if(!$query){
                die('update gagal! '.mysqli_error($conn));
            }
        }
    }
?>
<div class="container mtNav">
    <div class="form">
        <div class="card col-4 marAdmin p-0">
            <div class="card-header bg-info">
                <h4 class="card-title text-center mb-0 text-light">Konfirmasi Pembayaran</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <legend>Data Diri</legend>
                    <div class="mb-3">
                        <label for="nama" class="text-primary">Nama Lengkap</label>
                        <input id="nama" type="text" class="form-control" name="nama" required value="<?= isset($_POST['nama']) ? $_POST['nama'] : $data['nama'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="text-primary">Alamat Email</label>
                        <input id="email" type="text" class="form-control" name="email" required value="<?= isset($_POST['email']) ? $_POST['email'] : $data['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="noHp" class="text-primary">Nomor Telepon</label>
                        <input id="noHp" type="number" class="form-control" name="noHp" required value="<?= isset($_POST['noHp']) ? $_POST['noHp'] : $data['no_hp'] ?>">
                    </div>
                    <legend>Detail Alamat</legend>
                    <div class="mb-3">
                        <label for="alamat" class="text-primary">Alamat</label>
                        <input id="alamat" type="text" class="form-control" name="alamat" required value="<?= isset($_POST['alamat']) ? $_POST['alamat'] : $data['alamat'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="text-primary">Kota / Kabupaten</label>
                        <input id="kota" type="text" class="form-control" name="kota" required value="<?= isset($_POST['kota']) ? $_POST['kota'] : $data['kota'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="provinsi" class="text-primary">Provinsi</label>
                        <input id="provinsi" type="text" class="form-control" name="provinsi" required value="<?= isset($_POST['provinsi']) ? $_POST['provinsi'] : $data['provinsi'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="kodePos" class="text-primary">Kode Pos</label>
                        <input id="kodePos" type="number" class="form-control" name="kodePos" required value="<?= isset($_POST['kodePos']) ? $_POST['kodePos'] : $data['kode_pos'] ?>">
                    </div>
                    <legend>Metode Pembayaran</legend>
                    <div class="mb-3">
                        <label for="namaPembeli" class="text-primary">Nama Pembeli</label>
                        <input id="namaPembeli" type="text" class="form-control" name="namaPembeli" required placeholder="Isikan nama anda" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="tujuan" class="text-primary">Tujuan Pembayaran</label>
                        <select name="tujuan" id="tujuan" class="form-control">
                            <option value="blank">Pilih</option>
                            <option value="DANA">DANA</option>
                            <option value="OVO">OVO</option>
                            <option value="go-pay">go-pay</option>
                        </select>
                        <div class="form-text">
                            Pilih jenis e-money yang anda gunakan
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="noHpPembayaran" class="text-primary">Nomor HP Pembayaran</label>
                        <input id="noHpPembayaran" type="number" class="form-control" name="noHpPembayaran" required placeholder="Isikan nomer e-money anda">
                    </div>
                    <legend>Ringkasan Pembayaran</legend>
                    <div class="mb-3">
                        <label for="email" class="text-primary">Total Transaksi</label><br>
                        <span>
                            <?php 
                                if(!empty($_SESSION["keranjang"])){
                                    $total = 0;
                                    foreach($_SESSION["keranjang"] as $keys => $values){
                                        $harga = $values['harga'];
                                        $total = $total + ($values['qty'] * $harga);
                                    }
                                }
                                echo'Rp '.number_format($total,0,".",".");
                            ?>
                        </span>
                        <input hidden type="number" name="hidden_total" id="" value="<?= $total ?>">
                    </div>
                    <div class="mb-3">
                        <label for="jumlahBayar" class="text-primary">Jumlah bayar</label>
                        <input id="jumlahBayar" type="number" class="form-control" name="bayar" required placeholder="Masukkan nominal">
                        <div class="form-text">
                            Masukkan nominal sesuai dengan total transaksi untuk pembayaran tanpa titik
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-warning" name="checkout">Bayar Sekarang</button>
                        <a href="inc/.." class="btn btn-outline-dark">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>