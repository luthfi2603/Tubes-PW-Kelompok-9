<?php
    $id = $_GET["id"];
    $data = tampilkan("SELECT * FROM produk WHERE id_produk = $id")[0];
?>
