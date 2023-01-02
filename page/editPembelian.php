<?php
    $id = $_GET["id"];
    $sql = "SELECT * FROM pembelian WHERE id_pembelian = $id";
    $query = mysqli_query($conn, $sql);
    if(!$query){
        die;
    }
    $data = mysqli_fetch_assoc($query);

    if(isset($_POST["ubah"])){
        $status = $_POST["pengiriman"];
        if($status == ""){
            echo"
                <script>
                    alert('harap pilih status pengiriman');
                    document.location.href = '?p=editPembelian&id=".$id."';
                </script>
            ";
            die;
        }
        $sql = "UPDATE pembelian SET
                status_pembelian = '$status'
                WHERE id_pembelian = $id
                ";
        mysqli_query($conn, $sql);
        $hasil = mysqli_affected_rows($conn);
        if($hasil > 0){
            echo"
                <script>
                    alert('data pesanan telah diubah');
                    document.location.href = '?p=adminPesanan';
                </script>
            ";
        }else{
            echo"
                <script>
                    alert('data pesanan gagal diubah');
                </script>
            ";
        }
    }
?>
<div class="container">
    <div class="form">
        <div class="card col-4 p-0 detail">
            <div class="card-header bg-warning">
                <h4 class="card-title text-center mb-0 text-light">Edit Pembelian</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label class="text-primary">Tanggal Pembelian</label>
                        <input value="<?= $data["tanggal_pembelian"] ?>" type="text" class="form-control" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="text-primary">Kode Pembelian</label>
                        <input value="<?= $data["id_pembelian"] ?>" type="text" class="form-control" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="text-primary">Jumlah Pembayaran</label>
                        <input value="Rp <?= number_format($data["total_pembelian"],0,".",".") ?>" type="text" class="form-control" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="text-primary">Status Pembayaran</label>
                        <input value="<?= $data["status_pembayaran"] ?>" type="text" class="form-control" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="pengiriman" class="text-primary">Status Pengiriman</label> <br>
                        <select name="pengiriman" id="pengiriman" class="form-control" autofocus>
                            <option value="">Pilih Status Pengiriman</option>
                            <option value="PENDING">PENDING</option>
                            <option value="SENT">SENT</option>
                        </select>
                    </div>
                    <div class="d-grip gap-2">
                        <button class="btn btn-dark tombol" type="submit" name="ubah">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>