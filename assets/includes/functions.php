<?php
    if(!isset($_SESSION)){
        session_start();
    }

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

    // fungsi untuk menambah data akun
    function tambah($data){
        global $conn;
        $username = ($data["username"]);
        $email = ($data["email"]);
        $pass = ($data["password"]);
        $konPass = ($data["konPass"]);
        $img = ($data["img"]);

        $cekEmail = mysqli_query($conn, "SELECT email FROM akun2 WHERE email = '$email'");
        $cekUsername = mysqli_query($conn, "SELECT username FROM akun2 WHERE username = '$username'");

        if(mysqli_num_rows($cekEmail) > 0){
            echo"
                <script>
                    alert('email Sudah Ada!');
                </script>
            ";
        }else if(mysqli_num_rows($cekUsername) > 0){
            echo"
                <script>
                    alert('username Sudah Ada!');
                </script>
            ";
        }else if($pass != $konPass){
            echo"
                <script>
                    alert('password beda');
                </script>
            ";
        }else{
            $query = "INSERT INTO akun2 
                        VALUES ('', '$img', '$username', '$email', '$pass')
                    ";
            mysqli_query($conn, $query);
            /*echo"
                <script>
                    alert('registrasi berhasil!');
                    document.location.href = 'inc/..';
                </script>
            ";*/
            if(empty($_SESSION)){
                echo"
                    <script>
                        alert('registrasi berhasil!');
                        document.location.href = 'inc/..';
                    </script>
                ";
            }else{
                echo"
                    <script>
                        alert('registrasi berhasil!');
                        document.location.href = '?p=adminAkun';
                    </script>
                ";
            }
            return 0;
        }
    }

    // fungsi untuk menambah data produk
    function tambah2($data){
        global $conn;
        $nama = ($data["nama"]);
        $harga = ($data["harga"]);
        $kategori = ($data["kategori"]);
        $merek = ($data["merek"]);
        $spesifikasi = ($data["spesifikasi"]);
        $gambar = ($data["img"]);

        $sql = "INSERT INTO produk
                    VALUES ('', '$nama', '$harga', '$kategori', '$merek', '$spesifikasi', '$gambar')
                ";
        $query = mysqli_query($conn, $sql);

        if($query){
            echo"
                <script>
                    alert('tambah produk berhasil!');
                    document.location.href = '?p=adminProduk';
                </script>
            ";
        }else{
            echo"
                <script>
                    alert('tambah produk gagal!');
                </script>
            ";
        }
        return 0;
    }

    // fungsi untuk menghapus data akun
    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM akun2 WHERE id = $id");
        return mysqli_affected_rows($conn);
    }

    // fungsi untuk menghapus data produk
    function hapus2($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM produk WHERE id_produk = $id");
        return mysqli_affected_rows($conn);
    }

    // fungsi untuk mengubah data akun
    function ubah($data){
        global $conn;
        $id = ($data["id"]);
        $username = ($data["username"]);
        $email = ($data["email"]);
        $pass = ($data["password"]);
        $img = $data["img"];
        $query = "UPDATE akun2 SET
                    username = '$username',
                    email = '$email',
                    password = '$pass',
                    img = '$img'
                    WHERE id = $id
                ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    // fungsi untuk mengubah data produk
    function ubah2($data){
        global $conn;
        $id = ($data["id"]);
        $nama = ($data["nama"]);
        $harga = ($data["harga"]);
        $kategori = ($data["kategori"]);
        $merek = ($data["merek"]);
        $spesifikasi = ($data["spesifikasi"]);
        $gambar = ($data["img"]);

        $query = "UPDATE produk SET
                    nama_produk = '$nama',
                    harga_produk = '$harga',
                    kategori_produk = '$kategori',
                    merek_produk = '$merek',
                    spesifikasi_produk = '$spesifikasi',
                    img = '$gambar'
                    WHERE id_produk = $id
                ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    // fungsi untuk login
    function masuk($data){
        global $conn;
        global $user;
        global $pass;
        global $email;
        $user_login = $data["username"];
        $pass_login = $data["password"];
        /*var_dump($user_login);
        var_dump($pass_login);*/
        $query = "SELECT * FROM akun2 WHERE username = '{$user_login}' AND password = '{$pass_login}'";
        $hasil = mysqli_query($conn, $query);
        // var_dump($hasil);
        /*while($isi = mysqli_fetch_array($hasil)){
            $user = $isi['username'];
            $email = $isi['email'];
            $pass = $isi['password'];
        }*/
        foreach($hasil as $isi){
            $user = $isi['username'];
            $email = $isi['email'];
            $pass = $isi['password'];
        }
        /*var_dump($user);
        var_dump($email);
        var_dump($pass);*/
        if($user_login == "ZeeroXc" && $pass_login == "1"){
			header("Location: ?p=admin");
			$_SESSION['username'] = $user;
			$_SESSION['email'] = $email;
		}else if($user_login == $user && $pass_login == $pass){
            header("Location: ../../ZeeroXc");
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
    // function untuk mencari di halaman data akun
    function cari($keywoard){
        $query = "SELECT * FROM akun2
                    WHERE
                  username LIKE '%$keywoard%' OR
                  email LIKE '%$keywoard%' OR
                  password LIKE '%$keywoard%'
        ";
        return tampilkan($query);
    }

    // function untuk mencari di halaman data produk
    function cari2($keywoard){
        $query = "SELECT * FROM produk
                    WHERE
                  nama_produk LIKE '%$keywoard%' OR
                  harga_produk LIKE '%$keywoard%' OR
                  kategori_produk LIKE '%$keywoard%' OR
                  merek_produk LIKE '%$keywoard%' OR
                  spesifikasi_produk LIKE '%$keywoard%'
        ";
        return tampilkan($query);
    }
    
    function rreset($data){
        global $conn;
        $emailkon = $data["konMail"];
        $sql = "SELECT * FROM akun2 WHERE email = '$emailkon'";
        $query = mysqli_query($conn, $sql);
        foreach($query as $isi){
            $email = $isi['email'];
        }
        if(isset($email)){
            if($emailkon == $email){
                header("Location: ?p=resetPass&email=$email");
            }    
        }
        else{
            echo"
                <script>
                    alert('email tidak ada!');
                </script>
            ";
        }
        return 0;
    }
    function rrreset($data){
        global $conn;
        $email = $_GET["email"];
        $passRes = $data["password"];
        $konPassRes = $data["konPass"];
        if($passRes != $konPassRes){
            echo"
                <script>
                    alert('password beda');
                </script>
            ";
        }else{
            if(isset($email)){
                $sql = "UPDATE akun2 SET
                        password = '$passRes'
                        WHERE email = '$email'
                        ";
                $query = mysqli_query($conn, $sql);
                if($query){
                    echo"
                        <script>
                            alert('reset password berhasil');
                            document.location.href = '?p=login';
                        </script>
                    ";
                }else{
                    echo"
                        <script>
                            alert('reset password gagal');
                        </script>
                    ";
                }
            }
        }
    }
?>