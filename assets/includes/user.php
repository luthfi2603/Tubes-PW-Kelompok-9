<?php
    require "functions.php";
    if(empty($_SESSION['username'])){
        header("Location: error.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
</head>
<body>
    <a href="logout.php" onclick="return confirm('Yakin?')">keluar</a>
    <h2>Ini adalah halaman user</h2>
</body>
</html>