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
        // tidak boleh ada slash dan diubah ke huruf kecil
        $username = strtolower(stripslashes($data["username"]));
        // agar tanda kutip dapat menjadi password
        $pass = mysqli_real_escape_string($conn, $data["password"]);
        $konPass = mysqli_real_escape_string($conn, $data["konPass"]);
        $email = strtolower($data["email"]); // agar diubah ke huruf kecil

        $cekEmail = mysqli_query($conn, "SELECT email FROM akun2 WHERE email = '$email'");
        $cekUsername = mysqli_query($conn, "SELECT username FROM akun2 WHERE username = '$username'");

        if(mysqli_num_rows($cekEmail) > 0){
            echo"
                <script>
                    alert('email sudah terdaftar!');
                </script>
            ";
        }else if(mysqli_num_rows($cekUsername) > 0){
            echo"
                <script>
                    alert('username sudah terdaftar!');
                </script>
            ";
        }else if($pass !== $konPass){
            echo"
                <script>
                    alert('konfirmasi password berbeda!');
                </script>
            ";
        }else{
            // enkripsi password
            $pass = password_hash($pass, PASSWORD_DEFAULT);

            // upload gambar
            $img = upload();

            if(!$img){
                return false;
            }

            $sql = "INSERT INTO akun2 
                        VALUES ('', '$img', '$username', '$email', '$pass')
                    ";
            mysqli_query($conn, $sql);
            
            return mysqli_affected_rows($conn);
        }
    }

    // fungsi untuk upload gambar
    function upload(){
        $namaFile = $_FILES["img"]["name"];
        $ukuranFile = $_FILES["img"]["size"];
        $error = $_FILES["img"]["error"];
        $tmpName = $_FILES["img"]["tmp_name"];

        // cek apakah gambar sudah diupload
        if($error === 4){
            /*echo"
                <script>
                    alert('pilih gambar terlebih dahulu!');
                </script>
            ";*/
            return 'no_photo.png';
        }

        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
            echo"
                <script>
                    alert('file yang anda upload bukan gambar!');
                </script>
            ";
            return false;
        }

        // cek apakah gambar ukurannya terlalu besar
        if($ukuranFile > (2 * 1166400)){
            echo"
                <script>
                    alert('gambar yang anda upload terlalu besar!');
                </script>
            ";
            return false;
        }

        // lolos pengecekan, gambar siap diupload
        // generate nama gambar baru

        $namaFileBaru = substr(uniqid(), 5, 5);
        $namaFileBaru .= '_';
        $namaFileBaru .= $namaFile;
        // $namaFileBaru .= '.';
        // $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets/img/'. $namaFileBaru);

        return $namaFileBaru;
    }

    // fungsi untuk upload gambar
    function upload2(){
        $namaFile = $_FILES["img"]["name"];
        $ukuranFile = $_FILES["img"]["size"];
        $error = $_FILES["img"]["error"];
        $tmpName = $_FILES["img"]["tmp_name"];

        // cek apakah gambar sudah diupload
        if($error === 4){
            /*echo"
                <script>
                    alert('pilih gambar terlebih dahulu!');
                </script>
            ";*/
            return 'no_photo2.png';
        }

        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
            echo"
                <script>
                    alert('file yang anda upload bukan gambar!');
                </script>
            ";
            return false;
        }

        // cek apakah gambar ukurannya terlalu besar
        if($ukuranFile > (2 * 1166400)){
            echo"
                <script>
                    alert('gambar yang anda upload terlalu besar!');
                </script>
            ";
            return false;
        }

        // lolos pengecekan, gambar siap diupload
        // generate nama gambar baru

        $namaFileBaru = substr(uniqid(), 5, 5);
        $namaFileBaru .= '_';
        $namaFileBaru .= $namaFile;
        // $namaFileBaru .= '.';
        // $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets/img/'. $namaFileBaru);

        return $namaFileBaru;
    }

    // fungsi untuk menambah data produk
    function tambah2($data){
        global $conn;
        $nama = ($data["nama"]);
        $harga = ($data["harga"]);
        $kategori = ($data["kategori"]);
        $merek = ($data["merek"]);
        $spesifikasi = ($data["spesifikasi"]);
        
        // upload gambar
        $gambar = upload2();

        if(!$gambar){
            return false;
        }

        $sql = "INSERT INTO produk
                    VALUES ('', '$nama', '$harga', '$kategori', '$merek', '$spesifikasi', '$gambar')
                ";
        mysqli_query($conn, $sql);

        return mysqli_affected_rows($conn);
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
        // $pass = ($data["password"]);
        $gambarLama = $data["gambarLama"];

        if($_FILES["img"]["error"] === 4){
            $img = $gambarLama;
        }else{
            $img = upload();
            if(!$img){
                return false;
            }
        }

        $query = "UPDATE akun2 SET
                    username = '$username',
                    email = '$email',
                    img = '$img'
                    WHERE id = $id
                ";
        // password = '$pass',
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
        $gambarLama = $data["gambarLama"];

        if($_FILES["img"]["error"] === 4){
            $img = $gambarLama;
        }else{
            $img = upload2();
            if(!$img){
                return false;
            }
        }

        $query = "UPDATE produk SET
                    nama_produk = '$nama',
                    harga_produk = '$harga',
                    kategori_produk = '$kategori',
                    merek_produk = '$merek',
                    spesifikasi_produk = '$spesifikasi',
                    img = '$img'
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
        $user_login = strtolower($data["user"]);
        $pass_login = mysqli_real_escape_string($conn, $data["password"]);
        $query = "SELECT * FROM akun2 WHERE (username = '{$user_login}' or email = '{$user_login}')";
        // AND password = '{$pass_login}'
        $hasil = mysqli_query($conn, $query);

        // cek username atau email
        if(mysqli_num_rows($hasil) === 1){
            foreach($hasil as $isi){
                $user = $isi['username'];
                $email = $isi['email'];
                $pass = $isi['password'];
                $img = $isi['img'];
            }
            // cek password
            $admin = '$2y$10$NqcUGEWI6aV8WXPWK24Cre0owCsBWnIoU28bwcpDPS1SfDgY1XDc2';
            if(password_verify($pass_login, $admin)){
                echo"
                    <script>
                        alert('selamat datang admin');
                        document.location.href = '?p=admin';
                    </script>
                ";
                $_SESSION['username'] = $user;
                $_SESSION['email'] = $email;
                $_SESSION['img'] = $img;
            }else if(password_verify($pass_login, $pass)){
                echo"
                    <script>
                        alert('login berhasil');
                        document.location.href = 'inc/..';
                    </script>
                ";
                $_SESSION['username'] = $user;
                $_SESSION['email'] = $email;
                $_SESSION['img'] = $img;
            }else{
                echo"
                    <script>
                        alert('password salah!');
                    </script>
                ";    
            }
        }else{
			echo"
                <script>
                    alert('username / email tidak terdaftar!');
                </script>
            ";
		}
        return 0;
    }

    // fungsi logout
    function keluar(){
        session_destroy();
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
    
    // fungsi untuk konfirmasi email
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
                    alert('email tidak terdaftar!');
                </script>
            ";
        }
        return 0;
    }

    // fungsi untuk reset password
    function rrreset($data){
        global $conn;
        $email = $_GET["email"];
        $passRes = mysqli_real_escape_string($conn, $data["password"]);
        $konPassRes = mysqli_real_escape_string($conn, $data["konPass"]);
        if($passRes !== $konPassRes){
            echo"
                <script>
                    alert('konfirmasi password berbeda!');
                </script>
            ";
        }else{
            if(isset($email)){
                // enkripsi password
                $passRes = password_hash($passRes, PASSWORD_DEFAULT);

                $sql = "UPDATE akun2 SET
                        password = '$passRes'
                        WHERE email = '$email'
                        ";
                mysqli_query($conn, $sql);
                $hasil = mysqli_affected_rows($conn);
                if($hasil > 0){
                    if(isset($_SESSION["username"])){
                        echo"
                            <script>
                                alert('ubah password berhasil');
                                document.location.href = 'inc/..';
                            </script>
                        ";
                    }else{
                        echo"
                            <script>
                                alert('reset password berhasil');
                                document.location.href = '?p=login';
                            </script>
                        ";
                    }
                }else{
                    echo"
                        <script>
                            alert('reset password gagal');
                        </script>
                    ";
                }
            }else{
                header("Location: ?p=profil");
            }
        }
        return 0;
    }
?>