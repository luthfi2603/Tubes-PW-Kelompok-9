<?php
    if($_GET["i"] == '1'){
        $id = $_GET['id'];
    
        if(hapus($id) > 0){
            echo"
                <script>
                    alert('data berhasil dihapus');
                    document.location.href = '?p=adminAkun';
                </script>
            ";
        }else{
            echo"
                <script>
                    alert('data gagal dihapus!');
                </script>
            ";
        }
    }else{
        $id = $_GET['id'];
    
        if(hapus2($id) > 0){
            echo"
                <script>
                    alert('data berhasil dihapus');
                    document.location.href = '?p=adminProduk';
                </script>
            ";
        }else{
            echo"
                <script>
                    alert('data gagal dihapus!');
                </script>
            ";
        }
    }
?>