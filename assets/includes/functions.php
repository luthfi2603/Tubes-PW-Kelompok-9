<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "zeeroxc");

    function tampilkan($query){
        global $conn;
        $hasil = mysqli_query($conn, $query);
        $kosong = [];
        while($isi = mysqli_fetch_assoc($hasil)){
            $kosong[] = $isi;
        }
        return $kosong;
    }

    function tambah($data){
        global $conn;
        $username = ($data["username"]);
        $email = ($data["email"]);
        $pass = ($data["password"]);
        $query = "INSERT INTO akun 
                    VALUES ('', '$username', '$email', '$pass')
                ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM akun WHERE id = $id");
        return mysqli_affected_rows($conn);
    }

    function ubah($data){
        global $conn;
        $id = ($data["id"]);
        $username = ($data["username"]);
        $email = ($data["email"]);
        $pass = ($data["password"]);
        $query = "UPDATE akun SET
                    username = '$username',
                    email = '$email',
                    password = '$pass'
                    WHERE id = $id
                ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function masuk($data){
        global $conn;
        global $user;
        global $pass;
        global $email;
        $user_login = $data["username"];
        $pass_login = $data["password"];
        /*var_dump($user_login);
        var_dump($pass_login);*/
        $query = "SELECT * FROM akun WHERE username = '{$user_login}' AND password = '{$pass_login}'";
        $hasil = mysqli_query($conn, $query);
        // var_dump($hasil);
        // $kosong = [];
        while($isi = mysqli_fetch_array($hasil)){
            $user = $isi['username'];
            $email = $isi['email'];
            $pass = $isi['password'];
        }
        /*var_dump($user);
        var_dump($email);
        var_dump($pass);*/
        if($user_login == "ZeeroXc" && $pass_login == "1"){
			header("Location: admin.php");
			$_SESSION['username'] = $user;
			$_SESSION['email'] = $email;
		}else if($user_login == $user && $pass_login == $pass){
            header("Location: user.php");
			$_SESSION['username'] = $user;
			$_SESSION['email'] = $email;
        }else{
			echo"
                <script>
                    alert('User tidak ditemukan');
                </script>
            ";
		}
        return 0;
    }
?>