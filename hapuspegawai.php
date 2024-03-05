<?php
require 'function/functionpegawai.php';

if(isset($_GET["id"]) && $_GET["id"] !== "") {
    $id = $_GET["id"];
    
    
    if(hapuspegawai($id) > 0) {
        echo "<script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'halamanpegawai.php';
        </script>       
        ";
        exit;
    } else {
        echo "<script>
        alert('Data gagal dihapus!');
        document.location.href = 'halamanpegawai.php';
        </script>";
        exit;
    }
} 



?>