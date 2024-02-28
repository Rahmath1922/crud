<?php
require 'function.php';

if(isset($_GET["id"]) && $_GET["id"] !== "") {
    $id = $_GET["id"];
    
    
    if(delete($id) > 0) {
        echo "<script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'halamandosen.php';
        </script>       
        ";
        exit;
    } else {
        echo "<script>
        alert('Data gagal dihapus!');
        document.location.href = 'halamandosen.php';
        </script>";
        exit;
    }
} 



?>