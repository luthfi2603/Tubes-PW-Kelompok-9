<?php
    require "functions.php";
    if(empty($_SESSION['username']) or ($_SESSION['username'] != 'ZeeroXc')){
        header("Location: error.php");
    }
    $data = tampilkan("SELECT * FROM akun2");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZeeroXc</title>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
</head>
<body>
    <h3>Halaman Admin</h3>
    <p><a href="tambah.php">registrasi akun2</a> | <a href="logout.php" onclick="return confirm('Yakin?')">keluar</a></p>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>
                No.
            </th>
            <th>
                Username
            </th>
            <th>
                Email
            </th>
            <th>
                Password
            </th>
            <th>
                Aksi
            </th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($data as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["username"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["password"] ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"] ?>">ubah</a> |
                <a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('Yakin?')">hapus</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>