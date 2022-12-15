<?php
    require "assets/includes/functions.php";

    if(isset($_POST["tambah"])){
        if(tambah($_POST) > 0){
            echo"
                <script>
                    alert('data berhasil ditambah!');
                    document.location.href = '../tugasGDSC';
                </script>
            ";
        }else{
            echo"
                <script>
                    alert('data gagal ditambah!');
                </script>
            ";
        }
    }
?>
<div class="container">
    <div class="form">
        <div class="card col-md-4 formKetengah">
            <div class="card-header bg-info">
                <h3 class="text-white text-center">Registrasi Akun</h3>
            </div>
            <form action="" method="post" class="text-white bg-info">
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
                        <td colspan="2">
                            <button style="margin-left:120px;" class="btn btn-dark" type="submit" name="registrasi">Registrasi</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>