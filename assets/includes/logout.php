<?php
    session_start();
    if(session_destroy()){
        echo"
            <script>
                alert('logout berhasil');
                document.location.href = '../../';
            </script>
        ";
    }
?>