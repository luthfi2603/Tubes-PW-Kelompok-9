<?php
    require "functions.php";

    $id = $_GET["id"];

    $data = tampilkan("SELECT * FROM akun2 WHERE id = $id")[0];

    if(isset($_POST["ubah"])){
        if(ubah($_POST) > 0){
            echo"
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'admin.php';
                </script>
            ";
        }else{
            echo"
                <script>
                    alert('data gagal diubah!');
                </script>
            ";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah</title>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
</head>
<body>
    <h3>Ubah Data</h3>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <table>
            <tr>
                <td>
                    <label for="uname">Username</label>
                </td>
                <td>
                    : <input type="text" name="username" id="uname" value="<?= $data['username'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email</label>
                </td>
                <td>
                    : <input type="text" name="email" id="email" value="<?= $data['email'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pass">Password</label>
                </td>
                <td>
                    : <input type="text" name="password" id="pass" value="<?= $data['password'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="ubah">Ubah</button>
                </td>
                <td>
                    &nbsp &nbsp <a href="admin.php">halaman admin</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>