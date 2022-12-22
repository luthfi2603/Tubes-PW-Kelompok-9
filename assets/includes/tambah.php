<?php
    require "functions.php";

    if(isset($_POST["registrasi"])){
        if(tambah($_POST) > 0){
            echo"
                <script>
                    alert('Registrasi Berhasil!');
                    document.location.href = '../../';
                </script>
            ";
        }else{
            echo"
                <script>
                    alert('Registrasi Gagal!');
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
    <title>Tambah</title>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
</head>
<body>
    <h3>Registrasi akun2</h3>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <label for="uname">Username</label>
                </td>
                <td>
                    : <input type="text" name="username" id="uname">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email</label>
                </td>
                <td>
                    : <input type="text" name="email" id="email">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pass">Password</label>
                </td>
                <td>
                    : <input type="password" name="password" id="pass">
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="registrasi">Registrasi</button>
                </td>
                <td>
                    &nbsp &nbsp <a href="../../">dashboard</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>